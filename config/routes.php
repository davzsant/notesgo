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

    $routes->scope('/auth', function(RouteBuilder $builder): void {
        $builder->get('/', ['controller' => 'Auth', 'action' => 'index']);
        $builder->post('/', ['controller' => 'Auth', 'action' => 'login']);

        $builder->get('/register', ['controller' => 'Auth', 'action' => 'register']);
        $builder->post('/register', ['controller' => 'Auth', 'action' => 'create']);

        $builder->get('/forget_password', ['controller' => 'Auth', 'action' => 'forget_password']);
        $builder->post('/forget_password', ['controller' => 'Auth', 'action' => 'send_password_code']);


    });
};
