<?php declare(strict_types=1);

namespace Saboohy\Conductor;

use function is_array;
use function is_bool;
use function is_callable;
use function is_countable;
use function is_float;
use function is_int;
use function is_long;
use function is_iterable;
use function is_numeric;
use function is_object;
use function is_real;
use function is_resource;
use function is_scalar;
use function is_string;
use function in_array;

final class Utils
{
    /**
     * Checks multiple type
     * 
     * @param mixed $data
     * @param array $is
     * 
     * @return bool
     */
    public static function dataIs(mixed $data = null, array $is = []) : bool
    {
        if ( is_null($data) )   { return false; }
        if ( empty($is) )       { return false; }

        static $type_list = [
            "array",
            "bool",
            "callable",
            "countable",
            "float",
            "int",
            "long",
            "null",
            "integer",
            "iterable",
            "numeric",
            "object",
            "resource",
            "scalar",
            "string"
        ];

        $results = [];
        
        foreach ( $is as $type ) {
            if ( in_array($type, $type_list) ) {
                $functions[] = call_user_func("is_$type", $data) ? true : false;
            }
        }

        return !in_array(false, $results);
    }
}