<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 9/26/2017
 * Time: 5:18 PM
 */

namespace App\QueryBuilder\HomeQueryBuilder;

use App\QueryBuilder\QueryBuilder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
class HomeQueryBuilder extends QueryBuilder
{
    public $table ="";

    public function __construct()
    {
        $this->table ='homes';
    }
    public function serverSideDataTable(){

        $records = DB::table($this->table)
            ->select("id","name","address","phone","official_email","views","is_active")
            ->get();
        return Datatables::of($records)

            ->addColumn("action", function ($records) {
                return '<a href="#edit-'.$records->id.' class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="#edit-'.$records->id.' class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Delete</a>';

            }
            )
//            ->editColumn("id", "ID: {{$id}}")
            //->removeColumn("password")
            ->make(true);
    }

}