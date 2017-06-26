<?php
/**
 * class file
 */

namespace Antiphp\CollectionTests;

use Antiphp\Collection\Collection;
use Antiphp\Collection\ElementInterface;

class TestCollection extends Collection
{
    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function accept(ElementInterface $element): bool
    {
        return $element instanceof TestElement;
    }
}