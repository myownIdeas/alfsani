<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 8:13 PM
 */

namespace App\Transformer;


Abstract class RequestTransformer
{
    public $request;
    protected $switch;
    public function __construct($request,$switch)
    {
        $this->request = $request;
        $this->switch = $switch;
    }
}