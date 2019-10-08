<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/9/2017
 * Time: 11:15 AM
 */

namespace App\QueryBuilder;

use Illuminate\Support\Facades\DB;

class QueryBuilder
{
    protected $table;
    public function __construct(){

    }
    public function first(array $where =[])
    {
        $result = DB::table($this->table)->where($where)->first();
        return $result;
    }
    public function all(){
        return Db::table($this->table)->get();
    }
    public function findByEmail($email)
    {
        return $this->first(['email'=>$email]);
    }

    public function insert($record){

        return DB::table($this->table)->insertGetId($record);
    }
    public function delete(array $condition){
        return DB::table($this->table)->where($condition)->delete();
    }

    public function update(array $conditions,array $record){
      return $this->updateWhere($conditions,$record);
    }

    public function getWhere(array $condition){
        return DB::table($this->table)->where($condition)->get();
    }
    public function insertMultiple(array $records, $table = null)
    {
        $table = ($table != null)?$table:$this->table;
        return DB::table($table)->insert($records);
    }
    public function getByToken(array $condition){
        return DB::table($this->table)->where($condition)->first();
    }

    public function updateWhere($conditions,$record){
        $query = DB::table($this->table);
        foreach($conditions as $column=>$value){
            $query = $query->where($column,$value);
        }
       return  $query->update($record);
    }

    public function setTable($table){
        $this->table = $table;
    }
    public function getTable(){
        return $this->table;
    }
}