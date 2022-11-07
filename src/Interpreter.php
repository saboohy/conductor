<?php declare(strict_types=1);

namespace Saboohy\Conductor;

use function preg_match;
use function preg_replace;

abstract class Interpreter
{
    /**
     * URI initializer
     * 
     * @param string $uri
     * 
     * @return string
     */
    protected function initUri(string $uri = "") : string
    {
        static $param = "/{[a-zA-Z]+}/";

        return (
            preg_match($param, $uri)
            ? preg_replace($param, "/([a-zA-Z0-9-\._~!$&'\(\)\*\+,;=:@]+)/", $uri)
            : $uri
        );
    }

    /**
     * Prefix initializer
     * 
     * @param string $uri
     * 
     * @return string
     */
    protected function initPrefix(string $prefix = "") : string
    {
        return (
            $prefix[0] !== "/" 
            ? "/" . $prefix 
            : $prefix
        );
    }
}