<?php

require __DIR__ . "/../vendor/autoload.php";

$api_key = '';
$api_secret = '';
$convertkit = new \EbrahimPLeite\ConvertKit\ConvertKit($api_key, $api_secret);

$unsubscribe = $convertkit->removeSubscribe("email@example.com");
var_dump($unsubscribe);