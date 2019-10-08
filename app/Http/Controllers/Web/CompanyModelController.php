<?php
namespace App\Http\Controllers\Web;


use App\Company;

use App\CompanyModel;
use App\Http\Request\Request;
use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request as Requestt;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CompanyModelController  extends Controller
{
    public $response;
    public $request ="";
    public $companyModel ="";
    public $company = '';
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
        $this->companyModel  = new CompanyModel();
        $this->company  = new company();
    }
    public function index()
    {

        return $this->response->setView("web.company_model.create")->respond(["data"=>[
        'companies'=>$this->company ->where('parent_category',0)->get()
        ]]);
    }
//    public function listingPage()
//    {
//        $modelWithItems = DB::table('company_item')
//           ->join('company', 'company.id', '=', 'company_item.company_id')
//           ->join('company as model', 'model.id', '=', 'company_item.model_id')
//            ->select('company.name', 'company_item.*','model.name as modelName')
//            ->groupBy('company_id')
//            ->get();
//        return $this->response->setView("web.company_model.listing")->respond(["data"=>[
//            'modelWithItems'=>$modelWithItems
//        ]]);
//    }
    public function listingPage()
    {
        $modelWithItems = DB::table('company')
            ->select('company.*')
            ->where('parent_category',0)
            ->get();
        return $this->response->setView("web.company_model.listing")->respond(["data"=>[
            'models'=>$modelWithItems
        ]]);
    }
    public function subCategoryList(Requestt $request)
    {

        return json_encode($this->companyModel ->where('parent_category',$request->itemId)->get());
    }


    public function edit(Requestt $request){
        $companyModel  = $this->companyModel ->find($request->company_id);
       return $this->response->setView("web.companyModel .update")->respond(["data"=>[
           'companyModel '=>$companyModel
        ]]);
    }
    public function create(Requestt $request)
    {

         $items = explode(',',$request->get('items'));
        foreach($items as $item) {

            $companyModel = new companyModel();
            $companyModel->company_id = $request->company_id;
            $companyModel->model_id = $request->model_id;
            $companyModel->year = $request->year;
            $companyModel->item = $item;
            $companyModel->save();
        }
         return $this->index();


    }

    public function update(Requestt $request)
    {
        $companyModel  = $this->companyModel ->find($request->companyModelid);
        $companyModel ->name = $request->name;
        $companyModel ->save();
        return Redirect::back();
    }
    public function delete(Requestt $request)
    {
        $city = $this->city->find($request->city_id);
        $city->is_deleted = 1;
        $city->save();
        return $this->listingPage();
    }

    public function addItems(){
        return $this->response->setView("web.item.create")->respond(["data"=>[
            'companies'=>$this->company ->where('parent_category',0)->get()
        ]]);
    }

    public function insertItems(Requestt $request){
        $items = new CompanyModel();
        $final = [];
       foreach($request->itemName as $key=>$itme_price){
           $final[] =[
            'company_id' => $request->company_id,
            'first_model' => $request->model_id,
            'second_model' => $request->second_model,
            'third_model' => $request->third_model,
            'item' => $request->itemName[$key],
            'price' => $request->itemPrice[$key],
       ];

    }
        $items->insert($final);

        return $this->addItems();
    }

    public function itemListing(Requestt $request){

    }
    public function itemListingPage()
    {
        $modelWithItems = DB::table('company_item')
            ->leftjoin('company', 'company.id', '=', 'company_item.company_id')
            ->leftjoin('company as f_model', 'f_model.id', '=', 'company_item.first_model')
            ->leftjoin('company as s_model', 's_model.id', '=', 'company_item.second_model')
            ->leftjoin('company as t_model', 't_model.id', '=', 'company_item.third_model')
            ->select('company_item.third_model','company_item.company_id','company.name', 'company_item.*','f_model.name as fName','s_model.name as sName','t_model.name as tName')
            ->groupBy('company_item.third_model')
            ->get();

        return $this->response->setView("web.item.listing")->respond(["data"=>[
            'modelWithItems'=>$modelWithItems
        ]]);
    }
    public function getCompanyItemListing(Requestt $request){
        $records = DB::table('company_item')->select('company_item.*')
            ->where('third_model',$request->thirdModel)
            ->where('company_id',$request->companyId)->get();
        $final = [];
       if(isset($records[0])){
           foreach($records as $record){
               $final[]= ['name'=>$record->item,'id'=>$record->id,'price'=>$record->price];
           }

           return json_encode($final);
       }else{
           return json_encode(['res'=>'false']);
       }

    }
    public function getItems(Requestt $request){
        $records = DB::table('company_item')->select('company_item.*')
            ->where('third_model',$request->model)
            ->Where('item','like','%'.$request->value.'%')->get();
        $final = [];

        foreach($records as $record){
            $final[]= ['name'=>$record->item,'id'=>$record->id,'price'=>$record->price];
        }

        return json_encode($final);
    }
    public function getModelItems(Requestt $request){
        $records = DB::table('company_item')->select('company_item.*')
            ->where('third_model',$request->model)->get();
        $final = [];

        foreach($records as $record){
            $final[]= ['name'=>$record->item,'id'=>$record->id,'price'=>$record->price];
        }

        return json_encode($final);
    }
    public function updateModel(Requestt $request){
        $model = Company::where('id',$request->get('modelId'))->first();
        $model->name = $request->get('name');
        $model->save();
        return 'true';
    }

    public function updateModelItems(Requestt $request){
        $item=  CompanyModel::where('id',$request->get('itemId'))->first();
        $item->item = $request->get('name');
        $item->save();
        return 'true';
    }

}
