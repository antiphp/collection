<?php
/**
 * interface file
 */
namespace Antiphp\Collection\Indexer;

use Antiphp\Collection\ElementInterface;

interface IndexerInterface
{
    /**
     * @param ElementInterface $element
     * @return string|int
     */
    public function index(ElementInterface $element);
}