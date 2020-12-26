<?php

require __DIR__ . "/../vendor/autoload.php";

$api_key = '';
$convertkit = new \EbrahimPLeite\ConvertKit\ConvertKit($api_key);

$subscribe = $convertkit->addSubscribe(
    "123", //required (form_id)
    "email@example.com", //required (email)
    "Ebrahim", //required (first_name)
    [123, 1234], //optional array separate tags ids with commas (tags)
    "P. Leite" //optional (last_name)
);
var_dump($subscribe);