<?php
namespace App\Http\Controllers\Web;

use App\City;
use App\Http\Repo\DashboardTrait;
use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;

use App\ShopDetailContext;
use App\ShopeCenter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class HomeController  extends Controller
{
    public $response;
    public $request ="";
    public $home ="";
    use DashboardTrait;
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
        $this->city = new City();
        $this->user = new User();
        $this->shope = new ShopeCenter();
    }
    public function index()
    {
                return $this->response->setView("web.login.login")->respond(["data"=>[

        ]]);
//        return $this->response->setView("web.home.home")->respond(["data"=>[
//            'cities'=>$this->city->all()->where('is_deleted',0)
//        ]]);
    }

    public function getShopForAjax(){

    }
    public function deleteContactForShop(Request $request){
        $shop = ShopDetailContext::where('id',$request->id)->first();
        $shop->delete();
        return 'true';
    }
    public function addShop()
    {

        return $this->response->setView("web.home.home")->respond(["data"=>[
            'cities'=>$this->city->all()->where('is_deleted',0)
        ]]);
    }
    public function validateUser(Request $request){


      $user = User::where('email', $request->get('email'))->first();

        if($user !=null && $user->password == md5($request->get('password'))){
                   $request->session()->put('user', $user);
                   return $this->response->setView("web.dashboard.dashboard")->respond(["data"=>[
                       'records'=>$this->dashboardRecords()
                       ]]);
        }else{
            Redirect::back();
        }
    }



    public function listingPage(Request $request)
    {
        return $this->response->setView("web.home.listing")->respond(["data"=>[
            'shopes'=>$this->shope->all()->where('is_deleted',0),
            'user'=>$request->session()->get('user')
        ]]);
    }
    public function edit(Request $request){

        return $this->response->setView("web.home.update")->respond(["data"=>[
            'shop'=>$this->shope->find($request->shop_id),
            'cities'=>$this->city->all()->where('is_deleted',0),
            'user'=>$request->session()->get('user')
        ]]);
    }
    public function create(Request $request)
    {

        $this->shope->name = $request->shop_name;
        $this->shope->person_name = $request->person_name;
        $this->shope->mobile = $request->mobile;
        $this->shope->what_app_number = $request->whats_app;
        $this->shope->ptcl = $request->ptcl;
        $this->shope->city_id = $request->city_id;
        $this->shope->society_name = $request->society;
        $this->shope->website = $request->website;
        $this->shope->address = $request->address;
        $this->shope->discount = $request->discount;
        $this->shope->email = $request->email;
        $this->shope->work_type = $request->work_type;
        $this->shope->facebook_url = ($request->facebook !=null)?$request->facebook:'null';
        $this->shope->imge = $this->fileUpload($request);
        $this->shope->save();
        $lastId = $this->shope->id;

        $final = [];
        if(isset($request->ext_name[0])){

            foreach($request->ext_name as $key=>$value){
                $final[] = [
                    'shop_id'=>$lastId,
                    'name'=>$request->ext_name[$key],
                    'mobile'=>$request->ext_mobile[$key],
                    'what_app'=>$request->ext_whats_app[$key],
                    'email'=>$request->ext_email[$key],
                ];
            }
            DB::table('shopes_detail_context')->insert($final);
        }
        return $this->listingPage($request);
    }

    public function update(Request $request)
    {
        $image = $this->fileUpload($request);
        $shopData = $this->shope->find($request->shop_id);
        $shopData->name = $request->shop_name;
         $shopData->person_name = $request->person_name;
         $shopData->mobile = $request->mobile;
         $shopData->work_type = $request->work_type;
         $shopData->what_app_number = $request->whats_app;
         $shopData->ptcl = $request->ptcl;
         $shopData->city_id = $request->city_id;
         $shopData->society_name = $request->society;

         $this->shope->website = $request->website;
         $shopData->address = $request->address;
         $shopData->email = $request->email;
         $shopData->discount = $request->discount;
         $shopData->facebook_url = $request->facebook;
         $shopData->imge = ($image == "")?$shopData->imge:$image;
         $shopData->save();

        $final = [];

        ShopDetailContext::where('shop_id',$request->shop_id)->delete();
        if($request->ext_name !=null){
            foreach($request->ext_name as $key=>$value){
                $final[] = [
                    'shop_id'=>$request->shop_id,
                    'name'=>$request->ext_name[$key],
                    'mobile'=>$request->ext_mobile[$key],
                    'what_app'=>$request->ext_whats_app[$key],
                    'email'=>$request->ext_email[$key],
                ];
            }
            DB::table('shopes_detail_context')->insert($final);
        }

        return $this->listingPage($request);
    }



    public function delete(Request $request)
    {
        $shopData = $this->shope->find($request->shop_id);
        $shopData->is_deleted = 1;
        $shopData->save();
        return $this->listingPage($request);
    }
}
