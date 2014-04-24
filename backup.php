<?php
use Aws\S3\S3Client;
require_once __DIR__ . '/vendor/autoload.php';
var_dump($argv);

$client = S3Client::factory(array(
	'key'    => '<aws access key>',
	'secret' => '<aws secret key>'
));