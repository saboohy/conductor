<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Saboohy\Conductor\Tests\Collections\AdminCollection;
use Saboohy\Conductor\Tests\Collections\SiteCollection;
use Saboohy\Conductor\Utils;

final class CollectionTest extends TestCase
{
    protected function setUp() : void
    {
        $this->paramValue = sprintf("(%s)", Utils::RESERVED_URI_CHARS);
    }

    public function testAdminCollection() : void
    {
        $array_must_be = [
            "GET" => [
                "/admin/product/" => [
                    "action"        => ["ProductController", "index"],
                    "middleware"    => []
                ],
                "/admin/product/$this->paramValue" => [
                    "action"        => ["ProductController", "read"],
                    "middleware"    => []
                ],
                "/admin/user/" => [
                    "action"        => ["UserController", "index"],
                    "middleware"    => []
                ],
                "/admin/user/$this->paramValue" => [
                    "action"        => ["UserController", "read"],
                    "middleware"    => []
                ],
            ],
            "POST" => [
                "/admin/product/" => [
                    "action"        => ["ProductController", "create"],
                    "middleware"    => []
                ],
                "/admin/user/" => [
                    "action"        => ["UserController", "create"],
                    "middleware"    => []
                ],
            ],
            "PUT" => [
                "/admin/product/$this->paramValue" => [
                    "action"        => ["ProductController", "update"],
                    "middleware"    => []
                ],
                "/admin/user/$this->paramValue" => [
                    "action"        => ["UserController", "update"],
                    "middleware"    => []
                ],
            ],
            "DELETE" => [
                "/admin/product/$this->paramValue" => [
                    "action"        => ["ProductController", "delete"],
                    "middleware"    => []
                ],
                "/admin/user/$this->paramValue" => [
                    "action"        => ["UserController", "delete"],
                    "middleware"    => []
                ],
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
                "/category/" => [
                    "action"        => ["CategoryController", "index"],
                    "middleware"    => []
                ],
                "/category/$this->paramValue" => [
                    "action"        => ["CategoryController", "read"],
                    "middleware"    => []
                ],
            ],
            "POST" => [
                "/category/" => [
                    "action"        => ["CategoryController", "create"],
                    "middleware"    => []
                ],
            ],
            "PUT" => [
                "/category/$this->paramValue" => [
                    "action"        => ["CategoryController", "update"],
                    "middleware"   => []
                ],
            ],
            "DELETE" => [
                "/category/$this->paramValue" => [
                    "action"        => ["CategoryController", "delete"],
                    "middleware"    => []
                ],
            ]
        ];

        $this->assertSame(
            $array_must_be,
            (new SiteCollection)->collections()
        );
    }
}