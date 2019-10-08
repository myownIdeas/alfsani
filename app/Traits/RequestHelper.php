<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/20/2016
 * Time: 8:29 PM
 */

namespace App\Traits;

use App\Libs\Auth\Api as ApiAuthenticator;

trait RequestHelper
{
    public function requestType()
    {
        $routeParts = explode('/', request()->route()->getPrefix());
        if(isset($routeParts[0]) && $routeParts[0] == 'api')
            return 'api';

    }
    public function getRequestAuthenticator()
    {
        return $this->apiAuthenticatorWithToken();
    }
    /*
     * incoming request is an api request or not?
     */
    public function isApi()
    {
        return ($this->requestType() == 'api')?true:false;
    }
    /*
 * incoming request is a web request or not?
 */

    /*
     * returns web/api Authenticator for the request.
     */


    /*
     * returns apiAuthenticator with Authorization
     * key...
     */
    public function apiAuthenticatorWithToken()
    {
        $authenticator = new ApiAuthenticator();
        $authenticator->setAccessToken($this->getAccessToken());
        return $authenticator;
    }

    /*
    * return Authorization token within the
    * incoming request.
    */
    public function getAccessToken()
    {
        // just for testing
        return '$2y$10$o95CsuyVS19jCg6C.payUOSfbm4r.1opCk7QxozOn8eIO/6N0Zkvu';
        // before running unit tests...
        //$headers['Authorization'] = '$2y$10$tSM.PiN9BnMfyonqjHlwTONa1DPHbyQSAMOtmt4chJYXenGeYySHC';
        //$headers = apache_request_headers();
        //return (isset($headers['Authorization']))?$headers['Authorization']:null;
    }
}