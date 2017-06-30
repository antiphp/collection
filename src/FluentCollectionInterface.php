<?php
/**
 * interface file
 */
namespace Antiphp\Collection;

interface FluentCollectionInterface extends CollectionInterface
{
    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool;

    /**
     * @param ElementInterface $element
     * @return FluentCollectionInterface
     */
    public function add(ElementInterface $element): FluentCollectionInterface;

    /**
     * @param iterable $collection
     * @return FluentCollectionInterface
     */
    public function addAll(iterable $collection): FluentCollectionInterface;

    /**
     * @param ElementInterface $element
     * @return bool contains
     */
    public function contains(ElementInterface $element): bool;

    /**
     * @param iterable $collection
     * @return bool contains all
     */
    public function containsAll(iterable $collection): bool;

    /**
     * @param ElementInterface $element
     * @return FluentCollectionInterface
     */
    public function remove(ElementInterface $element): FluentCollectionInterface;

    /**
     * @param iterable $collection
     * @return FluentCollectionInterface
     */
    public function removeAll(iterable $collection): FluentCollectionInterface;

    /**
     * @param iterable $collection
     * @return FluentCollectionInterface
     */
    public function retainAll(iterable $collection): FluentCollectionInterface;

    /**
     * @return FluentCollectionInterface
     */
    public function clear(): FluentCollectionInterface;

    /**
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator;

    /**
     * @return int
     */
    public function count()/*: int */;
}