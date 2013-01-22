<?php namespace Dotink\Lab {

	use Dotink\Sage\TokenParser;

	return [

		'setup' => function($data) {
			needs(implode(DS, [
				$data['app_root'],
				'src',
				'TokenParsers',
				'TokenReturn.php'
			]));
		},

		'tests' => [

			//
			//
			//

			'validate()' => function() {
				assert('Dotink\Sage\TokenParser\TokenReturn::validate')

					-> with('int This should validate')
					-> equals(TRUE)

					-> with('int')
					-> equals(FALSE)

					-> with('int|boolean This should also not validate')
					-> equals(FALSE)

					-> with('int        This should validate')
					-> equals(TRUE)

					-> with('float|int         This should also not validate')
					-> equals(FALSE)

					-> with('void')
					-> equals(TRUE)

					-> with('void     ')
					-> equals(TRUE);
			},

			//
			//
			//

			'parse()' => function() {
				assert('Dotink\Sage\TokenParser\TokenReturn::parse')

					-> with('int An integer to be returned')
					-> equals([
						'type'  => 'int',
						'note'  => 'An integer to be returned'
					])

					-> with('void')
					-> equals([
						'type'  => NULL,
						'note'  => NULL
					]);
			}
		]
	];
}
