<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('index',
    new Route('/index/{name}', ['name' => 'world', '_controller' => '\App\page\Index::index']));
$routes->add('bye', new Route('/bye', ['_controller' =>'\App\page\Bye::index']));
$routes->add('year', new Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => '\App\page\Year::index'
)));

return $routes;