<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 7:00 PM
 */

namespace App\Http\Request\Requests;


use App\Http\Request\Interfaces\RequestInterface;
use App\Http\Request\Request;
use App\Transformer\Request\AddUserTransformer;
use App\Transformer\Request\AutoTransformer;
use App\Validator\UserValidator\AddUserValidator;

class GetDashboardAppRequest extends Request implements RequestInterface
{
    public $validator = null;
    public $auto = 'auto';
    public $manvoul = 'manviul';
    public function __construct()
    {
        parent::__construct(new AutoTransformer($this->getOriginalRequest(),$this->manvoul));
        $this->validator = new AddUserValidator($this);
    }

    public function validate()
    {
        return $this->validator->validate();
    }
    public function authorize()
    {
        return true;
    }

}