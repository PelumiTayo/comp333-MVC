<?php

class Route
{
    private $uri;
    private $dir;
    public function __construct($uri, $dir)
    {
        $this->uri = $uri;
        $this->dir = $dir;
    }

    function getUri() {
        return $this->uri;
    }

    function getDir() {
        return $this->dir;
    }

    public static function get($uri, $dir) {
        $route = new Route($uri, $dir);
        $route->route();
        return $route;
    }

    public static function post($uri, $dir) {
        $route = new Route($uri, $dir);
        $route->route();
        return $route;
    }

    public static function put($uri, $dir) {
        $route = new Route($uri, $dir);
        $route->route();
        return $route;
    }

    public static function patch($uri, $dir) {
        $route = new Route($uri, $dir);
        $route->route();
        return $route;
    }

    public static function delete($uri, $dir) {
        $route = new Route($uri, $dir);
        $route->route();
        return $route;
    }

    private function route() {

    }

    /**
     * Adds a middleware file to the route
     *
     * @param array|string|null $middleware
     * @return void
     */
    public function middleware($middleware = null) {
        $this->route();
    }
}


