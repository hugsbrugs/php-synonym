# php-synonym

This librairy allows one to get english and french synonyms

[![Build Status](https://travis-ci.org/hugsbrugs/php-synonym.svg?branch=master)](https://travis-ci.org/hugsbrugs/php-filesystem)

[![Coverage Status](https://coveralls.io/repos/github/hugsbrugs/php-synonym/badge.svg?branch=master)](https://coveralls.io/github/hugsbrugs/php-synonym?branch=master)

## Install

Install package with composer
```
composer require hugsbrugs/php-synonym
```

In your PHP code, load librairy
```
require_once __DIR__ . '/../vendor/autoload.php';
use Hug\Synonym\Synonym as Synonym;
```

## Usage

Find Synonym
```
Synonym::find($word, $lang = 'en');
```

## Add other laguages

To add other languages
Download your thesaurus synonym dictionnary
Use one of these scripts
[mysql2sqlite](https://github.com/dumblob/mysql2sqlite)
[grfiv](https://gist.github.com/grfiv/b79ace3656113bcfbd9b7c7da8e9ae8d)

```
./mysql2sqlite.sh thesaurus_en.sql | sqlite3 thesaurus_en.db
```

## Unit Tests

```
composer exec phpunit
```