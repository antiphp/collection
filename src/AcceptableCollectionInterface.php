<?php
/**
 * interface file
 */
namespace Antiphp\Collection;

interface AcceptableCollectionInterface extends CollectionInterface
{
    /**
     * @param callable $acceptable
     * @return mixed
     */
    public function setAcceptable(callable $acceptable);

    /**
     * @return callable
     */
    public function getAcceptable(): callable;
}