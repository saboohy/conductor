<?php declare(strict_types=1);

namespace Saboohy\Conductor\Tests\Collections;

use Saboohy\Conductor\Collection;
use Saboohy\Conductor\Contracts\CollectionContract;

class SiteCollection extends Collection implements CollectionContract
{
    /**
     * @var string
     */
    protected string $prefix = "";

    /**
     * Collects routes
     * 
     * @return void
     */
    public function collect() : void
    {
        $this->controller("CategoryController")->group(function($category) {
            $category->prefix("/category");
            $category->get("/", "index");
            $category->post("/", "create");
            $category->get("/{id}", "read");
            $category->put("/{id}", "update");
            $category->delete("/{id}", "delete");
        });
    }
}