# Smarty Delimiter Converter

convert delimiters from `{` `}` to `{{`  `}}` in your smarty template files.

# Usage

```php
$converter = new Converter();
$converter->convert('hello {$name}'); // => 'hello {{$name}}'
```

Or you can also convert all template files under a directory.
```
convert tpl_files/
```

