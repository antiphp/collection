<?php
/**
 * class file
 */

namespace Antiphp\CollectionTests\Antiphp\CollectionTests\Unit\Exception;

use Antiphp\Collection\Exception\InvalidArgumentException;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class InvalidArgumentExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testElementSetAndGet()
    {
        $element = new TestElement();
        $exception = new InvalidArgumentException('foobar');

        $exception->setElement($element);
        $this->assertEquals($element, $exception->getElement());
    }

    /**
     * @test
     */
    public function testExceptionMessageContainsClassName()
    {
        $element = new TestElement();
        $exception = InvalidArgumentException::create($element);

        $this->assertContains(get_class($element), $exception->getMessage());
    }

    /**
     * @test
     */
    public function testExceptionCodePassed()
    {
        $exception = InvalidArgumentException::create(new TestElement(), 123);

        $this->assertEquals(123, $exception->getCode());
    }

    /**
     * @test
     */
    public function testExceptionElementSet()
    {
        $element = new TestElement();
        $exception = InvalidArgumentException::create($element);

        $this->assertEquals($element, $exception->getElement());
    }
}