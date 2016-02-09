# smarty-delimiter-converter

convert delemiters from `{` `}` to `{{`  `}}` in smarty template files.

# Usage

```
$converter = new Converter();
echo $converter->convert('hello {$name}'); // => 'hello {{$name}}'
```

```
 convert tpl_files/
```

