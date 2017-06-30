<?php
/**
 * interface file
 */
namespace Antiphp\Collection;

interface ImmutableCollectionInterface extends CollectionInterface
{
    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool;

    /**
     * @param ElementInterface $element
     * @return ImmutableCollectionInterface
     */
    public function add(ElementInterface $element): ImmutableCollectionInterface;

    /**
     * @param iterable $collection
     * @return ImmutableCollectionInterface
     */
    public function addAll(iterable $collection): ImmutableCollectionInterface;

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
     * @return ImmutableCollectionInterface
     */
    public function remove(ElementInterface $element): ImmutableCollectionInterface;

    /**
     * @param iterable $collection
     * @return ImmutableCollectionInterface
     */
    public function removeAll(iterable $collection): ImmutableCollectionInterface;

    /**
     * @param iterable $collection
     */
    public function retainAll(iterable $collection);

    /**
     * @return ImmutableCollectionInterface
     */
    public function clear(): ImmutableCollectionInterface;

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