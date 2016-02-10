# Smarty Delimiter Converter

convert tool to replace delimiters (eg. from `{` `}` to `{{`  `}}` ) in your smarty template files.

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
$result = $converter->convert('hello {$name}'); // => 'hello {{$name}}'

# convert a file
$result = $converter->convert('/path/to/file.tpl'); // returns a converted content

```

