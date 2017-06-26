<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class ClearTest extends TestCase
{
    /**
     * @test
     */
    public function testClear()
    {
        $collection = new TestCollection();
        $collection->add(new TestElement());

        $collection->clear();
        $this->assertCount(0, $collection);
    }

    /**
     * @test
     */
    public function testClearEmpty()
    {
        $collection = new TestCollection();

        $collection->clear();
        $this->assertCount(0, $collection);
    }
}