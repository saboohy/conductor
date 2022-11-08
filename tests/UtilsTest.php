<?php declare(strict_types=1);

namespace Saboohy\Conductor\Tests;

use PHPUnit\Framework\TestCase;
use Saboohy\Conductor\Utils;
use Saboohy\Conductor\Tests\Collections\AdminCollection;

final class UtilsTest extends TestCase
{
    public function testDataIs() : void
    {
        # Assert is callable and not null
        $this->assertTrue(
            Utils::dataIs([new AdminCollection, "collect"], ["object", "callable"])
        );

        # Assert is object and not null
        $this->assertTrue(
            Utils::dataIs(new \stdClass, ["object"])
        );

        # Assert is string, scalar and not null
        $this->assertTrue(
            Utils::dataIs("conductor", ["string", "scalar"])
        );

        # Assert is integer, numericm long and not null
        $this->assertTrue(
            Utils::dataIs(13, ["int", "integer", "numeric", "long"])
        );

        # Assert is array, iterable, countable and not null
        $this->assertTrue(
            Utils::dataIs(["a", "b", "c"], ["array", "iterable", "countable"])
        );

        # Assert is float, doublem numeric and not null
        $this->assertTrue(
            Utils::dataIs(13.13, ["float", "double", "numeric"])
        );

        # Assert is resource and not null
        $this->assertTrue(
            Utils::dataIs(fopen(basepath("composer.json"), "r"), ["resource"])
        );

        # Assert is bool and not null
        $this->assertTrue(
            Utils::dataIs(true, ["bool"])
        );
    }
}