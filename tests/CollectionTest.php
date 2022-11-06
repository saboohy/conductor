<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Saboohy\Conductor\Tests\Collections\{
    AdminCollection
};

final class CollectionTest extends TestCase
{
    public function testAdminCollection()
    {
        $array_must_be = [
            "GET" => [
                "/api/admin/product/"                  => ["AdminCollection", "index"],
                "/api/admin/product/([a-zA-Z0-9]+)"    => ["AdminCollection", "read"],
            ],
            "POST" => [
                "/api/admin/product/"                  => ["AdminCollection", "create"],
            ],
            "PUT" => [
                "/api/admin/product/([a-zA-Z0-9]+)"    => ["AdminCollection", "update"],
            ],
            "DELETE" => [
                "/api/admin/product/([a-zA-Z0-9]+)"    => ["AdminCollection", "delete"],
            ]
        ];

        $this->assertSame(
            $array_must_be,
            (new AdminCollection)->collections()
        );
    }
}