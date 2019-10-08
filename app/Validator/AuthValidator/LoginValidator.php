<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 9:28 PM
 */

namespace App\Validator\AuthValidator;


class LoginValidator extends AuthValidator
{
    public function __construct($request)
    {
        parent::__construct($request);
    }
    public function CustomValidationMessages(){
        return [

        ];
    }
    public function rules()
    {
        return [
            'email'=>'required',
            'password'=>'required'
        ];
    }
}