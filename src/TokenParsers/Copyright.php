<?php namespace Dotink\Sage\TokenParser {

	/**
	 * The `Copyright` class is responsible for parsing copyright tokens in a docblock.
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
	class Copyright
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
