<?php
/**
* Created by PhpStorm.
* User: Waqas
* Date: 12/12/2016
* Time: 7:00 PM
*/

namespace App\Http\Request\Requests\Home;
use App\Http\Request\Interfaces\RequestInterface;
use App\Http\Request\Request;
use App\Models\Home;
use App\Transformer\Request\AutoTransformer;
use App\Validator\HomeValidator\DeleteHomeValidator;

class DeleteHomeRequest extends Request implements RequestInterface
{
public $validator = null;

public function __construct()
{
    parent::__construct(new AutoTransformer($this->allOriginal(),$Transform = true));
    $this->validator = new DeleteHomeValidator($this);
}

public function validate()
{
    return $this->validator->validate();
}
public function authorize()
{
    return true;
}
public function getHomeModel()
{
    $Home = new Home();
    return true;
}

}