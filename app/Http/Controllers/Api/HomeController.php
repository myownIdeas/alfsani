<?php

namespace App\Http\Controllers\Api;
use App\Http\Response\Response\ApiResponse;
use App\Http\Controllers\Api\ApiController;

use App\Http\Request\Requests\Home\AddHomeRequest;
use App\Http\Request\Requests\Home\DeleteHomeRequest;
use App\Http\Request\Requests\Home\GetAllHomeRequest;
use App\Http\Request\Requests\Home\UpdateHomeRequest;
use App\Repositories\Repositories\Home\HomeRepo;


class HomeController  extends ApiController
{
    public $response;
    public $request ='';
    public $home ='';
    public function __construct(ApiResponse $apiResponse)
    {

        $this->response = $apiResponse;
        $this->home = new HomeRepo();
    }
    public function index(AddHomeRequest $addHomeRequest){
        return $this->response->response(["data"=>[
            'home'=>$this->home->store($this->request),
        ]]);
    }
    public function store(AddHomeRequest $addHomeRequest){
        return $this->response->response(["data"=>[
            'home'=>$this->home->store($this->request),
        ]]);
    }
    public function all(GetAllHomeRequest $getAllHomesRequest){
        return $this->response->response(["data"=>[
            'home'=>$this->home->store($this->request),
        ]]);
    }

    public function delete(DeleteHomeRequest $deleteHomeRequest){
        return $this->response->response(["data"=>[
            'home'=>$this->home->store($this->request),
        ]]);
    }
}
