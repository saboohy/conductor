<?php declare(strict_types=1);

namespace Saboohy\Conductor;

use Saboohy\Conductor\Collector;
use Saboohy\Conductor\Utils;

class Collection extends Collector
{
    /**
     * Gets prefix from child class
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setPrefix($this->prefix);
    }

    /**
     * Controller getter
     * 
     * @param string $controller
     * 
     * @return self
     */
    protected function controller(string $controller = "") : self
    {
        if ( !empty($controller) ) {
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

    }

    /**
     * Gets routing by GET method
     * 
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    protected function get(string $uri = "", string $action = "") : void
    {

    }

    /**
     * Gets routing by POST method
     * 
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    protected function post(string $uri = "", string $action = "") : void
    {

    }

    /**
     * Gets routing by PUT method
     * 
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    protected function put(string $uri = "", string $action = "") : void
    {

    }

    /**
     * Gets routing by PATCH method
     * 
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    protected function patch(string $uri = "", string $action = "") : void
    {

    }

    /**
     * Gets routing by DELETE method
     * 
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    protected function delete(string $uri = "", string $action = "") : void
    {

    }
}