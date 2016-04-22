<?php namespace Dotink\Sage {

	use TokenReflection\IReflection;

	/**
	 * Provides documentation writing services by outputting to a particular directory
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Sage
	 */
	class Writer
	{
		const DEFAULT_OUTPUT_PATH = 'sage_output';

		/**
		 * The current document being written to.
		 *
		 * @access private
		 * @var string
		 */
		private $currentWriteDocument = NULL;


		/**
		 * The list of external documents and their links
		 *
		 * @access private
		 * @var array
		 */
		private $externalDocs = array();


		/**
		 * The output path for this writer
		 *
		 * @access private
		 * @var string
		 */
		private $outputPath = NULL;


		/**
		 * Template data
		 *
		 * @access private
		 * @var array
		 */
		private $templateData = array();


		/**
		 * Compiled references list [file => document]
		 *
		 * @access private
		 * @var array
		 */
		private $references = array();


		/**
		 * Determines whether a reference is a standard type
		 *
		 * @static
		 * @access private
		 * @param string $reference The reference to chck
		 * @return boolean TRUE if the reference is a stndard type, FALSE otherwise
		 */
		static private function isStandardType($reference)
		{
			return in_array($reference, [
				'string', 'int', 'integer', 'bool', 'boolean', 'array', 'float', 'double',
				'void', 'mixed', 'reference'
			]);
		}


		/**
		 * Creates a new writer
		 *
		 * @access public
		 * @param string $output_path The output path where we will be writing documentation to
		 * @param string $template_directory The directory containing our templates
		 * @return void
		 */
		public function __construct($output_path, $template_directory)
		{
			if (!isset($output_path)) {
				$output_path = getcwd() . DIRECTORY_SEPARATOR . self::DEFAULT_OUTPUT_PATH;
			}

			$this->setOutputPath($output_path);
			$this->setTemplateDirectory($template_directory);
		}


		/**
		 * Builds documentation from an array of documents
		 *
		 * @access public
		 * @param array $documents A document collection keyed by directory structure
		 * @return void
		 */
		public function buildDocumentation($documents)
		{
			$this->write($this->compile($documents, NULL));
		}


		/**
		 * Expands a reference in a given context
		 *
		 * @access public
		 * @param string $reference The reference to expand
		 * @param IReflection $context The reflection context for expansion
		 * @return string The expanded reference
		 */
		public function expand($reference, IReflection $context)
		{
			$member = NULL;

			if (strpos($reference, '::') !== FALSE) {
				list($reference, $member) = explode('::', $reference);
			}

			$expansion = $reference;

			if (!self::isStandardType($reference)) {
				$parts     = explode('\\', $expansion);
				$expansion = $context->getName() . '\\' . $expansion;

				foreach ($context->getNamespaceAliases() as $alias => $namespace) {
					if ($parts[0] == $alias) {
						$expansion = implode('\\', array_merge(
							[$namespace],
							array_slice($parts, 1)
						));
						break;
					}
				}
			}

			return $member
				? implode('::', [$expansion, $member])
				: $expansion;
		}


		/**
		 * Gets a piece of template data
		 *
		 * @access public
		 * @param string $name The name of the data to get
		 * @return mixed The data, NULL if not available
		 */
		public function get($name)
		{
			return isset($this->templateData[$name])
				? $this->templateData[$name]
				: NULL;
		}


		/**
		 * Gets a relative link to a particular document
		 *
		 * @access public
		 * @param string $document The document to get a link to
		 * @return string The relative link to the documentation
		 */
		public function getLink($document)
		{
			$url      = NULL;
			$position = NULL;

			if (strpos($document, '::') !== FALSE) {
				$parts    = explode('::', $document, 2);
				$document = $parts[0];
				$position = '#' . strtolower(trim($parts[1], '$()'));
			}

			if (isset($this->externalDocs[$document])) {
				$url = $this->externalDocs[$document];

			} else {
				foreach ($this->references as $reference_path => $reference) {
					if ($reference->getReflection()->getName() == $document) {
						$source_parts = explode(DIRECTORY_SEPARATOR, str_replace(
							$this->outputPath . DIRECTORY_SEPARATOR,
							'',
							$this->currentWriteDocument
						));

						$target_parts = explode(DIRECTORY_SEPARATOR, str_replace(
							$this->outputPath . DIRECTORY_SEPARATOR,
							'',
							$reference_path
						));

						for ($x = 0; $front = array_shift($source_parts); $x++) {
							if ($front != $target_parts[$x]) {
								break;
							}
						}

						$path = array_slice($target_parts, $x);

						for ($y = count($source_parts); $y > 0; $y--) {
							array_unshift($path, '..');
						}

						$url = implode(DIRECTORY_SEPARATOR, $path);
					}
				}
			}

			return $url . $position;
		}


		/**
		 * Reduces a reference in a given context
		 *
		 * @access public
		 * @param string $reference The reference to reduce
		 * @param IReflection $context The reflection context for reduction
		 * @return string The reduced reference
		 */
		public function reduce($reference, IReflection $context)
		{
			$member = NULL;

			if (strpos($reference, '::') !== FALSE) {
				list($reference, $member) = explode('::', $reference);
			}

			$reduction = $reference;

			if (!self::isStandardType($reference)) {
				$parts     = explode('\\', $reduction);
				$reduction = '\\' . $reduction;
				$aliases   = array_merge(
					['' => $context->getName()],
					$context->getNamespaceAliases()
				);

				foreach ($aliases as $alias => $namespace) {
					$namespace_parts = explode('\\', $namespace);

					if (count($parts) < count($namespace_parts)) {
						continue;
					}

					if ($namespace_parts == array_slice($parts, 0, count($namespace_parts))) {
						$reduction = implode('\\', !$alias
							? array_slice($parts, count($namespace_parts))
							: array_merge(
								[$alias],
								array_slice($parts, count($namespace_parts))
							)
						);

						break;
					}
				}
			}

			return $member
				? implode('::', [$reduction, $member])
				: $reduction;
		}


		/**
		 * Sets external doc links used with `getLink()`
		 *
		 * The format of the `$links` argument should be an array whose keys match a possible
		 * reference in the document.  Possible references include things like class, trait, and
		 * interface names as well as standard PHP types and keywords.
		 *
		 * @access public
		 * @param array $links The external links configuration
		 * @return Writer The writer for method chaining
		 */
		public function setExternalDocs(array $links)
		{
			$this->externalDocs = $links;

			return $this;
		}


		/**
		 * Sets template data
		 *
		 * @access public
		 * @param array $data The data to set
		 * @return Writer The writer for method chaining
		 */
		public function setTemplateData(array $data)
		{
			$this->templateData = $data;

			return $this;
		}


		/**
		 * Compiles references of file paths to documents
		 *
		 * @access private
		 * @param array $documents A document collection keyed by directory structure
		 * @param string $output_path The output path for the document collection
		 * @return array The array of file => document references
		 */
		private function compile($documents, $output_path)
		{
			if (!$output_path) {
				$output_path = $this->outputPath;
			}

			foreach ($documents as $path => $child) {
				if (is_array($child)) {
					if ($path == 'no-namespace') {
						$this->compile($documents[$path], $output_path);

					} else {
						$child_output_path = $output_path . DIRECTORY_SEPARATOR . $path;

						if (!is_dir($child_output_path)) {
							if (!mkdir($child_output_path, 0755, TRUE)) {
								throw new Exception (
									'Could not write documentation, %s could not be created',
									$child_output_path
								);
							}

						} elseif (!is_writable($child_output_path)) {
							throw new Exception(
								'Could not write documentation, %s is not writable',
								$child_output_path
							);
						}

						$this->compile(
							$documents[$path],
							$child_output_path
						);
					}

				} else {
					$name = $child->getReflection()->getShortName();
					$file = $output_path . DIRECTORY_SEPARATOR . $name . '.md';

					$this->references[$file] = $child;
				}
			}

			return $this->references;
		}


		/**
		 * Sets the output path with validation
		 *
		 * @access private
		 * @param string $output_path A relative or absolute directory to hold output
		 * @return string The absolute real path for output
		 * @throws Exception If the path cannot be used for various reasons
		 */
		private function setOutputPath($output_path)
		{
			$path = realpath($output_path);

			if ($path === FALSE) {
				if (!mkdir($output_path, 0755, TRUE)) {
					throw new Exception(
						'Sage cound not create output path %s, permission denied',
						$output_path
					);
				}

				$path = realpath($output_path);
			}

			if (!is_dir($path) || !is_writable($path)) {
				throw new Exception(
					'Sage cannot output to path %s, not writable or not a directory',
					$path
				);
			}

			return $this->outputPath = $path;
		}


		/**
		 * Sets the template directory with validation
		 *
		 * @access private
		 * @param string $template_directory The directory containing templates to set
		 * @return void
		 * @throws Exception If the directory cannot be found or is not readable
		 */
		private function setTemplateDirectory($template_directory)
		{
			$this->templateDirectory = realpath($template_directory);

			if (!$this->templateDirectory || !is_readable($template_directory)) {
				throw new Exception(
					'Cannot use %s as template directory, does not exist or cannot be read',
					$template_directory
				);
			}
		}


		/**
		 * Writes all the documentation out to a file
		 *
		 * @access private
		 * @return void
		 */
		private function write()
		{
			foreach ($this->references as $file => $document) {
				$type     = $document->getType();
				$template = $this->templateDirectory . DIRECTORY_SEPARATOR . $type . '.php';

				if (!is_file($template)) {
					throw new Exception(
						'Cannot write documentation, template for type %s at %s is missing',
						$type,
						$template
					);
				}


				ob_start();
				$this->currentWriteDocument = $file;
				include $template;
				$this->currentWriteDocument = NULL;

				file_put_contents($file, ob_get_clean());
			}
		}
	}
}
