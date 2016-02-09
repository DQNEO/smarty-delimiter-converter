#!/usr/bin/env php
<?php
require_once  __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty();
$smarty->compile_dir = '.';
$file = __DIR__ . '/sample.tpl';
$rendered = $smarty->fetch($file, null, null, false);


echo $rendered;


