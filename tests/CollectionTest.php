<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Saboohy\Conductor\Tests\Collections\AdminCollection;
use Saboohy\Conductor\Tests\Collections\SiteCollection;

final class CollectionTest extends TestCase
{
    public function testAdminCollection()
    {
        static $param_value = "/([a-zA-Z0-9-\._~!$&'\(\)\*\+,;=:@]+)/";

        $array_must_be = [
            "GET" => [
                "/api/admin/product/"                   => ["ProductController", "index"],
                "/api/admin/product/$param_value"       => ["ProductController", "read"],
            ],
            "POST" => [
                "/api/admin/product/"                   => ["ProductController", "create"],
            ],
            "PUT" => [
                "/api/admin/product/$param_value"       => ["ProductController", "update"],
            ],
            "DELETE" => [
                "/api/admin/product/$param_value"       => ["ProductController", "delete"],
            ]
        ];

        $this->assertSame(
            $array_must_be,
            (new AdminCollection)->collections()
        );
    }

    public function testSiteCollection()
    {
        static $param_value = "/([a-zA-Z0-9-\._~!$&'\(\)\*\+,;=:@]+)/";

        $array_must_be = [
            "GET" => [
                "/api/category/"                    => ["CategoryController", "index"],
                "/api/category/$param_value"        => ["CategoryController", "read"],
            ],
            "POST" => [
                "/api/category/"                    => ["CategoryController", "create"],
            ],
            "PUT" => [
                "/api/category/$param_value"        => ["CategoryController", "update"],
            ],
            "DELETE" => [
                "/api/category/$param_value"        => ["CategoryController", "delete"],
            ]
        ];

        $this->assertSame(
            $array_must_be,
            (new SiteCollection)->collections()
        );
    }
}