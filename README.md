# BankingClient-php

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to <code>composer.json</code>:

    {
      "repositories": [
        {
          "type": "git",
          "url": "https://github.com/narmitech/banking-client-php.git"
        }
      ],
      "require": {
        "narmitech/banking-client-php": "*@dev"
      }
    }

Then run <code>composer install</code>.


### Manual Installation

Download the files and include `autoload.php`:

```php
require_once('/path/to/BankingClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
date_default_timezone_set('UTC');

Banking\Client\Configuration::getDefaultConfiguration()->setHost('{{default_base_url}}');

Banking\Client\Configuration::getDefaultConfiguration()->setAccessToken('{{default_api_key}}');
Banking\Client\Configuration::getDefaultConfiguration()->setSecret('{{default_api_secret}}');

$api_instance = new Banking\Client\Api\TransactionApi(new \Http\Adapter\Guzzle6\Client());


try {
  $result = $api_instance->callList();
  print_r($result);
} catch (Exception $e) {
  echo 'Exception when calling TransactionApi->callList: ', $e->getMessage(), PHP_EOL;
}
?>

```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Author

contact@narmitech.com


