<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 5:50 PM
 */

namespace App\Http\Middleware\Validator;

use App\Http\Response\Response\ApiResponse;
use Closure;
class ApiValidator
{
    public $response="";
    public function __construct(ApiResponse $apiResponse)
    {
        $this->response = $apiResponse;
    }

    public function handle($request,Closure $next,$customRequest)
    {
        $customRequest = ucfirst($customRequest);

        $customRequest = new $customRequest();
         if(!$customRequest->validate())
        {
           return $this->response->respondValidationFails($customRequest->validator->getValidationMessages());
        }
        return $next($request);
    }
}