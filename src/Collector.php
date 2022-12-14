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
    private string $prefix = "";

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
    protected function setPrefix(string $prefix = "") : void
    {
        $this->prefix = $this->initPrefix($prefix);
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
    protected function registerRouter(string $method = "GET", string $uri = "", string $action = "", array $middlewares = []) : void
    {
        if ( empty($this->controller) ) {
            throw new \Exception("Controller is not declared.");
        }

        $this->routes[$method][$this->initUri($this->prefix . $uri)] = [
            "action"        => [$this->controller, $action],
            "middleware"    => $middlewares
        ];
    }

    /**
     * Returns collections
     * 
     * @return array
     */
    public function collections() : array
    {
        call_user_func([$this, "collect"]);

        return $this->routes;
    }
}