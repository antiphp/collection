<?php
/**
 * class file
 */
namespace Antiphp\Collection;

class FluentCollection implements FluentCollectionInterface, \Traversable, \Countable
{
    /**
     * @var CollectionInterface
     */
    private $collection;

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool
    {
        return $this->getCollection()->accept($element);
    }

    /**
     * @param ElementInterface $element
     * @return FluentCollectionInterface
     */
    public function add(ElementInterface $element): FluentCollectionInterface
    {
        $this->getCollection()->add($element);
        return $this;
    }

    /**
     * @param iterable $collection
     * @return FluentCollectionInterface
     */
    public function addAll(iterable $collection): FluentCollectionInterface
    {
        $this->getCollection()->addAll($collection);
        return $this;
    }

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function contains(ElementInterface $element): bool
    {
        return $this->getCollection()->contains($element);
    }

    /**
     * @param iterable $collection
     * @return bool
     */
    public function containsAll(iterable $collection): bool
    {
        return $this->getCollection()->containsAll($collection);
    }

    /**
     * @param ElementInterface $element
     * @return FluentCollectionInterface
     */
    public function remove(ElementInterface $element): FluentCollectionInterface
    {
        $this->getCollection()->remove($element);
        return $this;
    }

    /**
     * @param iterable $collection
     * @return FluentCollectionInterface
     */
    public function removeAll(iterable $collection): FluentCollectionInterface
    {
        $this->getCollection()->removeAll($collection);
        return $this;
    }

    /**
     * @param iterable $collection
     * @return FluentCollectionInterface
     */
    public function retainAll(iterable $collection): FluentCollectionInterface
    {
        $this->getCollection()->retainAll($collection);
        return $this;
    }

    /**
     * @return FluentCollectionInterface
     */
    public function clear(): FluentCollectionInterface
    {
        $this->getCollection()->clear();
        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->getCollection()->isEmpty();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->getCollection()->toArray();
    }

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator
    {
        return $this->getCollection()->getIterator();
    }

    /**
     * @return int
     */
    public function count()/*: int */
    {
        return $this->getCollection()->count();
    }

    /**
     * @return CollectionInterface
     */
    private function getCollection(): CollectionInterface
    {
        // might be an overkill to call everytime instead of initalizing in constructor
        // but I want to avoid parent::__construct() calls when inheritance is used

        if ($this->collection === null) {
            $this->collection = new AcceptableCollection();
        }
        return $this->collection;
    }
}