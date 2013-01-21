<?php namespace Dotink\Sage\TokenParser {

	class Param
	{
		const REGEX_VALID = '/
			(.*)\s+\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\s+(.*) |
			\.\.\.\s+
		/x';


		/**
		 * The previous definition used for reference in the event of ...
		 *
		 * @static
		 * @access private
		 * @var array
		 */
		static public $previousDefinition = NULL;


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
			return preg_match(self::REGEX_VALID, $value);
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
