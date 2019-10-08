<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 3:32 PM
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Request\Requests\AddUserRequest;
use App\Http\Request\Requests\GetDashboardAppRequest;
use App\Http\Response\Response\WebResponse;

class AppController extends Controller
{
    public $response="";
    public function __construct(WebResponse $response)
    {
        $this->response = $response;
    }

    public function store(AddUserRequest $request)
    {
        dd($request->get('userName'));
    }

    public function getApp(GetDashboardAppRequest $request)
    {
        return $this->response->app('attendance','v1');
    }
}