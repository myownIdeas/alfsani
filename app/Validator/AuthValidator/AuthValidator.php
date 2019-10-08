<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 9:32 PM
 */

namespace App\Validator\AuthValidator;


use App\Validator\AppValidator;

class AuthValidator extends AppValidator
{
    public function __construct($request){
        parent::__construct($request);
    }
    public function CustomValidationMessages(){
        return [
            //
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}