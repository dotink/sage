<?php namespace Dotink\Sage\TokenParser {

	/**
	 * Responsible for parsing @param tokens in a docblock.
	 *
	 * Each parameter token will be parsed into an array containing a `name`, `types`, and
	 * `details` key.  The `type` key will be an array as well in the event the parameter can
	 * be passed as multiple types.
	 *
	 * Examples of what is parseable:
	 *
	 * - `@param string $name Description of what this parameter is`
	 * - `@param string|File $input_file The file we want to read from`
	 * - `@param ...`
	 *
	 * If the param token is followed by a simple '...' it will automatically represent a ad
	 * infinitum number of repetitions of the preceding param.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Sage
	 */
	class TokenParam
	{
		const REGEX_VALID = '/
			(.+)\s+(?:\&)?\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\s+(.+) | # with description
			(.+)\s+(?:\&)?\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\s*     | # no description
			\.\.\.\s*     		                                              # implying variable params
		/xi';


		/**
		 * The previous definition used for reference in the event of `...`
		 *
		 * @static
		 * @access private
		 * @var array
		 */
		static public $previousDefinition = NULL;


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
			$parts      = preg_split('/\s+/', $value, 3);
			$definition = [
				'name'    => NULL,
				'types'   => array(),
				'details' => NULL
			];

			switch (count($parts)) {
				case 3:
					$definition['details'] = $parts[2];
				case 2:
					$definition['name']    = $parts[1];
				case 1:
					$definition['types']   = explode('|', $parts[0]);

					if ($definition['types'] == ['...']) {
						$definition['types']   = self::$previousDefinition['types'];
						$definition['name']    = '$...';
						$definition['details'] = 'ad infinitum';
					}
			}

			return self::$previousDefinition = $definition;
		}
	}
}
