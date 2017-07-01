<?php
/**
 * class file
 */
namespace Antiphp\Collection;

use Antiphp\Collection\Exception\InvalidArgumentException;

class ImmutableCollection implements ImmutableCollectionInterface, \Traversable, \Countable
{
    /**
     * @var CollectionInterface
     */
    private $mutableCollection;

    /**
     * ImmutableCollection constructor.
     * @param iterable $collection
     */
    public function __construct(iterable $collection = [])
    {
        $this->mutableCollection = new Collection();
        $this->mutableCollection->addAll($collection);
    }

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool
    {
        return $this->mutableCollection->accept($element);
    }

    /**
     * @param ElementInterface $element
     * @return ImmutableCollectionInterface
     */
    public function add(ElementInterface $element): ImmutableCollectionInterface
    {
        $clone = clone $this->mutableCollection;
        $clone->add($element);

        return new ImmutableCollection($clone->toArray());
    }

    /**
     * @param iterable $collection
     * @return ImmutableCollectionInterface
     */
    public function addAll(iterable $collection): ImmutableCollectionInterface
    {
        $clone = clone $this->mutableCollection;
        $clone->addAll($collection);

        return new ImmutableCollection($clone->toArray());
    }

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function contains(ElementInterface $element): bool
    {
        return $this->mutableCollection->contains($element);
    }

    /**
     * @param iterable $collection
     * @return bool
     */
    public function containsAll(iterable $collection): bool
    {
        return $this->mutableCollection->containsAll($collection);
    }

    /**
     * @param ElementInterface $element
     * @return ImmutableCollectionInterface
     */
    public function remove(ElementInterface $element): ImmutableCollectionInterface
    {
        $clone = clone $this->mutableCollection;
        $clone->remove($element);

        return new ImmutableCollection($clone->toArray());
    }

    /**
     * @param iterable $collection
     * @return ImmutableCollectionInterface
     */
    public function removeAll(iterable $collection): ImmutableCollectionInterface
    {
        $clone = clone $this->mutableCollection;
        $clone->removeAll($collection);

        return new ImmutableCollection($clone->toArray());
    }

    /**
     * @param iterable $collection
     * @return ImmutableCollectionInterface
     */
    public function retainAll(iterable $collection): ImmutableCollectionInterface
    {
        $clone = clone $this->mutableCollection;
        $clone->retainAll($collection);

        return new ImmutableCollection($clone->toArray());
    }

    /**
     * @return ImmutableCollectionInterface
     */
    public function clear(): ImmutableCollectionInterface
    {
        return new ImmutableCollection();
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->mutableCollection->isEmpty();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->mutableCollection->toArray();
    }

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator
    {
        return $this->mutableCollection->getIterator();
    }

    /**
     * @return int
     */
    public function count()/*: int */
    {
        return $this->mutableCollection->count();
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