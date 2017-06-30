<?php
/**
 * class file
 */
namespace Antiphp\Collection;

use Antiphp\Collection\Indexer\IndexerInterface;
use Antiphp\Collection\Indexer\SplObjectHashIndexer;

abstract class Set implements SetInterface, \IteratorAggregate, \Countable
{
    private $collection;

    /**
     * @var IndexerInterface
     */
    private $indexer;

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function add(ElementInterface $element): bool
    {
        $this->checkAccept($element);
        if ($this->contains($element)) {
            return false;
        }
        $this->collection[$this->index($element)] = $element;
        return true;
    }

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function contains(ElementInterface $element): bool
    {
        $this->checkAccept($element);
        return array_key_exists($this->index($element), $this->collection);
    }

    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function remove(ElementInterface $element): bool
    {
        $this->checkAccept($element);
        $key = $this->index($element);
        if (!array_key_exists($key, $this->collection)) {
            return false;
        }
        unset($this->collection[$key]);
        return true;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->collection;
    }

    /**
     * @param ElementInterface $element
     * @return mixed
     */
    protected function index(ElementInterface $element)/*: mixed */
    {
        return $this->getIndexer()->index($element);
    }

    /**
     * @return IndexerInterface
     */
    protected function getIndexer(): IndexerInterface
    {
        if ($this->indexer === null) {
            $this->indexer = $this->getDefaultIndexer();
        }
        return $this->indexer;
    }

    /**
     * @return IndexerInterface
     */
    protected function getDefaultIndexer(): IndexerInterface
    {
        return new SplObjectHashIndexer();
    }
}