<?php namespace Dotink\Sage\TokenParser {

	/**
	 * The `Author` class is responsible for parsing author tokens in a docblock.
	 *
	 * The parser will attempt to parse out `name`, `handle`, and `email` keys from strings which
	 * look like the following:
	 *
	 * `Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * If any one of these pieces is missing it should still get all the information that is
	 * available with missing pieces represented as an empty string.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.txt file at the root of this distribution
	 *
	 * @package Sage
	 */
	class Author
	{
		const REGEX_VALID = '/
			([\w(?:\.|\s+|\.\s+)?]+(?:\s+|$)?)?  # Name followed by optional space or end of line
			(?:\[(.*)\](?:\s+|$)?)?              # Handle followed by optional space or end of line
			(?:\<(.*)\>(?:\s*))?                 # Email address (non-validated)
		/xi';


		/**
		 * Matches of our validation test which we can use for actual parsing
		 *
		 * @static
		 * @access private
		 * @var array
		 */
		static public $matches = array();


		/**
		 * Validates that the value looks like a proper param
		 *
		 * @static
		 * @access public
		 * @param string $value The value for the token
		 * @return boolean TRUE if the value validates, FALSE otherwise
		 */
		static public function validate($value)
		{
			return preg_match(self::REGEX_VALID, $value, self::$matches);
		}


		/**
		 * Parses the value into an information array
		 *
		 * @static
		 * @access public
		 * @param string $value The value for the token
		 * @return array The information array
		 */
		static public function parse($value)
		{
			$info = [
				'name'   => self::$matches[1],
				'handle' => self::$matches[2],
				'email'  => self::$matches[3]
			];

			self::$matches = array();
			return $info;
		}
	}
}
