# ConvertKit @EbrahimPLeite

[![Maintainer](http://img.shields.io/badge/maintainer-@ebrahimpleite-blue.svg?style=flat-square)](http://linkedin.com/in/ebrahimpleite)
[![Source Code](http://img.shields.io/badge/source-ebrahimpleite/convertkit-blue.svg?style=flat-square)](https://github.com/ebrahimpleite/convertkit)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/ebrahimpleite/convertkit.svg?style=flat-square)](https://packagist.org/packages/ebrahimpleite/convertkit)
[![Latest Version](https://img.shields.io/github/release/ebrahimpleite/convertkit.svg?style=flat-square)](https://github.com/ebrahimpleite/convertkit/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/ebrahimpleite/convertkit.svg?style=flat-square)](https://scrutinizer-ci.com/g/ebrahimpleite/convertkit)
[![Quality Score](https://img.shields.io/scrutinizer/g/ebrahimpleite/convertkit.svg?style=flat-square)](https://scrutinizer-ci.com/g/ebrahimpleite/convertkit)
[![Total Downloads](https://img.shields.io/packagist/dt/ebrahimpleite/convertkit.svg?style=flat-square)](https://packagist.org/packages/ebrahimpleite/convertkit)


Class responsible for communicating with ConvertKit

## Installation

Class ConvertKit is available via Composer:

```bash
"ebrahimpleite/convertkit": "1.0.*"
```

or run

```bash
composer require ebrahimpleite/convertkit
```

## Documentation

For details on how to use class, see the example folder with details in the component directory

```php
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
```

##### Success response

````object
object(stdClass)#4 (1){
   [
      "subscription"
   ]=> object(stdClass)#2 (8){
      [
         "id"
      ]=> int(2899486245)[
         "state"
      ]=> string(6)"active"[
         "created_at"
      ]=> string(24)"2020-12-26T02:10:41.000Z"[
         "source"
      ]=> string(43)"API::V3::SubscriptionsController (external)"[
         "referrer"
      ]"=> NULL"[
         "subscribable_id"
      ]=> int(1890238)[
         "subscribable_type"
      ]=> string(4)"form"[
         "subscriber"
      ]=> object(stdClass)#3 (1){
         [
            "id"
         ]=> int(1116010157)
      }
   }
}
````

## Contributing

Please see [CONTRIBUTING](https://github.com/ebrahimpleite/convertkit/blob/master/CONTRIBUTING.md) for details.

Thank you

## License

The MIT License (MIT). Please see [License File](https://github.com/ebrahimpleite/convertkit/blob/master/LICENSE) for more information.