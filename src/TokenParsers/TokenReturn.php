<?php namespace Dotink\Sage\TokenParser {

	/**
	 * Responsible for parsing return tokens in a docblock.
	 *
	 * The validation and parsing will work against standard return formats, such as:
	 *
	 * - `@return void`
	 * - `@return boolean TRUE if the logic suceeded, FALSE otherwise`
	 *
	 * It will **not** accept an empty return value as equivalent to `void` and it will not accept
	 * returns with multiple types.  If your function returns multiple types you can specify
	 * multiple returns, for which the template will decide how to display that.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.txt file at the root of this distribution
	 *
	 * @package Sage
	 */
	class TokenReturn
	{
		const REGEX_VALID = '/
			void\s*$|[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\s+.*
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
		 * @return array An list of parsed information, keyed by information type
		 */
		static public function parse($value)
		{
			$parts = preg_split('/\s+/', $value, 2);

			if (count($parts) == 1 && $parts[0] == 'void') {
				return [
					'type' => NULL,
					'note' => NULL
				];
			} else {
				return [
					'type' => trim($parts[0]),
					'note' => trim($parts[1])
				];
			}
		}
	}
}
