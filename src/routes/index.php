<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('index', new Route('/index/{name}', ['name' => 'world']));
$routes->add('baybay', new Route('/bye'));

return $routes;