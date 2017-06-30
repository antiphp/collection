<?php
/**
 * class file
 */
namespace Antiphp\Collection;

class AcceptableCollection implements AcceptableCollectionInterface, \Traversable, \Countable
{
    /**
     * @var callable
     */
    private $acceptable;

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool
    {
        return ($this->getAcceptable())($element);
    }

    /**
     * @param callable $acceptance
     */
    public function setAcceptable(callable $acceptance): void
    {
        $this->acceptable = $acceptance;
    }

    /**
     * @return callable
     */
    public function getAcceptable(): callable
    {
        if ($this->acceptable === null) {
            $this->acceptable = static function() {
                return true;
            };
        }
        return $this->acceptable;
    }


}