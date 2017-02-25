<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */


use FastD\Utils\ArrayObject;


class ArrayObjectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ArrayObject
     */
    protected $array;

    public function setUp()
    {
        $this->array = ArrayObject::create();
    }

    public function testCreate()
    {
        $this->assertEmpty($this->array->getData());
    }

    public function testMerge ()
    {
        $this->array->merge([
            'foo' => 'bar'
        ]);

        $this->assertEquals([
            'foo' => 'bar',
        ], $this->array->getData());

        $this->array->merge([
            'foobar' => 'zyc'
        ]);

        $this->assertEquals([
            'foo' => 'bar',
            'foobar' => 'zyc'
        ], $this->array->getData());

        $this->array->merge([
            'database' => [
                'host' => '127.0.0.1',
                'options' => [
                    'foo' => 'bar'
                ]
            ]
        ]);

        $this->assertEquals([
            'foo' => 'bar',
            'foobar' => 'zyc',
            'database' => [
                'host' => '127.0.0.1',
                'options' => [
                    'foo' => 'bar'
                ]
            ]
        ], $this->array->getData());

        $this->array->merge([
            'foo' => 'foobar',
            'database' => [
                'host' => '127.0.0.1',
                'options' => [
                    'foo' => 'bar',
                    'foobar' => 'zyc'
                ]
            ]
        ]);

        $this->assertEquals([
            'foo' => 'foobar',
            'foobar' => 'zyc',
            'database' => [
                'host' => '127.0.0.1',
                'options' => [
                    'foo' => 'bar',
                    'foobar' => 'zyc'
                ]
            ]
        ], $this->array->getData());
    }

    public function testArrayKey()
    {

    }
}