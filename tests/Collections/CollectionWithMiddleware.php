<?php declare(strict_types=1);

namespace Saboohy\Conductor\Tests\Collections;

use Saboohy\Conductor\Collection;
use Saboohy\Conductor\Contracts\CollectionContract;

class CollectionWithMiddleware extends Collection implements CollectionContract
{
    /**
     * @var string
     */
    protected string $prefix = "";

    /**
     * @var string
     */
    protected string $middleware = "Auth";

    /**
     * Collects routes
     * 
     * @return void
     */
    public function collect() : void
    {
        $this->controller("WorkController", ["MW1", "MW2"])->group(function($work) {
            $work->prefix("/work");
            $work->get("/", "index");
            $work->post("/", "create", ["MW3"]);
        });
    }
}