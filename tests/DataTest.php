<?php

namespace DataHandler\Test;

use DataHandler\Data;
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

    public function testClear(): void
    {
        $this->data->clear();

        $this->assertSame([], $this->data->getAll());
    }

    public function testCount(): void
    {
        $this->assertSame(3, $this->data->count());
    }

    public function testDelete(): void
    {
        $this->data->delete('a');

        $this->assertFalse($this->data->has('a'));
    }

    public function testEach(): void
    {
        $foobar = 'foobar';
        $this->data->each(function ($value, string $key) use ($foobar) {
            $this->assertArrayHasKey($key, $this->data->getAll());
            $this->assertContains($value, $this->data->getAll());
            $this->assertSame('foobar', $foobar);
        });
    }

    public function testGet(): void
    {
        $this->assertSame('A', $this->data->get('a'));
        $this->assertSame('default', $this->data->get('z', 'default'));
    }

    public function testGetAll(): void
    {
        $this->assertIsArray($this->data->getAll());
    }

    public function testHas(): void
    {
        $this->assertTrue($this->data->has('a'));
        $this->assertFalse($this->data->has('z'));
    }

    public function testPull(): void
    {
        $this->assertSame('A', $this->data->pull('a'));
        $this->assertSame('default', $this->data->pull('a', 'default'));
    }

    public function testReplace(): void
    {
        $this->data->replace([
            'a' => 'SpecialA',
            'c' => [
                'c-c' => []
            ]
        ], false);

        $this->assertSame('SpecialA', $this->data->get('a'));
        $this->assertSame([
            'b-A',
        ], $this->data->get('b'));
        $this->assertSame([
            'c-c' => []
        ], $this->data->get('c'));
    }

    public function testReplaceRecursively(): void
    {
        $this->data->replace([
            'a' => 'SpecialA',
            'c' => [
                'c-c' => []
            ]
        ], true);

        $this->assertSame('SpecialA', $this->data->get('a'));
        $this->assertSame([
            'b-A',
        ], $this->data->get('b'));
        $this->assertSame([
            'c-a' => 'C-A',
            'c-b' => [
                'c-b-a' => 'C-B-A'
            ],
            'c-c' => []
        ], $this->data->get('c'));
    }

    public function testSetReferencedValues(): void
    {
        $values = [
            'a' => 'A'
        ];
        $this->data->setAllReferenced($values);
        $this->data->set('a', 'SpecialA');

        $this->assertSame($values, $this->data->getAll());
    }

    public function testSetValue(): void
    {
        $this->data->set('d', 'D');

        $this->data->set('e', 'E', false);
        $this->data->set('d', 'SpecialD', false);

        $this->assertSame('D', $this->data->get('d'));
        $this->assertSame('E', $this->data->get('e'));
    }

    public function testSetValues(): void
    {
        $values = [
            'a' => 'A'
        ];
        $this->data->setAll($values);
        $this->data->set('a', 'SpecialA');

        $this->assertNotSame($values, $this->data->getAll());
        $this->assertSame([
            'a' => 'SpecialA'
        ], $this->data->getAll());
    }
}
