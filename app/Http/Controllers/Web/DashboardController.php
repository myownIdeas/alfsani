<?php
namespace App\Http\Controllers\Web;

use App\City;
use App\Http\Repo\DashboardTrait;
use App\Http\Request\Request;
use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;


class DashboardController  extends Controller
{
    public $response;
    public $request ="";
    public $home ="";
    use DashboardTrait;
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;

    }
    public function index(Request $request)
    {
        ;
        return $this->response->setView("web.dashboard.dashboard")->respond(["data"=>[
            'records'=>$this->dashboardRecords($request->session()->get('user'))
            ]]);
    }


}
