<?php namespace Dotink\Sage\TokenParser {

	/**
	 * Responsible for parsing @author tokens in a docblock.
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
	class TokenAuthor
	{
		const REGEX_VALID_AND_MATCH = '/
			([\w(?:\.|\s+|\.\s+)?]+(?:\s+|$)?)?  # Name followed by optional space or end of line
			(?:\[(.+)\](?:\s+|$)?)?              # Handle followed by optional space or end of line
			(?:\<(.+)\>(?:\s*))?                 # Email address (non-validated)
		/xi';


		/**
		 * Validates that the value for the token looks OK
		 *
		 * @static
		 * @access public
		 * @param string $value The value for the token
		 * @return boolean TRUE if the value validates, FALSE otherwise
		 */
		static public function validate($value)
		{
			return preg_match(self::REGEX_VALID_AND_MATCH, $value)
				? TRUE
				: FALSE;
		}


		/**
		 * Parses the value into usable information
		 *
		 * @static
		 * @access public
		 * @param string $value The value for the token
		 * @return array A list of parsed information, keyed by information type
		 */
		static public function parse($value)
		{
			preg_match(self::REGEX_VALID_AND_MATCH, $value, $matches);

			if (!isset($matches[1])) { $matches[1] = NULL; }
			if (!isset($matches[2])) { $matches[2] = NULL; }
			if (!isset($matches[3])) { $matches[3] = NULL; }

			$info = [
				'name'   => trim($matches[1]),
				'handle' => trim($matches[2]),
				'email'  => trim($matches[3])
			];

			$matches = array();

			return $info;
		}
	}
}
