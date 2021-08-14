<?php

use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require __DIR__ . "/config/bootstrap.php";
try {
    $currentRoute = $urlMatcher->match($pathInfo);
    $currentRoute['urlGenerator'] = $urlGenerator;

    $controller = $currentRoute['_controller'];
    $className = substr($controller, 0, strpos($controller, "@"));
    $methodName = substr($controller, strpos($controller, "@") + 1);
    $instanceController = new $className();

    call_user_func([$instanceController, $methodName], $currentRoute);
} catch (ResourceNotFoundException $e) {
    require "pages/404.php";
}
