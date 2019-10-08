<?php
namespace App\Http\Controllers\Web;

use App\City;
use App\Http\Request\Request;
use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;
use App\Http\Request\Requests\Home\EditHomeRequest;
use App\User;
use Illuminate\Http\Request as Requestt;
use App\Repositories\Repositories\Home\HomeRepo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class UserController  extends Controller
{
    public $response;
    public $request ="";
    public $user ="";
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
        $this->user = new User();
    }
    public function index()
    {
        return $this->response->setView("web.user.create")->respond(["data"=>[

        ]]);
    }
    public function listingPage()
    {

        return $this->response->setView("web.user.listing")->respond(["data"=>[
            'users'=>$this->user->all()->where('is_deleted',0)
        ]]);
    }
    public function edit(Requestt $request){
        $user = $this->user->find($request->user_id);
       return $this->response->setView("web.user.update")->respond(["data"=>[
           'user'=>$user
        ]]);
    }
    public function create(Requestt $request)
    {
         $user = new User();

         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = md5($request->password);
         $user->is_deleted = 0;
         $user->user_type = 2;
         $user->save();

         return $this->index();
    }

    public function update(Requestt $request)
    {
        $user = $this->user->find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = ($request->password !=null)?md5($request->password):$user->password;
        $user->save();
        return Redirect::back();
    }
    public function delete(Requestt $request)
    {
        $user = $this->user->find($request->user_id);
        $user->is_deleted = 1;
        $user->save();
        return $this->listingPage();
    }

    public function deleteUserListing(Requestt $request){
        return $this->response->setView("web.user.deleted_user_listing")->respond(["data"=>[
            'users'=>$this->user->all()->where('is_deleted',1)
        ]]);
    }
    public function active_delete_user(Requestt $request){
        $user = $this->user->find($request->user_id);
        $user->is_deleted = 0;
        $user->save();
        return $this->listingPage();
    }
}
