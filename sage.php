<?php namespace Dotink\Sage {

	include __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

	use TokenReflection;

	if (!isset($argv[1])) {
		echo 'Usage: php sage.php <input_path> [<output_path>]' . PHP_EOL;
		exit(1);
	}

	$backend             = new TokenReflection\Broker\Backend\Memory();
	$broker              = new TokenReflection\Broker($backend);
	$sage                = new Generator($broker);
	$document_collection = $sage->run($argv[1]);
	$template_directory  = __DIR__ . DIRECTORY_SEPARATOR . 'templates';

	(new Writer(isset($argv[2]) ? $argv[2] : NULL, $template_directory))
		-> setExternalDocs($sage->getConfig('external_docs'))
		-> setTemplateData($sage->getConfig('template_data'))
		-> buildDocumentation($document_collection);

	exit(0);
}

