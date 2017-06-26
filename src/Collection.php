<?php
/**
 * class file
 */
namespace Antiphp\Collection;

use Antiphp\Collection\Exception\InvalidArgumentException;

abstract class Collection implements \IteratorAggregate, \Countable
{
    private $elements = [];

    abstract public function accept(ElementInterface $element);

    /**
     * @param ElementInterface $element
     * @return bool added
     */
    public function add(ElementInterface $element): bool
    {
        $this->verify($element);
        $this->elements[] = $element;
        return true;
    }

    /**
     * @param Collection $collection
     * @return bool added all
     */
    public function addAll(Collection $collection): bool
    {
        foreach ($collection as $element) {
            $this->add($element);
        }
        return true;
    }

    /**
     * @param ElementInterface $element
     * @return bool contains
     */
    public function contains(ElementInterface $element): bool
    {
        $this->verify($element);
        return array_search($element, $this->elements, true) !== false;
    }

    /**
     * @param Collection $collection
     * @return bool contains all
     */
    public function containsAll(Collection $collection): bool
    {
        foreach ($collection as $element) {
            if (!$this->contains($element)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param ElementInterface $element
     * @return bool has removed
     */
    public function remove(ElementInterface $element): bool
    {
        $this->verify($element);
        $position = array_search($element, $this->elements, true);
        $removed = $position !== false;
        if ($removed) {
            unset($this->elements[$position]);
        }
        return $removed;
    }

    /**
     * @param Collection $collection
     * @return bool has changed
     */
    public function removeAll(Collection $collection): bool
    {
        $removedAny = false;
        foreach ($collection as $element) {
            $removed = $this->remove($element);
            $removedAny = $removed || $removedAny;
        }
        return $removedAny;
    }

    /**
     * @param Collection $collection
     * @return bool has changed
     */
    public function retainAll(Collection $collection): bool
    {
        $removedAny = false;
        foreach ($this as $element) {
            if (!$collection->contains($element)) {
                $removed = $this->remove($element);
                $removedAny = $removed || $removedAny;
            }
        }
        return $removedAny;
    }

    /**
     * @return void
     */
    public function clear(): void
    {
        $this->elements = [];
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->elements;
    }

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->elements);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->elements);
    }

    /**
     * @throws \InvalidArgumentException
     * @param ElementInterface $element
     */
    protected function verify(ElementInterface $element): void
    {
        if (!$this->accept($element)) {
            throw InvalidArgumentException::create($element);
        }
    }
}