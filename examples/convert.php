#!/usr/bin/env php
<?php
require_once  __DIR__ . '/../vendor/autoload.php';
use DQNEO\SmartyDelimiterConverter\Converter;

$file = __DIR__ . '/before.tpl';
$from = ['{','}'];
$to = ['{','}'];
$converter = new Converter($from, $to);

echo $converter->convert($file);
