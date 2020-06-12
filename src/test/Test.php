<?php

namespace App\test;

use App\bootstrap\FrameWork;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;


class Test extends TestCase
{

    public function testErrorHandling()
    {
        $this->handle();
    }

    public function handle()
    {
        $a = 100000;
        while ($a>1){
            echo $a;
            $a--;
        }
    }
}