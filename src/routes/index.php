<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('index', new Route('/index/{name}', ['name' => 'world', '_controller' => 'render_template']));
$routes->add('baybay', new Route('/bye', ['_controller' => 'render_template']));
$routes->add('year', new Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'render_template'
)));

return $routes;