<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 7:14 PM
 */

namespace App\Http\Request;


use App\Repositories\Repositories\User\UserRepo;
use App\Traits\RequestHelper;

class Request
{
    use RequestHelper;

    public $transformedValues =[];
    public $user = '';
    public function __construct($transformer)
    {
        $this->transformer = $transformer;
        $this->transformedValues = $this->transformer->transform();
        $this->authenticator = $this->getRequestAuthenticator();
        $this->user = new UserRepo();
    }
    public function get($key){
        return (isset($this->transformedValues[$key]))?$this->transformedValues[$key]:null;
    }
    public function user()
    {
       return $this->user->getByToken($this->authenticator->getAccessToken());
    }
    public function getOriginal($key){
        return request()->get($key);
    }

    public function all(){
        return $this->transformedValues;
    }

    public function allOriginal(){
        return request()->all();
    }
    public function session($key){
        return request()->session()->get($key);
    }

    public function file($file)
    {
        return $this->getOriginalRequest()->file($file);
    }

    public function has($file)
    {
        return ($this->file($file) != null)?true:false;
    }
    public function hasFile($fileName)
    {
        return $this->getOriginalRequest()->hasFile($fileName);
    }
    public function getOriginalRequest()
    {
        return request();
    }

    /*
     * tells weather the request is authentic.
     */
    public function authentic(){
        return $this->authenticator->authenticate();
    }

    /*
     * tells weather the request is not authentic.
     */
    public function isNotAuthentic(){
        return (!$this->authentic())?true: false;
    }
}