<?php

/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/14/2016
 * Time: 10:27 PM
 */

namespace App\Http\Response\Interfaces;

interface WebResponseInterface
{
    public function respond(array $response);
}