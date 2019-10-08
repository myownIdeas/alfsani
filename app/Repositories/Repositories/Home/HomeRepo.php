<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 9/26/2017
 * Time: 3:12 PM
 */

namespace App\Repositories\Repositories\Home;

use App\Models\Home;
use App\QueryBuilder\HomeQueryBuilder\HomeQueryBuilder;
use App\Repositories\Interfaces\HomeRepoInterface;
use App\Repositories\SqlRepo;
class HomeRepo extends SqlRepo implements HomeRepoInterface
{

    public $homeQueryBuilder,$modal= '';

    public function __construct(){
      $this->modal = new Home;
      $this->homeQueryBuilder = new HomeQueryBuilder();
    }
    public function serverSideDataTable(){
        return $this->homeQueryBuilder->serverSideDataTable();

    }
    public function store($Home)
    {
      return $this->homeQueryBuilder->insert($this->mapOnTable($Home));
    }
    public function getHomeById($Id){
        return $this->map($this->HomeQueryBuilder->first(["id"=>$Id]));
    }
    public function changeStatus($params){
        $Home = $this->getHomeById($params["Id"]);
        $Home->isActive = $params["status"];
        return $this->homeQueryBuilder->updateWhere(["id"=>$Home->id],$this->mapOnTableForAdmin($Home));
    }
    public function update(Home $Home){
        $this->homeQueryBuilder->updateWhere(["id"=>$Home->id],$this->mapOnTable($Home));
         return $this->getHomeById($Home->id);
    }
//  public function getFeatureHome(){
//      $finalHome = [];
//      $Homes = $this->homeQueryBuilder->getFeatureHome();
//      foreach($Homes as $Home){
//          $finalHome[] = $this->map($Home);
//      }
//      return $finalHome;
//  }
  public function all(){
        $finalRecords = [];
        $homes =$this->HomeQueryBuilder->all();
        foreach($homes as $Home){
            $finalRecords[] = $this->map($Home);
        }
      return $finalRecords;
    }

    public function delete($HomeId){
      return $this->homeQueryBuilder->delete(["id"=>$HomeId]);
    }

    public function requestMapper($Home){
      unset($Home["token"]);
      return $Home;
    }

    public function mapOnTable(Home $Home){
        return [

        ];
    }
    public function mapOnTableForAdmin(Home $Home){
        return [

        ];
    }

    public function map($result){
       $Home = clone($this->modal);


        return $Home;
    }
}