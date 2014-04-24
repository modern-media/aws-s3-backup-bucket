<?php
use Aws\S3\S3Client;
require_once __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('UTC');

//$argv[1] should be the credentials file
$crd = require $argv[1];
$client = S3Client::factory($crd);

//$argv[2] should be the bucket name
$bucket = $argv[2];

//$argv[3] should be an existing directory
$parent_dir = $argv[3];

if (! is_dir($parent_dir) || ! is_writable($parent_dir)){
	throw new Exception('The directory you specified does not exist or is not writable.');
}

$path = realpath($parent_dir);
$path .= DIRECTORY_SEPARATOR . $bucket;
if (! is_dir($path)){
	mkdir($path);
}
$client->downloadBucket($path, $bucket);


/**
$iterator = $client->getIterator('ListObjects', array(
	'Bucket' => $bucket
));

$client->downloadBucket('/local/directory', 'my-bucket');

foreach ($iterator as $object) {
	echo $object['Key'] . "\n";
}
*/