<?php
/**
 * class file
 */
namespace Antiphp\Collection;

use Antiphp\Collection\Exception\InvalidArgumentException;

abstract class ImmutableCollection implements CollectionInterface, \Traversable, \Countable
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
     * @return ImmutableCollection
     */
    public function add(ElementInterface $element): ImmutableCollection
    {
        $clone = new static();
        $clone->elements = $this->createMutableCopy()->add($element)->toArray();
        return $clone;
    }

    /**
     * @return FluentCollection
     */
    protected function createMutableCopy(): FluentCollection
    {
        $collection = new FluentAcceptableCollection();
        $collection->addAll($this->toArray());
        $collection->setAcceptable(function(ElementInterface $element) {
            $this->checkAccept($element);
        });
        return $collection;
    }

    /**
     * @param iterable $collection
     * @return ImmutableCollection
     */
    public function addAll(iterable $collection): ImmutableCollection
    {
        $elements = $this->elements;
        foreach ($collection as $element) {
            $this->checkAccept($element);
            $elements[] = $element;
        }

        $clone = clone $this;
        $clone->elements = $elements;
        return $clone;
    }

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function contains(ElementInterface $element): bool
    {
        $this->checkAccept($element);
        return in_array($element, $this->elements, true);
    }

    /**
     * @param iterable $collection
     * @return bool
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
     * @return ImmutableCollection
     */
    public function remove(ElementInterface $element): ImmutableCollection
    {
        $this->checkAccept($element);

        $elements = $this->elements;
        $position = array_search($element, $elements, true);
        if ($position !== false) {
            unset($elements[$position]);
        }
        $clone = clone $this;
        $clone->elements = $elements;
        return $clone;
    }

    /**
     * @param iterable $collection
     * @return ImmutableCollection
     */
    public function removeAll(iterable $collection): ImmutableCollection
    {
        $collection = $this->elements;
        foreach ($collection as $element) {
            $position = array_search($element, $collection, true);
            if ($position !== false) {
                unset($collection[$position]);
            }
        }
        $clone = clone $this;
        $clone->elements = $collection;
        return $clone;
    }

    public function retainAll(Collection $collection): bool
    {
    }

    public function clear(): void
    {
        // TODO: Implement clear() method.
    }

    public function isEmpty(): bool
    {
        // TODO: Implement isEmpty() method.
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    public function getIterator(): \Iterator
    {
        // TODO: Implement getIterator() method.
    }

    public function count()/*: int */
    {
        // TODO: Implement count() method.
    }

    /**
     * @param ElementInterface $element
     */
    protected function checkAccept(ElementInterface $element): void
    {
        if (!$this->accept($element)) {
            throw InvalidArgumentException::create($element);
        }
    }
}