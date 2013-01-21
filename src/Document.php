<?php namespace Dotink\Sage {

	use TokenReflection;

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
		 *
		 */
		private $description = NULL;


		/**
		 *
		 */
		private $details = NULL;


		/**
		 *
		 */
		private $info = array();


		/**
		 *
		 */
		private $keys = array();


		/**
		 *
		 */
		private $reflection = NULL;


		/**
		 *
		 */
		private $type = NULL;


		/**
		 * Creates a new document
		 *
		 * @access public
		 * @param TokenReflection\IReflection $reflection The reflection to use
		 * @param Generator The generator that is creating this document
		 * @return Document The document for method chaining
		 */
		public function __construct(TokenReflection\IReflection $reflection, $generator)
		{
			$this->reflection = $reflection;
			$this->generator  = $generator;

			if ($reflection instanceof TokenReflection\IReflectionConstant) {
				$this->type = self::TYPE_CONSTANT;

			} elseif ($reflection instanceof TokenReflection\IReflectionFunction) {
				$this->type = self::TYPE_FUNCTION;

			} elseif ($reflection instanceof TokenReflection\IReflectionProperty) {
				$this->type = self::TYPE_PROPERTY;

			} elseif ($reflection instanceof TokenReflection\IReflectionMethod) {
				$this->type = self::TYPE_METHOD;

			} elseif ($reflection instanceof TokenReflection\IReflectionClass) {
				$this->type = $reflection->isTrait() ? self::TYPE_TRAIT     : (
					$reflection->isInterface()       ? self::TYPE_INTERFACE :
					                                   self::TYPE_CLASS
				);

				foreach ($reflection->getProperties() as $property) {
					$document          = new self($property, $this->generator);
					$this->documents[] = $document;
					$document->keys[]  = 'property';

					if ($property->isPublic())    { $document->keys[] = 'public';    }
					if ($property->isPrivate())   { $document->keys[] = 'private';   }
					if ($property->isProtected()) { $document->keys[] = 'protected'; }
					if ($property->isStatic())    { $document->keys[] = 'static';    }
					else                          { $document->keys[] = 'instance';  }
				}

				foreach ($reflection->getMethods() as $method) {
					$document          = new self($method, $this->generator);
					$this->documents[] = $document;
					$document->keys[]  = 'method';

					if ($method->isFinal())     { $document->keys[] = 'final';     }
					if ($method->isAbstract())  { $document->keys[] = 'abstract';  }

					if ($method->isPublic())    { $document->keys[] = 'public';    }
					if ($method->isPrivate())   { $document->keys[] = 'private';   }
					if ($method->isProtected()) { $document->keys[] = 'protected'; }

					if ($method->isStatic())    { $document->keys[] = 'static';    }
					else                        { $document->keys[] = 'instance';  }
				}
			}

			$this->parseDocComment();
		}


		/**
		 *
		 */
		public function getDescription()
		{
			return $this->description;
		}


		/**
		 *
		 */
		public function getDetails()
		{
			return $this->details;
		}


		/**
		 *
		 */
		public function getInfo($token)
		{
			if (!$this->hasInfo($token) || !count($this->info[$token])) {
				return NULL;
			}

			return array_shift($this->info[$token]);
		}


		/**
		 * Allows for getting the reflection for basic information
		 *
		 * @access public
		 * @return TokenReflection\IReflection The reflection that the document represents
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
		 *
		 */
		public function hasInfo($token)
		{
			return isset($this->info[$token]);
		}


		/**
		 *
		 */
		private function parseDocComment()
		{
			$lines        = explode("\n", $this->reflection->getDocComment());
			$description  = array();
			$details      = array();
			$info         = array();

			foreach ($lines as $i => $line) {
				$line = ltrim($line, "/* \t");

				if (isset($line[0]) && $line[0] == '@') {
					break;
				}

				if (is_array($description)) {
					$description[] = $line;

					if (!isset($lines[$i + 1]) || !ltrim($lines[$i + 1], "/* \t")) {
						$description = trim(implode("\n", $description), "\n");
					}

				} else {
					$details[] = $line;
				}
			}

			$details = trim(implode("\n", $details), "\n");

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
		 *
		 */
		private function parseToken($token, $value)
		{
			$token_parser = $this->generator->getTokenParser($token);

			if (!$token_parser) {
				return;
			}

			if ($token_parser::validate($value)) {
				if (!isset($this->info[$token])) {
					$this->info[$token] = array();
				}

				$this->info[$token][] = $token_parser::parse($value);
			}
		}
	}
}
