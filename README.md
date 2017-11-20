# BankingClient-php

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
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
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/BankingClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
date_default_timezone_set('UTC');

Banking\Client\Configuration::getDefaultConfiguration()->setHost('YOUR BASE PATH');

// Configure OAuth2 access token for authorization: Application
Banking\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');
Banking\Client\Configuration::getDefaultConfiguration()->setSecret('YOUR_SECRET');

try {
    $result = $api_instance->callList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->callList: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Author

contact@narmitech.com


