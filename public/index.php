<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;


function render_template(Request $request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__ . '/../src/page/%s.php', $_route);
    return (new Response())->setContent(ob_get_clean());
}

$request = Request::createFromGlobals();
$response = new Response();

$routes = include __DIR__ . '/../src/routes/index.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);
$attributes = $matcher->match($request->getPathInfo());


try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    $response = call_user_func($request->attributes->get('_controller'), $request);
} catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();