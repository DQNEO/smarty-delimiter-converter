# smarty-delimiter-converter

a tool to convert `{` `}` to `{{` and `}}`

# Usage

```
$converter = new Converter();
echo $converter->convert('hello {$name}'); // => 'hello {{$name}}'
```

```
 convert tpl_files/
```

