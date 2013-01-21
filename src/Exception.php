<?php namespace Dotink\Sage {
	class Exception extends \Exception
	{
		public function __construct($message, $component = NULL)
		{
			if (func_num_args() > 1) {
				$message = vsprintf($message, array_slice(func_get_args(), 1));
			}

			parent::__construct($message);
		}
	}
}
