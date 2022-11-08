<?php declare(strict_types=1);

namespace Saboohy\Conductor\Contracts;

interface CollectionContract
{
    /**
     * Collects routes
     * 
     * @return void
     */
    public function collect() : void;
}