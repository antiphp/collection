<?php
/**
 * class file
 */
namespace Antiphp\Collection\Exception;

use Antiphp\Collection\ElementInterface;

class InvalidArgumentException extends \InvalidArgumentException
{
    /**
     * @param ElementInterface $element
     * @param int $code
     * @return static
     */
    public static function create(ElementInterface $element, $code = 0)
    {
        $class = get_class($element);
        $exception = new static("Element [$class] has not been accepted", $code);
        $exception->setElement($element);
        return $exception;
    }

    /**
     * @var ElementInterface
     */
    private $element;

    /**
     * @param ElementInterface $element
     */
    public function setElement(ElementInterface $element): void
    {
        $this->element = $element;
    }

    /**
     * @return ElementInterface
     */
    public function getElement(): ElementInterface
    {
        return $this->element;
    }
}