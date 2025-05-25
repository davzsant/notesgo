<?php


use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;


return function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'home']);
        $builder->connect('/pages/*', 'Pages::home');
        $builder->fallbacks();
    });
};
