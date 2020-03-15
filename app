#!/usr/bin/env php
<?php
require_once __DIR__ . './vendor/autoload.php';

use Symfony\Component\Console\Application;

$app = new Application('Calculator',0.6);

$app->add(new Console\App\Commands\AddNumbersCommand);
$app->add(new Console\App\Commands\SubtractNumbersCommand);
$app->add(new Console\App\Commands\MultiplyNumbersCommand);
$app->add(new Console\App\Commands\DivideNumbersCommand);
$app->add(new Console\App\Commands\PowNumbersCommand);
$app->add(new Console\App\Commands\HistoryListCommand);
$app->add(new Console\App\Commands\HistoryClearCommand);

$app->run();
