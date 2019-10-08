<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 7:21 PM
 */

namespace App\Http\Request\Interfaces;


interface RequestInterface
{
    public function validate();
    public function authorize();
}