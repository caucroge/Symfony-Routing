<?php

namespace App\Concrete;

use ReflectionClass;
use ReflectionMethod;
use Symfony\Component\Routing\Loader\AnnotationClassLoader;
use Symfony\Component\Routing\Route;

class ConcreteAnnotationClassLoader extends AnnotationClassLoader
{
    // Cette méthode va traiter toutes les informations d'une route
    protected function configureRoute(
        Route $route,             // @Route("/hello/{name}", name="hello", defaults={"name": "bel inconnue"})
        ReflectionClass $class,   // Nom de la classe qui contient l'annotation : HelloController
        ReflectionMethod $method, // Nom de la méthode supportant la route : sayHello()
        object $annot
    ) {
        $route->addDefaults([
            '_controller' => $class->getName() . '@' . $method->getName(),
        ]);
    }
}
