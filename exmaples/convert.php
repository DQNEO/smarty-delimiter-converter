#!/usr/bin/env php
<?php
require_once  __DIR__ . '/../vendor/autoload.php';
use DQNEO\SmartyDelimiterConverter\Converter;

$file = __DIR__ . '/sample.tpl';
$from = ['{','}'];
$to = ['{','}'];
$converter = new Converter($from, $to);

echo $converter->convert($file);

//echo $converter->convert($file);

//$ret = $converter->convert(file_get_contents($file));
//echo $ret;


/*
$smarty = new Smarty();
$smarty->compile_dir = '.';
$rendered = $smarty->fetch($file, null, null, false);
echo $rendered;
*/


