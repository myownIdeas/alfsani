<?php

namespace App\Http\Middleware\Authenticator;

use App\Http\Requests\Request;
use App\Http\Responses\Responses\WebResponse;
use Closure;

class WebAuthenticator
{
    public $response;
    public function __construct()
    {

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param   $customRequest
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* @var $customRequest Request::class*/
       if(isset($request->session()->get('user')->id)){
           return $next($request);
       }else{
           return redirect('/');
       }


    }
}
