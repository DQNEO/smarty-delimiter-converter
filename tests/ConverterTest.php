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
        $file = __DIR__ . '/before.tpl';
        $from = ['{','}'];
        $to = ['{','}'];

        $converter = new Converter($from, $to);
        $new_content = $converter->convert($file);
        $org_content = file_get_contents($file);

        $this->assertSame($org_content, $new_content);

    }

    public function test6()
    {
        $fileBefore = __DIR__ . '/before.tpl';
        $fileAfter = __DIR__ . '/after.tpl';
        $from = ['{','}'];
        $to = ['{{','}}'];

        $converter = new Converter($from, $to);
        $new_content = $converter->convert($fileBefore);
        $new_content_prepared = file_get_contents($fileAfter);

        $this->assertEquals(preg_split("/\n/",$new_content_prepared), preg_split("/\n/",$new_content));

    }

    public function testComment()
    {
        $converter = new Converter(['{', '}'],['{{', '}}']);
        $text = '{*  foobar  *}';
        $this->assertSame('{{*  foobar  *}}', $converter->convert($text));
    }

}
