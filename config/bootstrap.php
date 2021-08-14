<?php

use App\Concrete\ConcreteAnnotationClassLoader;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;

require __DIR__ .  '../../vendor/autoload.php';

$loader = new AnnotationDirectoryLoader(
    new FileLocator(
        __DIR__ . '../../src/Controller'
    ),
    new ConcreteAnnotationClassLoader(new AnnotationReader())
);

$routeCollection = $loader->load(__DIR__ . '../../src/Controller');

$urlMatcher = new UrlMatcher(
    $routeCollection,
    new RequestContext('', $_SERVER['REQUEST_METHOD'])
);
$urlGenerator = new UrlGenerator($routeCollection, new RequestContext());
$pathInfo = $_SERVER['PATH_INFO'] ?? "/";
