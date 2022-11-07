<?php declare(strict_types=1);

namespace Saboohy\Conductor\Tests\Collections;

use Saboohy\Conductor\Collection;

class AdminCollection extends Collection
{
    /**
     * @var string
     */
    protected string $prefix = "admin";

    /**
     * Collects routes
     * 
     * @return void
     */
    public function collect() : void
    {
        $this->controller("ProductController")->group(function($product) {
            $product->prefix("product");
            $product->get("/", "index");
            $product->post("/", "create");
            $product->get("/{id}", "read");
            $product->put("/{id}", "update");
            $product->delete("/{id}", "delete");
        });
    }
}