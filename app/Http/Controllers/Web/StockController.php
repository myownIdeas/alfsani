<?php
namespace App\Http\Controllers\Web;

use App\City;
use App\CompanyModel;
use App\Http\Request\Request;
use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;
use App\Http\Request\Requests\Home\EditHomeRequest;
use App\ShopeCenter;
use App\Stock;
use Illuminate\Http\Request as Requestt;
use App\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class StockController  extends Controller
{
    public $response;
    public $request ="";
    public $home ="";
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
    }
    public function index(){

            return $this->response->setView("web.stock.create")->respond(["data"=>[
                'shoppes'=>ShopeCenter::all(),
                'companies'=>Company::where('parent_category',0)->get(),
            ]]);
    }

    public function insert(Requestt $request){
       // dd($request->all());
        $final = [];

        foreach($request->itemId as $key=>$item){
            $final[] = [
                'shop_id' => $request->shop,
                'company_id' => $request->company_id[0],
                'first_model' => $request->model_id[0],
                'second_model' => $request->second_model[0],
                'third_model' => $request->third_model[0],
                'item_id' => $request->itemId[$key][0],
                'qty' => $request->quantity[$key],
                'item_set' => $request->item_set[$key],
                'item_type' => $request->item_type[$key],
            ];

        }
        DB::table('stock')->insert($final);
        return $this->index();
    }

    public function listing(Requestt $request){
        return $this->response->setView("web.stock.listing")->respond(["data"=>[
            'stocks'=>Stock::all(),
        ]]);

    }
    public function deleteStock($sotockId){
        Stock::where('id',$sotockId)->delete();
        return $this->response->setView("web.stock.listing")->respond(["data"=>[
            'stocks'=>Stock::all(),
        ]]);
    }

    public function updateStockQuantity(Requestt $request){
       $stock = Stock::where('id',$request->stock_id)->first();
       $stock->shop_id = $request->shop;
       $stock->qty = $request->quantity;
       $stock->item_set = $request->item_set;
       $stock->save();
       return Redirect::back();
    }
    public function updateStock($sotockId){
        $stock = Stock::where('id',$sotockId)->first();

        return $this->response->setView("web.stock.update")->respond(["data"=>[
            'shoppes'=>ShopeCenter::all(),
            'companies'=>Company::where('parent_category',0)->get(),
            'stock'=>$stock,
            'firstModel'=>Company::where('parent_category',$stock->company_id)->get(),
            'secondModel'=>Company::where('parent_category',$stock->first_model)->get(),
            'thirdModel'=>Company::where('parent_category',$stock->second_model)->get(),
            'items'=>$this->stockMapper(CompanyModel::where('id',$stock->item_id)->get())

        ]]);
    }
    public function stockMapper($records){
        $items =[];
        foreach ($records as $record){
            $items[] = [
                'name'=>$record->item
            ];
        }
        return $items;
    }
}
