<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/10/2017
 * Time: 7:53 AM
 */

namespace App\Http\Controllers\Api\Auth;


use App\Http\Controllers\Api\ApiController;
use App\Http\Request\Requests\Auth\loginRequest;
use App\Http\Response\Response\ApiResponse;
use App\Libs\LoginUser;

class AuthController extends ApiController
{
    public $response="";
    public $auth ="";
    public function __construct(ApiResponse $apiResponse,LoginUser $loginUser)
    {
        $this->auth = $loginUser;
        $this->response = $apiResponse;
    }

    public function login(loginRequest $request)
    {
        $user = $this->auth->attempt($request->getCredentials());
        if($user =="" || $user ==null)
            return $this->response->respondInvalidCredentials();
        $legalUser = $this->auth->login($user);

        $_SESSION['user'] = $legalUser;
        return $this->response->response(['data'=>[
               'authUser'=>$legalUser
           ]]);
    }
}