<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use PHPUnit\Framework\TestCase;

class TraversableTest extends TestCase
{
    /**
     * @test
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(\Traversable::class, new TestCollection());
    }
}