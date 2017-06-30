<?php
/**
 * class file
 */
namespace Antiphp\Collection\Indexer;

use Antiphp\Collection\ElementInterface;

class SplObjectHashIndexer implements IndexerInterface
{
    /**
     * @param ElementInterface $element
     * @return string
     */
    public function index(ElementInterface $element): string
    {
        return spl_object_hash($element);
    }
}