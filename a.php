#!/usr/bin/env php
<?php

$ldq = '\{';
$rdq = '\}';

$source_content = file_get_contents('template/ja_JP/_header.tpl');

$search = "~{$ldq}\*(.*?)\*{$rdq}|{$ldq}\s*literal\s*{$rdq}(.*?){$ldq}\s*/literal\s*{$rdq}|{$ldq}\s*php\s*{$rdq}(.*?){$ldq}\s*/php\s*{$rdq}~s";


/*
//var_dump($source_content);exit;
preg_match_all($search, $source_content, $match,  PREG_SET_ORDER);

var_dump($match);
*/
/* Gather all template tags. */
preg_match_all("~{$ldq}\s*(.*?)\s*{$rdq}~s", $source_content, $_match);
var_dump($_match);
$template_tags = $_match[1];
/* Split content by template tags to obtain non-template content. */
/*
$text_blocks = preg_split("~{$ldq}.*?{$rdq}~s", $source_content);
var_dump($text_blocks);
*/

