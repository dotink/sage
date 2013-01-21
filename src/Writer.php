<?php namespace Dotink\Sage {

	/**
	 * Provides documentation writing services by outputting to a particular directory
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.txt file at the root of this distribution
	 *
	 * @package Sage
	 */
	class Writer
	{
		const DEFAULT_OUTPUT_PATH = 'sage_output';


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
		 * @access private
		 * @param array $documents A document collection keyed by directory structure
		 * @return void
		 */
		public function buildDocumentation($documents)
		{
			$this->buildDocumentationInPath($documents, NULL);
		}


		/**
		 * Builds our documentation for a single document in a particular file
		 *
		 * @access private
		 * @param array $document A document to build documentation for
		 * @param string $file The file to build the documentation in
		 * @return int|FALSE Number of bytes written or FALSE on failure
		 */
		private function buildDocumentationInFile($document, $file)
		{
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
			include $template;
			return  file_put_contents($file, ob_get_clean());
		}


		/**
		 * Builds our documentation in a particular directory
		 *
		 * @access private
		 * @param array $documents A document collection keyed by directory structure
		 * @param string $output_path The output path for the document collection
		 * @return void
		 */
		private function buildDocumentationInPath($documents, $output_path)
		{
			if (!$output_path) {
				$output_path = $this->outputPath;
			}

			foreach ($documents as $path => $child) {
				if (is_array($child)) {
					if ($path == 'no-namespace') {
						$this->buildDocumentationInPath($documents[$path], $output_path);

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

						$this->buildDocumentationInPath(
							$documents[$path],
							$child_output_path
						);
					}

				} else {
					$name = $child->getReflection()->getShortName();
					$file = $output_path . DIRECTORY_SEPARATOR . $name . '.md';

					$this->buildDocumentationInFile($child, $file);
				}
			}
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
	}
}
