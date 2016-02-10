# Smarty Delimiter Converter

convert delimiters from `{` `}` to `{{`  `}}` in your smarty template files.

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

