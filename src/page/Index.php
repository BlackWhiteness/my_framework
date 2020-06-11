<?php

namespace App\page;

class Index
{
    public function index($name)
    {
        $name = isset($name) ? $name : '';

        echo sprintf('hello %s', htmlspecialchars($name, ENT_QUOTES));
    }
}

