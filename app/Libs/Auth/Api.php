<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/25/2017
 * Time: 8:12 AM
 */

namespace App\Libs\Auth;


use App\Libs\Authenticate;

class Api extends Authenticate
{
    private $accessToken = null;

    public function authenticate()
    {
        if($this->getAccessToken() == "" || $this->getAccessToken() == null)
            return false;

        if($this->user() == null)
            return false;
        return true;
    }
    public function user()
    {
        try{
            return $this->users->getByToken($this->getAccessToken());
        }catch (\Exception $e){
            return null;
        }
    }
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param null $accessToken
     */

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}