# Smarty Delimiter Converter

convert delimiters from `{` `}` to `{{`  `}}` in your smarty template files.

# Usage

```php
$from = ['{','}'];
$to = ['{{','}}'];
$converter = new Converter($from, $to);
$result = $converter->convert('hello {$name}'); // => 'hello {{$name}}'
```

