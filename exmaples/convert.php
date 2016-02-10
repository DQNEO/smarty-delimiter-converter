#!/usr/bin/env php
<?php
require_once  __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ . '/src/Converter.php';
use DQNEO\SmartyDelimiterConverter\Converter;
/*
$smarty = new Smarty();
$smarty->compile_dir = '.';
$rendered = $smarty->fetch($file, null, null, false);
echo $rendered;
*/

$file = __DIR__ . '/sample.tpl';
$converter = new Converter();

echo $converter->convert($file);
//echo $converter->convert($file);

//$ret = $converter->convert(file_get_contents($file));
//echo $ret;




