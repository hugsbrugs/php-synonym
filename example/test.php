<?php

require_once __DIR__ . '/vendor/autoload.php';

use Hug\Synonym\Synonym as Synonym;

$synonyms = Synonym::find('ami', 'fr');
error_log(print_r($synonyms, true));

$synonyms = Synonym::find('free', 'en');
error_log(print_r($synonyms, true));