zf2-poeditor-php-client
=======================

[![Latest Stable Version](https://poser.pugx.org/maikay/zf2-poeditor-php-client/v/stable.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
[![Total Downloads](https://poser.pugx.org/maikay/zf2-poeditor-php-client/downloads.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
[![Latest Unstable Version](https://poser.pugx.org/maikay/zf2-poeditor-php-client/v/unstable.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
[![License](https://poser.pugx.org/maikay/zf2-poeditor-php-client/license.svg)](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/MaiKaY/zf2-poeditor-php-client/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

## Installation

The recommended way to install [`maikay/zf2-poeditor-php-client`](https://packagist.org/packages/maikay/zf2-poeditor-php-client)
is through [composer](http://getcomposer.org/) by adding dependency to your `composer.json`:

```json
{
    "require": {
        "maikay/zf2-poeditor-php-client": "0.2.*"
    }
}
```

## Requirements

- POEditor Account with API Access ([POEditor - pricing](https://poeditor.com/pricing/))

## Configuration

1. add `PhpClientPoeditor` to your Application Modules
2. copy [php-client-poeditor.global.php.dist](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/config/php-client-poeditor.global.php.dist) to your config autoloader folder and remove **.dist** in filename
3. update your **api_token** and **project_id** in the [configuration](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/config/php-client-poeditor.global.php.dist) (you can find this informations [here](https://poeditor.com/account/api))

## Usage

To run the configured strategies 
```sh
cd path/to/my/zf2-project
```

```sh
php public/index.php php-client-poeditor build
```

**php-client-poeditor build** is configured [here](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/config/module.config.php)

## Strategies

### Existing Strategies

ServiceManagerKey                                                  | Description
---------------------------------------------------- | ------------------------------------------
*[PhpClientPoeditor\Strategy\OneToOneStrategy](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/src/PhpClientPoeditor/Strategy/OneToOneStrategy.php)*      | saved the obtained content 1:1 [POEditor - SupportedFormats](https://poeditor.com/help/#SupportedFormats)
*[PhpClientPoeditor\Strategy\PhpArrayStrategy](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/src/PhpClientPoeditor/Strategy/PhpArrayStrategy.php)*      | saved the obtained content to use [Zend/I18n/Translator/Loader/PhpArray.php](https://github.com/zendframework/zf2/blob/master/library/Zend/I18n/Translator/Loader/PhpArray.php)
*[PhpClientPoeditor\Strategy\JsonKeyValueStrategy](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/src/PhpClientPoeditor/Strategy/JsonKeyValueStrategy.php)*      | saved the obtained content like `PhpArrayStrategy` - just in json format

### Write your own Strategy

To get your your own Strategy, just create a Strategy by implementing
[`PhpClientPoeditor\Strategy\StrategyInterface`](https://github.com/MaiKaY/zf2-poeditor-php-client/blob/master/src/PhpClientPoeditor/Strategy/StrategyInterface.php).
