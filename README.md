# smarty-delimiter-converter

convert delimiters from `{` `}` to `{{`  `}}` in your smarty template files.

# Usage

```php
$converter = new Converter();
$converter->convert('hello {$name}'); // => 'hello {{$name}}'
```

```
 convert tpl_files/
```

