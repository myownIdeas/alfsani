<?php
namespace App\Http\Controllers\Web;


use App\Company;

use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request as Requestt;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CompanyController  extends Controller
{
    public $response;
    public $request ="";
    public $company ="";
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
        $this->company = new Company();
    }
    public function index()
    {

        return $this->response->setView("web.company.create")->respond(["data"=>[
        'categories'=>$this->company->where('parent_category',0)->get()
        ]]);
    }
    public function listingPage()
    {

        return $this->response->setView("web.company.listing")->respond(["data"=>[
            'companies'=>$this->company->where('parent_category',0)->get()
        ]]);
    }
    public function subCategoryList(Requestt $request)
    {
        $condition = $request->get('scnd');

        if($condition == 'third_md_ls'){
          return json_encode($this->pureData($this->company->where('parent_category',$request->itemId)->get()));

        }else{
            return json_encode($this->company->where('parent_category',$request->itemId)->get());
        }

    }

    public function pureData($records){
        $finalData = '';
        $collection = collect($records);
        return $collection->groupBy('year');


    }
    public function edit(Requestt $request){
        $company = $this->company->find($request->company_id);
       return $this->response->setView("web.company.update")->respond(["data"=>[
           'company'=>$company
        ]]);
    }
    public function create(Requestt $request)
    {

        $company = new Company();

        $record = $company->where('name', $request->name)->get();

//        if(isset($record[0]) && $record[0]->name !=null){
//            Session::flash('message', 'This Item is Already Exist..!');
//            Session::flash('alert-class', 'alert-danger');
//            return Redirect::back();
//        }else{

            $company->name = $request->name;
            $company->parent_category = $request->parent_category;;
            $company->save();
            return $this->index();
        //}

    }

    public function update(Requestt $request)
    {
        $company = $this->company->find($request->company_id);
        $company->name = $request->name;
        $company->save();
        return Redirect::back();
    }
    public function delete(Requestt $request)
    {
        $city = $this->city->find($request->city_id);
        $city->is_deleted = 1;
        $city->save();
        return $this->listingPage();
    }
    public function insertModels(Requestt $request){
        $this->company->name = $request->model;
        $this->company->parent_category = $request->selectBox;
        $this->company->year = $request->from.'_'.$request->to;
        $this->company->save();
        $id = $this->company->id;
        return json_encode($this->company->where('parent_category',$request->selectBox)->get());
    }


}
