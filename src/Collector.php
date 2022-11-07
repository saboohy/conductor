<?php declare(strict_types=1);

namespace Saboohy\Conductor;

use Saboohy\Conductor\Interpreter;

abstract class Collector extends Interpreter
{
    /**
     * Default prefix
     * 
     * @var string
     */
    private string $prefix = "/api";

    /**
     * Controller
     * 
     * @var string
     */
    private string $controller = "";

    /**
     * Collections
     * 
     * @var array
     */
    private array $routes = [];

    /**
     * Sets prefix
     * 
     * @param string $prefix
     * 
     * @return void
     */
    protected function setPrefix() : void
    {

    }

    /**
     * Sets controller
     * 
     * @param string $controller
     * 
     * @return void
     */
    protected function setController(string $controller = "") : void
    {
        $this->controller = $controller;
    }

    /**
     * Routing registerer
     * 
     * @param string $method
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    protected function registerRouter(string $method = "GET", string $uri = "", string $action = "") : void
    {

    }

    /**
     * Returns collections
     * 
     * @return array
     */
    public function collections() : array
    {
        return $this->routes;
    }
}