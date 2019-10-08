<?php
namespace App\Http\Controllers\Web;

use App\City;
use App\GroupDetail;

use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;

use App\MyGroups;
use App\ShopeCenter;
use App\User;
use Illuminate\Http\Request as Requestt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Company;

class GroupController  extends Controller
{
    public $response;
    public $request ="";
    public $group ="";
    public $user ="";
    public $shopes ="";
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
        $this->user = new User();
        $this->shopes = new ShopeCenter();
        $this->group =  new MyGroups();
        $this->company  = new Company();
    }
    public function index()
    {
        $modelWithItems = DB::table('shopes')
            ->select('*')
            ->groupBy('mobile')
            ->get();
        return $this->response->setView("web.group.create")->respond(["data"=>[
            'users'=>$this->user->where('user_type',2)->get(),
            'shopes'=>$modelWithItems
        ]]);
    }
    public function create(Requestt $request)
    {

                $group = new MyGroups();
//                $groupDetail = new GroupDetail();

                $group->name = $request->group_name;
                $group->group_owner_id = 1;
                $group->group_user_for = $request->user;
                $group->save();
                $lastId =$group->id;
                $records =array();
//                foreach($request->shopes as $key=>$value){
//                   $records[] =
//                       [
//                            'group_id' => $lastId,
//                            'shop_id' => $key
//                       ];
//                }
//                $groupDetail->insert($records)
;                    return $this->index();
    }
    public function listingPage(Requestt $request)
    {

        $userType = $request->session()->get('user');
        if($userType->user_type == 1){
            $groups = $this->group->where('group_owner_id',$userType->id)->get();
        }else{
            $groups = $this->group->where('group_user_for',$userType->id)->get();
        }

        return $this->response->setView("web.group.listing")->respond(["data"=>[
            'groups'=>$groups
        ]]);
    }
    public function editListingPage(Requestt $request)
    {
        return $this->response->setView("web.group.edit_listing")->respond(["data"=>[
            'groups'=>$this->group->get()
        ]]);
    }

    public function groupDetail(Requestt $request){

        return $this->response->setView("web.group.group_detail")->respond(["data"=>[
            'group'=>$this->group->find($request->group_id)
        ]]);
    }

    public function edit(Requestt $request){
       // dd($request->group_id);
        $group = $this->group->find($request->group_id);
       // dd($group);
       return $this->response->setView("web.group.update")->respond(["data"=>[
           'group'=>$group
        ]]);
    }
    public function editMyGroup(Requestt $request){

        $modelWithItems = DB::table('shopes')
            ->select('*')
            ->groupBy('mobile')
            ->get();

        return $this->response->setView("web.group.edit_my_group")->respond(["data"=>[
            'users'=>$this->user->where('user_type',2)->get(),
            'shopes'=>$modelWithItems,
            'group'=>$this->group->find($request->edit_group_id)
        ]]);
    }


    public function update(Requestt $request)
    {
        $group = $this->group->find($request->group_id);
        $group->name = $request->group;
        $group->save();
        return Redirect::back();
    }
    public function delete(Requestt $request)
    {
        $group = $this->group->find($request->group_id);
        $group->is_deleted = 1;
        $group->save();
        return $this->listingPage();
    }
    public function autocomplete(Requestt $request){
        $term = $request->itemId;

        $array = array();

        $queries = DB::table('shopes')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->orWhere('person_name', 'LIKE', '%'.$term.'%')
            ->orWhere('mobile', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {

            $array[] = [ 'id' => $query->id, 'value' => $query->name.' '.$query->mobile ];
        }

        return json_encode($array);
    }

    public function addShopIntoGroup(Requestt $request){

        $groupDetail = new GroupDetail();
        $records=[
                    'group_id' => $request->groupId,
                    'shop_id' =>  $request->shopid,
                ];
        $groupDetail->insert($records);
        return json_encode(['res'=>'yes']);
    }

    public  function deleteRecordFromDetail(Requestt $request){
        $groupDetail = new GroupDetail();

        $groupDetail = $groupDetail->find($request->id);

        $groupDetail->delete();

        return json_encode(['res'=>'yes']);
    }
    public function getOrder(Requestt $request){

        return $this->response->setView("web.order.order")->respond(["data"=>[
            'companies'=>$this->company ->where('parent_category',0)->get(),
            'shopId'=>$request->shop_id,
            'groupId'=>$request->group_id,
        ]]);
    }

    public function getCompaniesList(Requestt $request){
        $companies = $this->company ->where('parent_category',0)->get();
        $final = [];
        foreach($companies as $company){
            $final[] = ['id'=>$company->id,'name'=>$company->name];
        }
        return json_encode($final);
    }

}