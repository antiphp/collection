<?php
/**
 * class file
 */
namespace Antiphp\Collection;

use Antiphp\Collection\Exception\InvalidArgumentException;

abstract class Collection implements CollectionInterface, \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    private $elements = [];

    /**
     * @param ElementInterface $element
     * @return bool
     */
    abstract public function accept(ElementInterface $element): bool;

    /**
     * @param ElementInterface $element
     * @return bool added
     */
    public function add(ElementInterface $element): bool
    {
        $this->checkAccept($element);
        $this->elements[] = $element;
        return true;
    }

    /**
     * @param iterable $collection
     * @return bool added all
     */
    public function addAll(iterable $collection): bool
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
        $this->checkAccept($element);
        return in_array($element, $this->elements, true);
    }

    /**
     * @param iterable $collection
     * @return bool contains all
     */
    public function containsAll(iterable $collection): bool
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
        $this->checkAccept($element);
        $position = array_search($element, $this->elements, true);
        $removed = $position !== false;
        if ($removed) {
            unset($this->elements[$position]);
        }
        return $removed;
    }

    /**
     * @param iterable $collection
     * @return bool has changed
     */
    public function removeAll(iterable $collection): bool
    {
        if ($collection instanceof \Traversable) {
            $collection = iterator_to_array($collection);
        }
        /** @var array $collection */
        $elements = array_diff($this->elements, $collection);
        $removedAny = $elements !== $this->elements;
        $this->elements = $elements;
        /*
        $removedAny = false;
        foreach ($collection as $element) {
            $removed = $this->remove($element);
            $removedAny = $removed || $removedAny;
        }
        */
        return $removedAny;
    }

    /**
     * @param iterable $collection
     * @return bool has changed
     */
    public function retainAll(iterable $collection): bool
    {
        if ($collection instanceof \Traversable) {
            $collection = iterator_to_array($collection);
        }
        $elements = array_intersect($this->elements, $collection);
        $removedAny = $elements !== $this->elements;
        $this->elements = $elements;
        /*
        $removedAny = false;
        foreach ($this as $element) {
            if (!$collection->contains($element)) {
                $removed = $this->remove($element);
                $removedAny = $removed || $removedAny;
            }
        }
        */
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
        return array_values($this->elements);
    }

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator
    {
        // prefer toArray() over $this->elements to make inheritance easier
        return new \ArrayIterator($this->toArray());
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
    protected function checkAccept(ElementInterface $element): void
    {
        if (!$this->accept($element)) {
            throw InvalidArgumentException::create($element);
        }
    }
}