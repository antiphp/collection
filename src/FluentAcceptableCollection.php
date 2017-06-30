<?php
/**
 * class file
 */
namespace Antiphp\Collection;

class FluentAcceptableCollection
    implements
        FluentAcceptableCollectionInterface,
        \Traversable,
        \Countable
{
    /**
     * @var
     */
    private $collection;

    /**
     * @var callable
     */
    private $acceptable;


    public function setAcceptable(callable $acceptable): Flu
    {
        // TODO: Implement setAcceptable() method.
    }

    public function getAcceptable(): callable
    {
        // TODO: Implement getAcceptable() method.
    }


    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool
    {

    }

    public function add(ElementInterface $element): FluentCollectionInterface
    {
        // TODO: Implement add() method.
    }

    public function addAll(iterable $collection): FluentCollectionInterface
    {
        // TODO: Implement addAll() method.
    }

    public function contains(ElementInterface $element): bool
    {
        // TODO: Implement contains() method.
    }

    public function containsAll(iterable $collection): bool
    {
        // TODO: Implement containsAll() method.
    }

    public function remove(ElementInterface $element): FluentCollectionInterface
    {
        // TODO: Implement remove() method.
    }

    public function removeAll(iterable $collection): FluentCollectionInterface
    {
        // TODO: Implement removeAll() method.
    }

    public function retainAll(iterable $collection): FluentCollectionInterface
    {
        // TODO: Implement retainAll() method.
    }

    public function clear(): FluentCollectionInterface
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


}