<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('index',
    new Route('/index/{name}', [ '_controller' => '\App\Controller\IndexController::index']));
$routes->add('bye', new Route('/bye', ['_controller' =>'\App\Controller\ByeController::index']));
$routes->add('year', new Route('/is_leap_year/{year}', array(
    '_controller' => '\App\Controller\YearController::index'
)));

return $routes;