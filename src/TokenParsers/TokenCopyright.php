<?php namespace Dotink\Sage\TokenParser {

	/**
	 * Responsible for parsing @copyright tokens in a docblock.
	 *
	 * No additional parsing of the string which follows the copyright is done, so it will not
	 * independently parse the year or names or anything like that.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.txt file at the root of this distribution
	 *
	 * @package Sage
	 */
	class TokenCopyright
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
			return $value;
		}
	}
}
