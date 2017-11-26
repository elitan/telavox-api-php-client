# telavox-api-php-client

## Install

```
composer require elitan/telavox-api-php-client
```

## Example usage

```
<?php

require_once __DIR__ . '/vendor/autoload.php';

$api_host = 'https://api.telavox.se';
$telavox_username = '08123123123';
$telavox_password = 'secretpassword';

$telavox = new \Telavox\Telavox($api_host, $telavox_username, $telavox_password);

$calls = $telavox->calls();

var_dump($calls);

$telavox->dail('0046771567567');
```
