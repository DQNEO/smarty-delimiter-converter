# Smarty Delimiter Converter

[![Build Status](https://travis-ci.org/DQNEO/smarty-delimiter-converter.svg?branch=master)](https://travis-ci.org/DQNEO/smarty-delimiter-converter)

convert tool to replace delimiters (e.g. from `{` `}` to `{{`  `}}`) in your smarty template files.

# DESCRIPTION

It converts the content
```
{if $config.smarty_debug}
  {debug}
{/if}
```

into this

```
{{if $config.smarty_debug}}
  {{debug}}
{{/if}}
```

You can customize delimiters as you like.

# INSTALL

```
composer require dqneo/smarty-delimiter-converter
```

# USAGE

```php
use DQNEO\SmartyDelimiterConverter\Converter;

// define delimiters
$from = ['{', '}'];
$to = ['{{', '}}'];

$converter = new Converter($from, $to);

// convert a content
$converted = $converter->convert('hello {$name}'); // => 'hello {{$name}}'

# convert a file
$converted = $converter->convert('/path/to/file.tpl'); // returns a converted content

```

you can convert all template files under a directory recursivlely

```
./bin/smarty-delimiter-converter /path/to/dir/
```

