<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Saboohy\Conductor\Tests\Collections\AdminCollection;
use Saboohy\Conductor\Tests\Collections\SiteCollection;
use Saboohy\Conductor\Utils;

final class CollectionTest extends TestCase
{
    protected function setUp() : void
    {
        $this->paramValue = sprintf("/(%s)/", Utils::RESERVED_URI_CHARS);
    }

    public function testAdminCollection() : void
    {
        $array_must_be = [
            "GET" => [
                "/api/admin/product/"                   => ["ProductController", "index"],
                "/api/admin/product/$this->paramValue"  => ["ProductController", "read"],
            ],
            "POST" => [
                "/api/admin/product/"                   => ["ProductController", "create"],
            ],
            "PUT" => [
                "/api/admin/product/$this->paramValue"  => ["ProductController", "update"],
            ],
            "DELETE" => [
                "/api/admin/product/$this->paramValue"  => ["ProductController", "delete"],
            ]
        ];

        $this->assertSame(
            $array_must_be,
            (new AdminCollection)->collections()
        );
    }

    public function testSiteCollection() : void
    {
        $array_must_be = [
            "GET" => [
                "/api/category/"                    => ["CategoryController", "index"],
                "/api/category/$this->paramValue"   => ["CategoryController", "read"],
            ],
            "POST" => [
                "/api/category/"                    => ["CategoryController", "create"],
            ],
            "PUT" => [
                "/api/category/$this->paramValue"   => ["CategoryController", "update"],
            ],
            "DELETE" => [
                "/api/category/$this->paramValue"   => ["CategoryController", "delete"],
            ]
        ];

        $this->assertSame(
            $array_must_be,
            (new SiteCollection)->collections()
        );
    }
}