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
                "/admin/product/"                   => ["ProductController", "index"],
                "/admin/product/$this->paramValue"  => ["ProductController", "read"],
            ],
            "POST" => [
                "/admin/product/"                   => ["ProductController", "create"],
            ],
            "PUT" => [
                "/admin/product/$this->paramValue"  => ["ProductController", "update"],
            ],
            "DELETE" => [
                "/admin/product/$this->paramValue"  => ["ProductController", "delete"],
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
                "/category/"                    => ["CategoryController", "index"],
                "/category/$this->paramValue"   => ["CategoryController", "read"],
            ],
            "POST" => [
                "/category/"                    => ["CategoryController", "create"],
            ],
            "PUT" => [
                "/category/$this->paramValue"   => ["CategoryController", "update"],
            ],
            "DELETE" => [
                "/category/$this->paramValue"   => ["CategoryController", "delete"],
            ]
        ];

        $this->assertSame(
            $array_must_be,
            (new SiteCollection)->collections()
        );
    }
}