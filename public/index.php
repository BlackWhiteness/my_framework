<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$map = [
    '/index' => 'index',
    '/bye' => 'baybay'
];

$request = Request::createFromGlobals();
$response = new Response();
$path = $request->getPathInfo();

if (isset($map[$path])) {
    ob_start();
    extract($request->query->all());
    include sprintf(__DIR__.'/../src/page/%s.php', $map[$path]);
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}
$response->send();