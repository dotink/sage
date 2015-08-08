<?php namespace Dotink\Sage\TokenParser {

	/**
	 * Responsible for parsing @throws tokens in a docblock.
	 *
	 * The validation and parsing will work against standard formats.  Each token should represent
	 * a single exception type thrown and the conditions under which it is thrown, such as:
	 *
	 * - `@throws Exception In the event that the configuration is ill-formatted`
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Sage
	 */
	class TokenThrows
	{
		const REGEX_VALID = '/
			[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\s+(.+) | # with description
			[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\s* |     # no description
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
			return preg_match(self::REGEX_VALID, $value);
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
			$parts = preg_split('/\s+/', $value, 2);

			if (count($parts) == 1) {
				return [
					'type' => trim($parts[0]),
					'note' => NULL
				];
			}

			return [
				'type' => trim($parts[0]),
				'note' => trim($parts[1])
			];
		}
	}
}
