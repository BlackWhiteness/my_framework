<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class YearController
{
    public function index($year)
    {

        if (null === $year) {
            $year = date('Y');
        }

        $a = 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
        $res = $a ? '是的' : '不是';
        return new Response($res);
    }
}
