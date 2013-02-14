<?php namespace Dotink\Sage {

	use TokenReflection;

	/**
	 * Provides documentation generation service by reading a particular source directory
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Sage
	 */
	class Generator
	{
		/**
		 * The token reflection broker of the generator
		 *
		 * @access private
		 * @var TokenReflection\Broker
		 */
		private $broker = NULL;


		/**
		 * A collection of documents
		 *
		 * @access private
		 * @var array
		 */
		private $documents = array();


		/**
		 * The input path we will be scanning for source code
		 *
		 * @access private
		 * @var string
		 */
		private $inputPath = NULL;


		/**
		 * Options and values for the generator
		 *
		 * @access private
		 * @var array
		 */
		private $options = array();


		/**
		 * Creates a new generator
		 *
		 * @access public
		 * @param TokenReflection\Broker $broker The token reflection broker to use for reflection
		 * @return void
		 */
		public function __construct(TokenReflection\Broker $broker)
		{
			$this->broker = $broker;
		}


		/**
		 * Gets the token parser class for a given token
		 *
		 * @access public
		 * @param string $token The token to get a parser for
		 * @return string The class for parsing the token, or NULL if not available
		 */
		public function getTokenParser($token)
		{
			$default = __NAMESPACE__ . '\\TokenParser\\Token' . ucwords($token);

			if (isset($this->tokenParsers[$token])) {
				return $this->tokenParsers[$token];
			}

			if (class_exists($default)) {
				return $default;
			}

			return NULL;
		}


		/**
		 * Runs the documentation generator
		 *
		 * @access public
		 * @param string $input_path A relative or absolute directory to scan
		 * @param array $options An array of options and their values
		 * @return void
		 */
		public function run($input_path)
		{
			$this->setInputPath($input_path);

			for (
				$config_path  = realpath($this->inputPath);

				$config_path != realpath($config_path . DIRECTORY_SEPARATOR . '..')
				&& !is_readable($config_path . DIRECTORY_SEPARATOR . 'sage.config');

				$config_path  = realpath($config_path . DIRECTORY_SEPARATOR . '..')
			);

			$options = file_exists($config_path . DIRECTORY_SEPARATOR . 'sage.config')
				? include $config_path . DIRECTORY_SEPARATOR . 'sage.config'
				: array();

			$reflections   = $this->broker->processDirectory($this->inputPath, [], TRUE);
			$sort_by_type  = !empty($options['sort_by_type']);
			$token_parsers = !empty($options['token_parsers'])
				? $options['token_parsers']
				: array();

			$this->configTokenParsers($token_parsers);
			$this->makeDocumentCollection($reflections, $sort_by_type);

			foreach ($reflections as $reflection) {
				foreach ($reflection->getNamespaces() as $namespace) {

					//
					// Add our class type structures
					//

					foreach ($namespace->getClasses() as $structure) {
						$root =& $this->documents;

						if ($sort_by_type) {
							if ($structure->isTrait()) {
								$root =& $this->documents['traits'];

							} elseif ($structure->isInterface()) {
								$root =& $this->documents['interfaces'];

							} else {
								$root =& $this->documents['classes'];
							}
						}

						foreach (explode('\\', $namespace->getName()) as $segment) {
							$root =& $root[$segment];
						}

						$root[] = new Document($structure, $this);
					}

					//
					// Add our function type structures
					//

					foreach ($namespace->getFunctions() as $function) {
						$root =& $this->documents;

						if ($sort_by_type) {
							$root = &$this->documents['functions'];
						}

						foreach (explode('\\', $namespace->getName()) as $segment) {
							$root =& $root[$segment];
						}

						$root[] = new Document($function, $this);
					}
				}
			}

			return $this->documents;
		}


		/**
		 * Makes a document collection
		 *
		 * If the document collection is sorted by type then then the various documents will still
		 * be in separate directories per namespace, however, they will be rooted based on the
		 * type of structure.  So, for example:
		 *
		 * `/classes/Dotink/Sage/Generator.md`
		 *
		 * Which without sorting by type would normally be in:
		 *
		 * `/Dotink/Sage/Generator.md`
		 *
		 * @access private
		 * @param array $reflection A list of token reflections
		 * @param boolean $sort_by_type Whether or not we should sort by type
		 * @return void
		 */
		private function makeDocumentCollection($reflections, $sort_by_type)
		{
			foreach ($reflections as $reflection) {
				foreach ($reflection->getNamespaces() as $namespace) {
					$head =& $this->documents;

					foreach (explode('\\', $namespace->getName()) as $segment) {
						if (!isset($head['segment'])) {
							$head[$segment] =  array();
						}

						$head =& $head[$segment];
					}
				}
			}

			if ($sort_by_type) {
				$this->documents = [
					'interfaces' => $this->documents,
					'classes'    => $this->documents,
					'traits'     => $this->documents,
					'functions'  => $this->documents
				];
			}
		}


		/**
		 * Configures token parsers from an array, filtering out bad ones
		 *
		 * @access private
		 * @param array $token_parsers A list of classes for parsing tokens, keyed by the token
		 * @return void
		 */
		private function configTokenParsers($token_parsers)
		{
			if (count($token_parsers)) {
				foreach ($token_parsers as $token => $class) {
					if (is_callable([$class, 'validate']) && is_callable([$class, 'parse'])) {
						$this->tokenParsers[$token] = $class;
					}
				}
			}
		}


		/**
		 * Sets the input path with validation
		 *
		 * @access private
		 * @param string $input_path A relative or absolute directory to scan
		 * @return string The absolute real path for input
		 * @throws Exception If the path cannot be used for various reasons
		 */
		private function setInputPath($input_path)
		{
			$path = realpath($input_path);

			if ($path === FALSE) {
				throw new Exception(
					'Cannot use input path %s, file/directory does not exist',
					$input_path
				);
			}

			if (!is_dir($path)) {
				throw new Exception(
					'Sage cannot process individual file %s, please provide a directory',
					$path
				);
			}

			return $this->inputPath = $path;
		}
	}
}
