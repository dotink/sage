<?php namespace Dotink\Sage\TokenParser {

	/**
	 * Responsible for parsing @example tokens in a docblock.
	 *
	 * No additional parsing of the string will be done using this class, however, views may
	 * check to see if strings begin with http:// or something to use links vs. including local
	 * files, etc.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Sage
	 */
	class TokenExample
	{
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
			$value = trim($value);

			return !empty($value);
		}


		/**
		 * Parses the value into usable information
		 *
		 * @static
		 * @access public
		 * @param string $value The value for the token
		 * @return string The value for the token
		 */
		static public function parse($value)
		{
			return trim($value);
		}
	}
}
