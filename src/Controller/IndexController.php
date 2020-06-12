<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function index($name)
    {
        $name = isset($name) ? $name : '';

        return new Response(sprintf('hello %s', htmlspecialchars($name, ENT_QUOTES)));
    }
}

