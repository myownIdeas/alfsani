<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Repo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makeRepo {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public $name='';
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name =$this->argument('name');
        $queryBuilder = '<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 9/26/2017
 * Time: 5:18 PM
 */

namespace App\QueryBuilder\\'.$name.'QueryBuilder;

use App\QueryBuilder\QueryBuilder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
class '.$name.'QueryBuilder extends QueryBuilder
{
    public $table ="";

    public function __construct()
    {
        $this->table ='."'".lcfirst($name)."s'".';
    }
    public function serverSideDataTable(){

        $records = DB::table($this->table)
            ->select("id","name","address","phone","official_email","views","is_active")
            ->get();
        return Datatables::of($records)

            ->addColumn("action", function ($records) {
                return '."'".'<a href="#edit-'."'".'.$records->id.'."'".' class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="#edit-'."'".'.$records->id.'."'".' class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Delete</a>'."'".';

            }
            )
//            ->editColumn("id", "ID: {{$id}}")
            //->removeColumn("password")
            ->make(true);
    }

}';
        $repository = '<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 9/26/2017
 * Time: 3:12 PM
 */

namespace App\Repositories\Repositories\\'.$name.';

use App\Models\\'.$name.';
use App\QueryBuilder\\'.$name.'QueryBuilder\\'.$name.'QueryBuilder;
use App\Repositories\Interfaces\\'.$name.'RepoInterface;
use App\Repositories\SqlRepo;
class '.$name.'Repo extends SqlRepo implements '.$name.'RepoInterface
{

    public $'.lcfirst($name).'QueryBuilder,$modal= \'\';

    public function __construct(){
      $this->modal = new '.$name.';
      $this->'.lcfirst($name).'QueryBuilder = new '.$name.'QueryBuilder();
    }
    public function serverSideDataTable(){
        return $this->'.lcfirst($name).'QueryBuilder->serverSideDataTable();

    }
    public function store($'.$name.')
    {
      return $this->'.lcfirst($name).'QueryBuilder->insert($this->mapOnTable($'.$name.'));
    }
    public function get'.ucfirst($name).'ById($Id){
        return $this->map($this->'.$name.'QueryBuilder->first(["id"=>$Id]));
    }
    public function changeStatus($params){
        $'.$name.' = $this->get'.ucfirst($name).'ById($params["Id"]);
        $'.$name.'->isActive = $params["status"];
        return $this->'.lcfirst($name).'QueryBuilder->updateWhere(["id"=>$'.$name.'->id],$this->mapOnTableForAdmin($'.$name.'));
    }
    public function update('.$name.' $'.$name.'){
        $this->'.lcfirst($name).'QueryBuilder->updateWhere(["id"=>$'.$name.'->id],$this->mapOnTable($'.$name.'));
         return $this->get'.ucfirst($name).'ById($'.$name.'->id);
    }
//  public function getFeature'.$name.'(){
//      $final'.$name.' = [];
//      $'.$name.'s = $this->'.lcfirst($name).'QueryBuilder->getFeature'.$name.'();
//      foreach($'.$name.'s as $'.$name.'){
//          $final'.$name.'[] = $this->map($'.$name.');
//      }
//      return $final'.$name.';
//  }
  public function all(){
        $finalRecords = [];
        $'.lcfirst($name).'s =$this->'.$name.'QueryBuilder->all();
        foreach($'.lcfirst($name).'s as $'.$name.'){
            $finalRecords[] = $this->map($'.$name.');
        }
      return $finalRecords;
    }

    public function delete($'.$name.'Id){
      return $this->'.lcfirst($name).'QueryBuilder->delete(["id"=>$'.$name.'Id]);
    }

    public function requestMapper($'.$name.'){
      unset($'.$name.'["token"]);
      return $'.$name.';
    }

    public function mapOnTable('.$name.' $'.$name.'){
        return [

        ];
    }
    public function mapOnTableForAdmin('.$name.' $'.$name.'){
        return [

        ];
    }

    public function map($result){
       $'.$name.' = clone($this->modal);


        return $'.$name.';
    }
}';

        $interface = '<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/9/2017
 * Time: 9:40 AM
 */

namespace App\Repositories\Interfaces;


Interface '.$name.'RepoInterface
{

}';
        $controller = '<?php

namespace App\Http\Controllers\Api;
use App\Http\Response\Response\ApiResponse;
use App\Http\Controllers\Api\ApiController;

use App\Http\Request\Requests\\'.ucfirst($name).'\Add'.ucfirst($name).'Request;
use App\Http\Request\Requests\\'.ucfirst($name).'\Delete'.ucfirst($name).'Request;
use App\Http\Request\Requests\\'.ucfirst($name).'\GetAll'.ucfirst($name).'Request;
use App\Http\Request\Requests\\'.ucfirst($name).'\Update'.ucfirst($name).'Request;
use App\Repositories\Repositories\\' . ucfirst($name). '\\'.ucfirst($name).'Repo;


class '.ucfirst($name).'Controller  extends ApiController
{
    public $response;
    public $request =\'\';
    public $'.lcfirst($name).' =\'\';
    public function __construct(ApiResponse $apiResponse)
    {

        $this->response = $apiResponse;
        $this->'.lcfirst($name).' = new '.$name.'Repo();
    }
    public function index(Add'.ucfirst($name).'Request $add'.ucfirst($name).'Request){
        return $this->response->response(["data"=>[
            '."'".lcfirst($name)."'".'=>$this->'.lcfirst($name).'->store($this->request),
        ]]);
    }
    public function store(Add'.ucfirst($name).'Request $add'.ucfirst($name).'Request){
        return $this->response->response(["data"=>[
            '."'".lcfirst($name)."'".'=>$this->'.lcfirst($name).'->store($this->request),
        ]]);
    }
    public function all(GetAll'.ucfirst($name).'Request $getAll'.ucfirst($name).'sRequest){
        return $this->response->response(["data"=>[
            '."'".lcfirst($name)."'".'=>$this->'.lcfirst($name).'->store($this->request),
        ]]);
    }

    public function delete(Delete'.ucfirst($name).'Request $delete'.ucfirst($name).'Request){
        return $this->response->response(["data"=>[
            '."'".lcfirst($name)."'".'=>$this->'.lcfirst($name).'->store($this->request),
        ]]);
    }
}
';
        $webController = '<?php
namespace App\Http\Controllers\Web;

use App\Http\Response\Response\WebResponse;
use App\Http\Controllers\Controller;
use App\Http\Request\Requests\\'.ucfirst($name).'\Edit'.ucfirst($name).'Request;
use App\Http\Request\Requests\\'.ucfirst($name).'\Add'.ucfirst($name).'Request;
use App\Http\Request\Requests\\'.ucfirst($name).'\Delete'.ucfirst($name).'Request;
use App\Http\Request\Requests\\'.ucfirst($name).'\GetAll'.ucfirst($name).'Request;
use App\Http\Request\Requests\\'.ucfirst($name).'\Update'.ucfirst($name).'Request;
use App\Repositories\Repositories\\' . ucfirst($name) . '\\'.ucfirst($name).'Repo;


class '.ucfirst($name).'Controller  extends Controller
{
    public $response;
    public $request ="";
    public $'.lcfirst($name).' ="";
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
        $this->'.lcfirst($name).' = new '.$name.'Repo();
    }
    public function index()
    {
        return  $this->'.lcfirst($name).'->serverSideDataTable();

    }
    public function listingPage()
    {
        return $this->response->setView("'.lcfirst($name).'.index")->respond(["data"=>[

        ]]);
    }
    public function edit(Edit'.ucfirst($name).'Request $edit'.ucfirst($name).'Request){
       return $this->response->setView("'.$name.'.update")->respond(["data"=>[
            "'.$name.'"=>$this->'.lcfirst($name).'->get'.ucfirst($name).'ById($edit'.ucfirst($name).'Request->get("Id"))
        ]]);
    }
    public function create(Add'.ucfirst($name).'Request $add'.ucfirst($name).'Request)
    {
        return $this->response->setView("'.$name.'.created")->respond(["data"=>[
        ]]);
    }
    public function changeStatus(Update'.ucfirst($name).'Request $update'.ucfirst($name).'StatusRequest){
        $this->'.lcfirst($name).'->changeStatus($update'.ucfirst($name).'StatusRequest->all());
        return redirect()->back();
    }
    public function update(Update'.ucfirst($name).'Request $update'.ucfirst($name).'Request)
    {
         $'.$name.' = $this->'.lcfirst($name).'->update($update'.ucfirst($name).'Request->get'.ucfirst($name).'Model());
        return  redirect()->back();
    }
    public function store(Add'.ucfirst($name).'Request $add'.ucfirst($name).'Request){
        $'.$name.' = $add'.ucfirst($name).'Request->get'.$name.'Model();
        $'.$name.'->id = $this->'.lcfirst($name).'->store($'.$name.');
       $add'.ucfirst($name).'Request->uploadImages($'.$name.');
        return $this->response->setView("'.$name.'.created")->respond(["data"=>[
            "'.$name.'"=>$'.$name.'
        ]]);
    }
    public function all(GetAll'.ucfirst($name).'Request $getAll'.ucfirst($name).'Request){

        return $this->response->setView("'.$name.'.index")->respond(["data"=>[
            "'.lcfirst($name).'"=>$this->'.lcfirst($name).'->store($this->request),
        ]]);
    }

    public function delete(Delete'.ucfirst($name).'Request $delete'.ucfirst($name).'Request)
    {
        $'.$name.' = $this->'.lcfirst($name).'->delete($delete'.ucfirst($name).'Request->get("Id"));
        return  redirect()->back();
    }
}
';

        $coreModel ='<?php

namespace App;

use Illuminate\\Notifications\\Notifiable;
use Illuminate\\Foundation\\Auth\\User as Authenticatable;

class '.ucfirst($name).' extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", "email", "password",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "password", "remember_token",
    ];
}
';
        $model = '<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/8/2017
 * Time: 4:54 PM
 */

namespace App\Models;


class '.$name.'
{
    public $id="";


    public $createdAt = "0000-00-00 00:00:00";
    public $updatedAt = "0000-00-00 00:00:00";
    public $currentTime ="";

    public function __construct()
    {
        $this->createdAt = date("Y-m-d h:i:s");
        $this->updatedAt = $this->createdAt;
        $this->currentTime =date("h:i A", strtotime(date("Y-m-d h:i:s")));
    }
}';




        $validator = '<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 9:32 PM
 */

namespace App\Validator\ '.$name.'Validator;


use App\Validator\AppValidator;

class '.$name.'Validator extends AppValidator
{
    public function __construct($request){
        parent::__construct($request);
    }
    public function CustomValidationMessages(){
        return [
            //
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}';



        if(!file_exists(base_path('app/QueryBuilder').'/'.$name.'QueryBuilder')){
             mkdir(base_path('app/QueryBuilder').'/'.$name.'QueryBuilder');
            file_put_contents(base_path('app/QueryBuilder/'.$name.'QueryBuilder').'/'.$name.'QueryBuilder'.'.php',$queryBuilder);
         }
        if(!file_exists(base_path('app/CoreModel').'/'.ucfirst($name))){
            file_put_contents(base_path('app/CoreModel').'/'.ucfirst($name).'.php',$coreModel);
        }

        if(!file_exists(base_path('app/Repositories/Repositories').'/'.$name)){
            mkdir(base_path('app/Repositories/Repositories').'/'.$name);
            file_put_contents(base_path('app/Repositories/Repositories/'.$name).'/'.$name.'Repo'.'.php',$repository);
            file_put_contents(base_path('app/Repositories/Interfaces').'/'.$name.'RepoInterface'.'.php',$interface);
         }
        $src = base_path('resources/views/news');
        $dst = base_path('resources/views/'.$name);
        /* Returns false if src doesn't exist */
        $dir = @opendir($src);
        /* Make destination directory. False on failure */
        if (!file_exists($dst)) @mkdir($dst);

        /* Recursively copy */
        while (false !== ($file = readdir($dir))) {

            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) beliefmedia_recurse_copy($src . '/' . $file, $dst . '/' . $file);
                else copy($src . '/' . $file, $dst . '/' . $file);
            }

        }
        closedir($dir);


        if(!file_exists(base_path('app/Http/Controllers/Api').'/'.ucfirst($name).'Controller.php')){
            file_put_contents(base_path('app/Http/Controllers/Api').'/'.ucfirst($name).'Controller'.'.php',$controller);

        }
        if(!file_exists(base_path('app/Http/Controllers/Web').'/'.ucfirst($name).'Controller.php')){
           file_put_contents(base_path('app/Http/Controllers/Web').'/'.ucfirst($name).'Controller'.'.php',$webController);
        }

        if(!file_exists(base_path('app/Models').'/'.$name.'php')){
            file_put_contents(base_path('app/Models').'/'.$name.'.php',$model);
        }
        if(!file_exists(base_path('app/Http/Request/Requests/'.$name))){
            mkdir(base_path('app/Http/Request/Requests/'.ucfirst($name)));
            for($i=0; $i<5;$i++){
                $names = [0=>'Add',1=>'Update',2=>'GetAll',3=>'Delete',4=>'Edit',5=>'UpdateStatus'];
                file_put_contents(base_path('app/Http/Request/Requests/'.$name).'/'.$names[$i].ucfirst($name).'Request'.'.php',
                    '<?php
/**
* Created by PhpStorm.
* User: Waqas
* Date: 12/12/2016
* Time: 7:00 PM
*/

namespace App\Http\Request\Requests\\'.$name.';
use App\Http\Request\Interfaces\RequestInterface;
use App\Http\Request\Request;
use App\Models\\'.$name.';
use App\Transformer\Request\AutoTransformer;
use App\Validator\\'.$name.'Validator\\'.$names[$i].ucfirst($name).'Validator;

class '.$names[$i].ucfirst($name).'Request extends Request implements RequestInterface
{
public $validator = null;

public function __construct()
{
    parent::__construct(new AutoTransformer($this->allOriginal(),$Transform = true));
    $this->validator = new '.$names[$i].ucfirst($name).'Validator($this);
}

public function validate()
{
    return $this->validator->validate();
}
public function authorize()
{
    return true;
}
public function get'.ucfirst($name).'Model()
{
    $'.$name.' = new '.$name.'();
    return true;
}

}');
            }
        }
        if(!file_exists(base_path('app/Validator').'/'.ucfirst($name).'Validator')){
            mkdir(base_path('app/Validator').'/'.ucfirst($name).'Validator');
            file_put_contents(base_path('app/Validator/'.$name.'Validator').'/'.$name.'Validator.php',$validator);
            for($i=0; $i<5;$i++) {
                $names = [0=>'Add',1=>'Update',2=>'GetAll',3=>'Delete',4=>'Edit',5=>'UpdateStatus'];
                file_put_contents(base_path('app/Validator/'.$name.'Validator') . '/' .$names[$i].ucfirst($name) .'Validator.php',
                    '<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/12/2016
 * Time: 9:28 PM
 */

namespace App\Validator\\'.$name.'Validator;


class '.$names[$i].ucfirst($name).'Validator extends '.$name.'Validator
{
    public function __construct($request)
    {
        parent::__construct($request);
    }
    public function CustomValidationMessages(){
        return [

        ];
    }
    public function rules()
    {
        return [
            "email"=>"required",
        ];
    }
}');
            }
         }
        echo 'Created Successfully Thanks';
    }
}
