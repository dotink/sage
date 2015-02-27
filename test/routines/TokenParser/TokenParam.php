<?php namespace Dotink\Lab {

	use Dotink\Sage\TokenParser;

	return [

		'setup' => function($data) {
			needs(implode(DS, [
				$data['app_root'],
				'src',
				'TokenParsers',
				'TokenParam.php'
			]));
		},

		'tests' => [

			//
			//
			//

			'validate()' => function() {
				assert('Dotink\Sage\TokenParser\TokenParam::validate')

					-> with('int $test This parameter does not do much')
					-> equals(TRUE)

					-> with('int $foo')
					-> equals(FALSE)

					-> with('int|boolean This one should fail too')
					-> equals(FALSE);
			},

			//
			//
			//

			'parse()' => function() {
				assert('Dotink\Sage\TokenParser\TokenParam::parse')

					-> with('int $test This parameter does not do much')
					-> equals([
						'types'   => [0 => 'int'],
						'name'    => '$test',
						'details' => 'This parameter does not do much'
					])

					-> with('boolean|string $test This parameter has multiple types')
					-> equals([
						'types'   => [0 => 'boolean', 1 => 'string'],
						'name'    => '$test',
						'details' => 'This parameter has multiple types'
					]);
			}
		]
	];
}
