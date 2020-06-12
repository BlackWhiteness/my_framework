<?php
/**
 * 架构入口文件
 */
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use App\bootstrap\FrameWork;

/**
 * 过程式控制模板解析器
 *
 * @param Request $request
 * @return Response
 */
//function render_template(Request $request)
//{
//    extract($request->attributes->all(), EXTR_SKIP);
//    ob_start();
//    include sprintf(__DIR__ . '/../src/page/%s.php', $_route);
//    return (new Response())->setContent(ob_get_clean());
//}

$request = Request::createFromGlobals();
$response = new Response();

$routes = include __DIR__ . '/../src/routes/index.php';
$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);


$resolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();
try {
    $framework = new FrameWork($matcher, $resolver, $argumentResolver);
    $response = $framework->handle($request);
} catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();