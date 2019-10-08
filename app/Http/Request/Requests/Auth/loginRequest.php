<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/9/2017
 * Time: 8:55 AM
 */

namespace App\Http\Request\Requests\Auth;


use App\Http\Request\Request;
use App\Transformer\Request\AutoTransformer;
use App\Validator\AuthValidator\LoginValidator;

class loginRequest extends Request
{
    public function __construct(){
        parent::__construct(new AutoTransformer($this->allOriginal()));
        $this->validator = new LoginValidator($this);

    }

    public function validate(){
        return $this->validator->validate();
    }
    public function getCredentials()
    {
        return [
            'email' => $this->get('email'),
            'password' => $this->get('password'),
        ];
    }
}