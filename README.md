zf2-poeditor-php-client
=======================

[![Latest Stable Version](https://poser.pugx.org/maikay/zf2-poeditor-php-client/v/stable.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
[![Total Downloads](https://poser.pugx.org/maikay/zf2-poeditor-php-client/downloads.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
[![Latest Unstable Version](https://poser.pugx.org/maikay/zf2-poeditor-php-client/v/unstable.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
[![License](https://poser.pugx.org/maikay/zf2-poeditor-php-client/license.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)

API Client for https://poeditor.com

## Installation

The recommended way to install [`maikay/zf2-poeditor-php-client`](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
is through [composer](http://getcomposer.org/) by adding dependency to your `composer.json`:

```json
{
    "require-dev": {
        "maikay/zf2-poeditor-php-client": "dev-master"
    }
}
```

## Features

tbd

## Configuration

tbd

## Strategies

### Existing Strategies

FQN                                                  | Description
---------------------------------------------------- | ------------------------------------------
*PhpClientPoeditor\Strategy\OneToOneStrategy*      | tbd
*PhpClientPoeditor\Strategy\PhpArrayStrategy*      | tbd

### Write your own Strategy

To get your your own Strategy, just create a new Strategy by extending
[`PhpClientPoeditor\Strategy\AbstractStrategy`](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/src/PhpClientPoeditor/Strategy/AbstractStrategy.php).

Beside this you can make your visitor configurable by implementing
[`PhpClientPoeditor\Strategy\StrategyInterface`](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/src/PhpClientPoeditor/Strategy/StrategyInterface.php)