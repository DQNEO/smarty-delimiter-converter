<?php
/**
 * Exampe of a Unit Test
 */
namespace DQNEO\SmartyDelimiterConverter;

/**
 */
class ConverterTest extends \PHPUnit_Framework_TestCase
{
    public function testInstantiate()
    {
        $converter = new Converter(['{', '}'],['{', '}']);
        $this->assertTrue($converter instanceof Converter);
    }

    public function test1()
    {
        $converter = new Converter(['{', '}'],['{', '}']);
        $text = 'hello {$name}';
        $this->assertSame($text, $converter->convert($text));
        //$text = 'hello {$name}' . "\nworld";
        //$this->assertSame($text, $converter->convert($text));
    }

    public function test2()
    {
        $converter = new Converter(['{', '}'],['{{', '}}']);
        $text = 'hello {$name}';
        $this->assertSame('hello {{$name}}', $converter->convert($text));
    }

    public function test3()
    {
        $converter = new Converter(['{', '}'],['<%', '%>']);
        $text = 'hello { $name }';
        $this->assertSame('hello <% $name %>', $converter->convert($text));
    }

    public function test4()
    {
        $converter = new Converter(['{', '}'],['{{', '}}']);
        $text = 'hello { $name } ';
        $this->assertSame('hello {{ $name }} ', $converter->convert($text));
    }

    public function test5()
    {
        $file = __DIR__ . '/../examples/sample.tpl';
        $from = ['{','}'];
        $to = ['{','}'];

        $converter = new Converter($from, $to);
        $new_content = $converter->convert($file);
        $org_content = file_get_contents($file);

        $this->assertSame($org_content, $new_content);

    }
}
