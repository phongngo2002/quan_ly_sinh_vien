<?php
    use Phroute\Phroute\RouteCollector;
    function definedRoute($url){
        $router = new RouteCollector();


        $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
        // Print out the value returned from the dispatched function
        echo $response;
    }


?>