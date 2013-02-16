<?php namespace Dotink\Sage {

	use TokenReflection;
	use TokenReflection\IReflection;

	/**
	 * A representation of a single document in the documentation.
	 *
	 * Although these are generally thought of as single pages, it is possible for them to be
	 * nested in one another.  That is to say, because a `Document` is also a `DocumentCollection`
	 * it may contain additional sub-documents.  Classes for example will contain Methods.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Sage
	 */
	class Document extends DocumentCollection
	{
		const TYPE_CONSTANT  = 'constant';
		const TYPE_FUNCTION  = 'function';

		const TYPE_INTERFACE = 'interface';
		const TYPE_CLASS     = 'class';
		const TYPE_TRAIT     = 'trait';

		const TYPE_PROPERTY  = 'property';
		const TYPE_METHOD    = 'method';


		/**
		 * The description of the document as parsed from the docblock
		 *
		 * @access private
		 * @var string
		 */
		private $description = NULL;


		/**
		 * The details of the document as parsed from the docblock
		 *
		 * @access private
		 * @var string
		 */
		private $details = NULL;


		/**
		 * The information array which contains tokens and their parsed values
		 *
		 * @access private
		 * @var array
		 */
		private $info = array();


		/**
		 * The keys associated with this document (static, final, abstract, public, etc)
		 *
		 * @access private
		 * @var array
		 */
		private $keys = array();


		/**
		 * The token reflection for the document
		 *
		 * @access private
		 * @var IReflection
		 */
		private $reflection = NULL;


		/**
		 * The type of this document (class, method, property, trait, etc)
		 *
		 * @access private
		 * @var string
		 */
		private $type = NULL;


		/**
		 * Creates a new document
		 *
		 * @access public
		 * @param IReflection $reflection The reflection to use
		 * @param Generator $generator The generator that is creating this document
		 * @return Document The document for method chaining
		 */
		public function __construct(IReflection $reflection, $generator, IReflection $context = NULL)
		{
			$this->reflection = $reflection;
			$this->generator  = $generator;

			if ($reflection instanceof TokenReflection\IReflectionConstant) {
				$this->type = self::TYPE_CONSTANT;

			} elseif ($reflection instanceof TokenReflection\IReflectionFunction) {
				$this->type = self::TYPE_FUNCTION;

			} elseif ($reflection instanceof TokenReflection\IReflectionProperty) {
				$this->type   = self::TYPE_PROPERTY;
				$this->keys[] = 'property';

				$this->keyModifiers($context);

			} elseif ($reflection instanceof TokenReflection\IReflectionMethod) {
				$this->type   = self::TYPE_METHOD;
				$this->keys[] = 'method';

				$this->keyModifiers($context);

			} elseif ($reflection instanceof TokenReflection\IReflectionClass) {
				$this->type = $reflection->isTrait() ? self::TYPE_TRAIT     : (
					$reflection->isInterface()       ? self::TYPE_INTERFACE :
					                                   self::TYPE_CLASS
				);

				foreach ($reflection->getProperties() as $property) {
					$document          = new self($property, $this->generator, $reflection);
					$this->documents[] = $document;
				}

				foreach ($reflection->getMethods() as $method) {
					$document          = new self($method, $this->generator, $reflection);
					$this->documents[] = $document;
				}
			}

			$this->parseDocComment();
		}


		/**
		 * Gets the description of the document
		 *
		 * @access public
		 * @return string The description of the document
		 */
		public function getDescription()
		{
			return $this->description;
		}


		/**
		 * Gets the details of the document
		 *
		 * @access public
		 * @return string The details of the document
		 */
		public function getDetails()
		{
			return $this->details;
		}


		/**
		 * Gets the information for a particular token
		 *
		 * When a token is retrieved using this method it is removed from the information stack.
		 * This allows you to iterate with this method to extract all values in templating.
		 *
		 * @access public
		 * @param string $token The token to get information for
		 * @return mixed An array or string containing the parsed information
		 */
		public function getInfo($token)
		{
			if (!$this->hasInfo($token) || !count($this->info[$token])) {
				return NULL;
			}

			return array_shift($this->info[$token]);
		}


		/**
		 * Allows for getting the reflection for additional information about the `Document`
		 *
		 * @access public
		 * @return IReflection The reflection that the document represents
		 */
		public function getReflection()
		{
			return $this->reflection;
		}


		/**
		 * Allows for getting the keys of the document
		 *
		 * @access public
		 * @return array The keys assigned to the document
		 */
		public function getKeys()
		{
			return $this->keys;
		}


		/**
		 * Allows for getting the type of document
		 *
		 * @access public
		 * @return string The type of the document
		 */
		public function getType()
		{
			return $this->type;
		}


		/**
		 * Determines if token information is available in the information array
		 *
		 * @access public
		 * @return boolean TRUE if there is information for that token, FALSE otherwise
		 */
		public function hasInfo($token)
		{
			return isset($this->info[$token]);
		}


		/**
		 * Keys any modifier information we can glean from our reflection
		 *
		 * @access private
		 * @param IReflection $context The context with which we want to analyze the reflection
		 * @return void
		 */
		private function keyModifiers($context)
		{
			if ($declaring_class = $this->reflection->getDeclaringClass()) {
				if ($declaring_class != $context) {
					$this->keys[] = 'inherited';
					$this->keys[] = 'external';
				}

			} elseif ($declaring_trait = $this->reflection->getDeclaringTrait()) {
				if ($declaring_trait != $context) {
					$this->keys[] = 'included';
					$this->keys[] = 'external';
				}
			}

			if ($this->type == self::TYPE_METHOD) {
				if ($this->reflection->isFinal())    { $this->keys[] = 'final';     }
				if ($this->reflection->isAbstract()) { $this->keys[] = 'abstract';  }
			}

			if ($this->reflection->isPublic())       { $this->keys[] = 'public';    }
			if ($this->reflection->isPrivate())      { $this->keys[] = 'private';   }
			if ($this->reflection->isProtected())    { $this->keys[] = 'protected'; }

			if ($this->reflection->isStatic())       { $this->keys[] = 'static';    }
			else                                     { $this->keys[] = 'instance';  }
		}


		/**
		 * Parses a doc comment (intelligently)
		 *
		 * Unlike other docblock parsers, we do not require the "short description" to be a single
		 * line.  Instead we look for the first line break to split the "description" vs. the
		 * details which is every line that follows until the first `@`.
		 *
		 * @access private
		 * @return void
		 */
		private function parseDocComment()
		{
			$doc_comment = trim($this->reflection->getDocComment());
			$description = array();
			$details     = array();
			$info        = array();

			if (!$doc_comment) {

				//
				// These can use the file doc comment instead of their own as we assume
				// there is only one per file.
				//

				$file_compatible_types = [
					self::TYPE_CLASS,
					self::TYPE_TRAIT,
					self::TYPE_INTERFACE
				];

				if (in_array($this->type, $file_compatible_types)) {
					$doc_comment = $this->reflection->getFileReflection()->getDocComment();
				}

			}

			$lines = explode("\n", $doc_comment);

			foreach ($lines as $i => $line) {
				$line = ltrim($line, "/* \t");

				if (isset($line[0]) && $line[0] == '@') {
					break;
				}

				if (is_array($description)) {
					$description[] = $line;

					if (!isset($lines[$i + 1]) || !ltrim($lines[$i + 1], "/* \t")) {
						$description = trim(implode("\n", $description));
					}

				} else {
					$details[] = $line;
				}
			}

			$details = trim(implode("\n", $details));

			for ($x = $i; $x < count($lines); $x ++) {
				$parts = preg_split('/[\s]+/', ltrim($lines[$x], "/@ *\t"), 2);
				$token = $parts[0];
				$value = isset($parts[1])
					? $parts[1]
					: NULL;

				if ($token) {
					$this->parseToken($token, $value);
				}
			}


			$this->description = $description;
			$this->details     = $details;
		}


		/**
		 * Parses a token and adds it's value to the info array
		 *
		 * This method looks to the generator to get a token parser and then attempts to parse
		 * a value using that token parser.
		 *
		 * @access private
		 * @param string $token The token (type) we're parding
		 * @param string $value The value (all content after the token itself)
		 * @return void
		 * @throws Exception In the event the parser does not validate the value
		 */
		private function parseToken($token, $value)
		{
			$token_parser = $this->generator->getTokenParser($token);

			if (!$token_parser) {
				return;
			}

			if (!$token_parser::validate($value)) {
				throw new Exception(
					'Improperly formatted docblock token and value `@%s %s` in document %s',
					$token,
					$value,
					$this->reflection->getFileName()
				);
			}

			if (!isset($this->info[$token])) {
				$this->info[$token] = array();
			}

			$this->info[$token][] = $token_parser::parse($value);
		}
	}
}
