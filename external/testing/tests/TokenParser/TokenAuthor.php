<?php namespace Dotink\Lab {

	use Dotink\Sage\TokenParser;

	return [

		'setup' => function($data) {
			needs(implode(DS, [
				$data['app_root'],
				'src',
				'TokenParsers',
				'TokenAuthor.php'
			]));
		},

		'tests' => [

			//
			//
			//

			'validate()' => function() {
				assert('Dotink\Sage\TokenParser\TokenAuthor::validate')

					-> with('Matthew J. Sahagian [mattsah] <msahagian@dotink.org>')
					-> equals(TRUE)

					-> with('Matthew J. Sahagian')
					-> equals(TRUE)

					-> with('[mattsah] <msahagian@dotink.org>')
					-> equals(TRUE)

					-> with('Matthew J. Sahagian <msahagian@dotink.org>')
					-> equals(TRUE)

					-> with('<msahagian@dotink.org>')
					-> equals(TRUE)

					-> with('[mattsah]')
					-> equals(TRUE)

					-> with('Matthew J. Sahagian [mattsah]')
					-> equals(TRUE)
				;
			},

			//
			//
			//

			'parse()' => function() {
				assert('Dotink\Sage\TokenParser\TokenAuthor::parse')

					-> with('Matthew J. Sahagian [mattsah] <msahagian@dotink.org>')
					-> equals([
						'name'   => 'Matthew J. Sahagian',
						'handle' => 'mattsah',
						'email'  => 'msahagian@dotink.org'
					])

					-> with('Matthew J. Sahagian')
					-> equals([
						'name'   => 'Matthew J. Sahagian',
						'handle' => '',
						'email'  => ''
					])

					-> with('[mattsah] <msahagian@dotink.org>')
					-> equals([
						'name'   => '',
						'handle' => 'mattsah',
						'email'  => 'msahagian@dotink.org'
					])

					-> with('Matthew J. Sahagian <msahagian@dotink.org>')
					-> equals([
						'name'   => 'Matthew J. Sahagian',
						'handle' => '',
						'email'  => 'msahagian@dotink.org'
					])

					-> with('<msahagian@dotink.org>')
					-> equals([
						'name'   => '',
						'handle' => '',
						'email'  => 'msahagian@dotink.org'
					])

					-> with('[mattsah]')
					-> equals([
						'name'   => '',
						'handle' => 'mattsah',
						'email'  => ''
					])

					-> with('Matthew J. Sahagian [mattsah]')
					-> equals([
						'name'   => 'Matthew J. Sahagian',
						'handle' => 'mattsah',
						'email'  => ''
					])
				;
			}
		]
	];
}
