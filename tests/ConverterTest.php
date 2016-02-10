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

}
