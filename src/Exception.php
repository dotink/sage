<?php namespace Dotink\Sage {

	/**
	 * A custom exception class to differentiate Sage exceptions from other types.
	 *
	 * This exception class supports using sprintf style arguments to construct a message.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.txt file at the root of this distribution
	 *
	 * @package Sage
	 */
	class Exception extends \Exception
	{
		/**
		 * Creates a new Sage exception
		 *
		 * @param string $message A printf style message
		 * @param mixed $compontent A component for any placeholders in the message
		 * @param ...
		 */
		public function __construct($message, $component = NULL)
		{
			if (func_num_args() > 1) {
				$message = vsprintf($message, array_slice(func_get_args(), 1));
			}

			parent::__construct($message);
		}
	}
}
