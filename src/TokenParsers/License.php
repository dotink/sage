<?php namespace Dotink\Sage\TokenParser {

	/**
	 * Responsible for parsing license tokens in a docblock.
	 *
	 * No additional parsing of the license string is done, however, in some documentation
	 * templates it may be the case that if the string begins with 'http://' it could auto-link
	 * assuming it's a URL to the license.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.txt file at the root of this distribution
	 *
	 * @package Sage
	 */
	class License
	{
		/**
		 * Validates that the copyright value looks OK
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
		 * Parses the value into an information array
		 *
		 * @static
		 * @access public
		 * @param string $value The value for the token
		 * @return array The information array
		 */
		static public function parse($value)
		{
			return $value;
		}
	}
}
