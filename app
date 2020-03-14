#!/usr/bin/env php
<?php
require_once __DIR__ . './vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\App\Commands\SubtractNumbersCommand;
use Console\App\Commands\AddNumbersCommand;

$app = new Application('calculator',0.1);

$app->run();
