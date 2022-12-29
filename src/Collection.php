<?php declare(strict_types=1);

namespace Saboohy\Conductor;

use Saboohy\Conductor\Collector;
use Saboohy\Conductor\Utils;

use function array_unshift;
use function array_merge;

class Collection extends Collector
{
    /**
     * Middlewares
     * 
     * @var array
     */
    private array $calledMiddlewares = [];

    /**
     * Initializer
     * 
     * @return void
     */
    public function __construct()
    {
        if ( isset($this->middleware) ) {
            array_unshift($this->calledMiddlewares, $this->middleware);
        }
    }

    /**
     * Controller getter
     * 
     * @param string $controller
     * 
     * @return self
     */
    protected function controller(string $controller = "", array $middlewares = []) : self
    {
        if ( !empty($controller) ) {

            $this->calledMiddlewares = array_merge($this->calledMiddlewares, $middlewares);
            $this->setController($controller);

            return $this;
        }

        throw new \Exception("Controller is not declared.");
    }

    /**
     * Groups collections by controller
     * 
     * @param object|callable $callback
     * 
     * @return void
     */
    protected function group(object|callable $callback = null) : void
    {
        if ( Utils::dataIs($callback, ["object", "callable"]) ) {
            call_user_func($callback, $this);
            return;
        }

        throw new \Exception("Callback is not callable.");
    }

    /**
     * Prefix getter
     * 
     * @param string $prefix
     * 
     * @return void
     */
    protected function prefix(string $prefix = "") : void
    {
        if ( !empty($prefix) ) {
            $this->setPrefix($this->prefix . $prefix);
            return;
        }
        
        throw new \Exception("Empty prefix.");
    }

    /**
     * Gets routing by GET method
     * 
     * @param string            $uri
     * @param string            $action
     * @param array<string>     $middlewares
     * 
     * @return void
     */
    protected function get(string $uri = "", string $action = "", array $middlewares = []) : void
    {
        $this->addRoute("GET", $uri, $action, $middlewares);
    }

    /**
     * Gets routing by POST method
     * 
     * @param string            $uri
     * @param string            $action
     * @param array<string>     $middlewares
     * 
     * @return void
     */
    protected function post(string $uri = "", string $action = "", array $middlewares = []) : void
    {
        $this->addRoute("POST", $uri, $action, $middlewares);
    }

    /**
     * Gets routing by PUT method
     * 
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    protected function put(string $uri = "", string $action = "", array $middlewares = []) : void
    {
        $this->addRoute("PUT", $uri, $action, $middlewares);
    }

    /**
     * Gets routing by PATCH method
     * 
     * @param string            $uri
     * @param string            $action
     * @param array<string>     $middlewares
     * 
     * @return void
     */
    protected function patch(string $uri = "", string $action = "", array $middlewares = []) : void
    {
        $this->addRoute("PATCH", $uri, $action, $middlewares);
    }

    /**
     * Gets routing by DELETE method
     * 
     * @param string            $uri
     * @param string            $action
     * @param array<string>     $middlewares
     * 
     * @return void
     */
    protected function delete(string $uri = "", string $action = "", array $middlewares = []) : void
    {
        $this->addRoute("DELETE", $uri, $action, $middlewares);
    }

    /**
     * Adds routing
     * 
     * @param string $method
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    private function addRoute(string $method = "GET", string $uri = "", string $action = "", array $middlewares = []) : void
    {
        if ( empty($uri) )      throw new \Exception("Empty uri.");
        if ( empty($action) )   throw new \Exception("Empty action.");

        $middlewares = array_merge($this->calledMiddlewares, $middlewares);

        $this->registerRouter($method, $uri, $action, $middlewares);
    }
}