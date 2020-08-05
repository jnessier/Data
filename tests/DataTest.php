<?php

namespace Neoflow\Data\Test;

use Neoflow\Data\Data;
use Neoflow\Data\Exception\InvalidDataException;
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

    public function testCount(): void
    {
        $this->assertSame(3, $this->data->count());
    }

    public function testDeleteValue(): void
    {
        $this->data->deleteValue('a');

        $this->assertFalse($this->data->hasValue('a'));
    }

    public function testEach(): void
    {
        $this->data->each(
            function ($value, $key) {
                $this->assertArrayHasKey($key, $this->data->toArray());
                $this->assertContains($value, $this->data->toArray());
            }
        );
    }

    public function testGetValue(): void
    {
        $this->assertSame('A', $this->data->getValue('a', null, true));
        $this->assertFalse($this->data->hasValue('a'));
        $this->assertSame('default', $this->data->getValue('z', 'default'));
    }

    public function testHasValue(): void
    {
        $this->assertTrue($this->data->hasValue('a'));
        $this->assertFalse($this->data->hasValue('z'));
    }

    public function testMerge(): void
    {
        $this->data->merge([
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

    public function testMergeRecursively(): void
    {
        $this->data->merge([
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

    public function testSet(): void
    {
        $this->data->set([
            'a' => 'SpecialA'
        ]);

        $this->assertSame([
            'a' => 'SpecialA'
        ], $this->data->toArray());
    }

    public function testSetReference(): void
    {
        $data = [
            'a' => 'A'
        ];

        $this->data->setReference($data);

        $this->data->setValue('a', 'SpecialA');

        $this->assertSame($data, $this->data->toArray());
    }

    public function testSetValue(): void
    {
        $this->data->setValue('d', 'D');

        $this->data->setValue('e', 'E', false);
        $this->data->setValue('d', 'SpecialD', false);

        $this->assertSame('D', $this->data->getValue('d'));
        $this->assertSame('E', $this->data->getValue('e'));
    }

    public function testToArray(): void
    {
        $this->assertIsArray($this->data->toArray());
    }
}
