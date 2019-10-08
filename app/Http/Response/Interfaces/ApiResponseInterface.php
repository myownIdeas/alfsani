<?php

/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/14/2016
 * Time: 10:27 PM
 */

namespace App\Http\Response\Interfaces;

interface ApiResponseInterface
{
    public function response(array $response , array $header =[]);
}