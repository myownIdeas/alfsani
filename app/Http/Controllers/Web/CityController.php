<?php
namespace App\Http\Controllers\Web;

use App\City;
use App\Http\Request\Request;
use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;
use App\Http\Request\Requests\Home\EditHomeRequest;
use Illuminate\Http\Request as Requestt;
use App\Repositories\Repositories\Home\HomeRepo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CityController  extends Controller
{
    public $response;
    public $request ="";
    public $home ="";
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
        $this->home = new HomeRepo();
        $this->city = new City();
    }
    public function index()
    {
        return $this->response->setView("web.city.create")->respond(["data"=>[

        ]]);
    }
    public function listingPage()
    {

        return $this->response->setView("web.city.listing")->respond(["data"=>[
            'cities'=>$this->city->all()->where('is_deleted',0)
        ]]);
    }
    public function edit(Requestt $request){
        $city = $this->city->find($request->city_id);
       return $this->response->setView("web.city.update")->respond(["data"=>[
           'city'=>$city
        ]]);
    }
    public function create(Requestt $request)
    {

        $city = new City();

        $record = $city->where('name', $request->city)->get();

        if(isset($record[0]) && $record[0]->name !=null){
            Session::flash('message', 'This City is Already Exist..!');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::back();
        }else{

            $city->name = $request->city;
            $city->country_id = 1;
            $city->is_deleted = 0;
            $city->save();

            return $this->index();
        }

    }

    public function update(Requestt $request)
    {
        $city = $this->city->find($request->city_id);
        $city->name = $request->city;
        $city->save();
        return Redirect::back();
    }
    public function delete(Requestt $request)
    {
        $city = $this->city->find($request->city_id);
        $city->is_deleted = 1;
        $city->save();
        return $this->listingPage();
    }

}
