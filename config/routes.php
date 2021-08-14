<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routingConfigurator) {
    $routingConfigurator

        // Ajout des routes pour le TaskController
        ->add('list', '/')
        ->controller('App\Controller\TaskController@index')

        ->add('show', '/show/{id<\d+>?100}')
        ->defaults(['controller' => 'App\Controller\TaskController@show'])

        ->add('create', '/create')
        ->defaults(['controller' => 'App\Controller\TaskController@create'])
        ->schemes(['http'])
        ->methods(['GET', 'POST'])

        // Ajout des routes pour HelloController
        ->add('hello', '/hello/{name}')
        ->defaults(['controller' => 'App\Controller\HelloController@sayHello']);
};
