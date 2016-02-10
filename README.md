# Smarty Delimiter Converter

convert delimiters from `{` `}` to `{{`  `}}` in your smarty template files.

# Usage

```php
use DQNEO\SmartyDelimiterConverter\Converter;

$from = ['{','}'];
$to = ['{{','}}'];
$converter = new Converter($from, $to);
$result = $converter->convert('hello {$name}'); // => 'hello {{$name}}'
```

