<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class ByeController
{
    public function index()
    {
        return new Response('Goodbye');
    }
}


