<?php

namespace Neoflow\Data\Test;

use Neoflow\Data\Data;
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @var Data
     */
    protected $data;

    protected function setUp(): void
    {
        $this->data = new Data([
            'a' => 'A',
            'b' => [
                'b-A',
            ],
            'c' => [
                'c-a' => 'C-A',
                'c-b' => [
                    'c-b-a' => 'C-B-A'
                ]
            ]
        ]);
    }

    public function testClearValues(): void
    {
        $this->data->clearValues();

        $this->assertSame([], $this->data->getValues());
    }

    public function testCount(): void
    {
        $this->assertSame(3, $this->data->countValues());
    }

    public function testDeleteValue(): void
    {
        $this->data->deleteValue('a');

        $this->assertFalse($this->data->hasValue('a'));
    }

    public function testEach(): void
    {
        $foobar = 'foobar';
        $this->data->eachValue(function ($value, string $key) use ($foobar) {
            $this->assertArrayHasKey($key, $this->data->getValues());
            $this->assertContains($value, $this->data->getValues());
            $this->assertSame('foobar', $foobar);
        });
    }

    public function testGetValue(): void
    {
        $this->assertSame('A', $this->data->getValue('a'));
        $this->assertSame('default', $this->data->getValue('z', 'default'));
    }

    public function testGetValues(): void
    {
        $this->assertIsArray($this->data->getValues());
    }

    public function testHasValue(): void
    {
        $this->assertTrue($this->data->hasValue('a'));
        $this->assertFalse($this->data->hasValue('z'));
    }

    public function testPullValue(): void
    {
        $this->assertSame('A', $this->data->pullValue('a'));
        $this->assertSame('default', $this->data->pullValue('a', 'default'));
    }

    public function testReplaceValues(): void
    {
        $this->data->replaceValues([
            'a' => 'SpecialA',
            'c' => [
                'c-c' => []
            ]
        ], false);

        $this->assertSame('SpecialA', $this->data->getValue('a'));
        $this->assertSame([
            'b-A',
        ], $this->data->getValue('b'));
        $this->assertSame([
            'c-c' => []
        ], $this->data->getValue('c'));
    }

    public function testReplaceValuesRecursively(): void
    {
        $this->data->replaceValues([
            'a' => 'SpecialA',
            'c' => [
                'c-c' => []
            ]
        ], true);

        $this->assertSame('SpecialA', $this->data->getValue('a'));
        $this->assertSame([
            'b-A',
        ], $this->data->getValue('b'));
        $this->assertSame([
            'c-a' => 'C-A',
            'c-b' => [
                'c-b-a' => 'C-B-A'
            ],
            'c-c' => []
        ], $this->data->getValue('c'));
    }

    public function testSetReferencedValues(): void
    {
        $values = [
            'a' => 'A'
        ];
        $this->data->setReferencedValues($values);
        $this->data->setValue('a', 'SpecialA');

        $this->assertSame($values, $this->data->getValues());
    }

    public function testSetValue(): void
    {
        $this->data->setValue('d', 'D');

        $this->data->setValue('e', 'E', false);
        $this->data->setValue('d', 'SpecialD', false);

        $this->assertSame('D', $this->data->getValue('d'));
        $this->assertSame('E', $this->data->getValue('e'));
    }

    public function testSetValues(): void
    {
        $values = [
            'a' => 'A'
        ];
        $this->data->setValues($values);
        $this->data->setValue('a', 'SpecialA');

        $this->assertNotSame($values, $this->data->getValues());
        $this->assertSame([
            'a' => 'SpecialA'
        ], $this->data->getValues());
    }
}
