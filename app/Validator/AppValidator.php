<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 9:33 PM
 */

namespace App\Validator;


use Illuminate\Support\Facades\Validator;

class AppValidator
{
    public $validateMessage;
    public $request;
  public function __construct($request)
  {
      $this->request = $request;
  }
    public function __registerCustomRules(){
        $methods = get_class_methods($this);
        $custom_rules = [];
        foreach($methods as $method){
            if(strpos($method, 'register') === 0 && strpos($method, 'Rule') > 0)
                $custom_rules[] = $method;
        }
        foreach($custom_rules as $rule){
            $this->$rule();
        }
    }

    public function setValidationMessages($messages)
    {
        $this->validateMessage = $messages;
    }
    public function getValidationMessages()
    {
        return $this->validateMessage;
    }
    public function messages(){
        $messages = [
            //'required' =>'Password field is required',
            'validate_ownership' => 'Ownership Violation! Record is not under this user ownership.',
        ];
        $sub_messages = [];
        if(method_exists($this,'customValidationMessages'))
            $sub_messages = $this->customValidationMessages();
        return array_merge($messages, $sub_messages);
    }

    public  function validate(){

        $validator = Validator::make($this->request->all(), $this->rules(), $this->messages());
        if($validator->fails()){
            $this->setValidationMessages($validator->errors());
            return false;
        }
        return true;
    }
}