<?php
/**
 * interface file
 */
namespace Antiphp\Collection;

interface CollectionInterface
{
    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool;

    /**
     * @param ElementInterface $element
     */
    public function add(ElementInterface $element);

    /**
     * @param iterable $collection
     * @return bool added all
     */
    public function addAll(iterable $collection);

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
     */
    public function remove(ElementInterface $element);

    /**
     * @param iterable $collection
     */
    public function removeAll(iterable $collection);

    /**
     * @param iterable $collection
     */
    public function retainAll(iterable $collection);

    /**
     * @return void
     */
    public function clear();

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