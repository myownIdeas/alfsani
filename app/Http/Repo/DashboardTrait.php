<?php


namespace App\Http\Repo;


use Illuminate\Support\Facades\DB;

trait DashboardTrait
{
    public function dashboardRecords(){
        return [
            [
            'Today Orders'=>$this->todayOrders(),
            'Today Delivery'=>$this->todayDelivery(),
            'Total Amount'=>$this->totalAmount(),
            'Today Amount'=>$this->todayAmount(),
          ],
            [
            'Total Orders'=>$this->totalOrder(),
                ]
        ];
    }

    public function todayOrders(){
        $now = date('Y/d/m');

        return DB::table('orders')
                        ->where('order_date','>=',$now)
                        ->where('order_date','<=',$now)->count();
    }
    public function totalOrder(){
        return DB::table('orders')
            ->count();
    }
    public function todayDelivery(){
        $now = date('Y/d/m');

        return DB::table('orders')
            ->where('status',2)
            ->where('order_date','>=',$now)
            ->where('order_date','<=',$now)->count();
    }
    public function totalAmount(){


        return DB::table('orders')
            ->sum('after_discount');
    }
    public function todayAmount(){
        $now = date('Y/d/m');

        return DB::table('orders')
            ->where('order_date','>=',$now)
            ->where('order_date','<=',$now)->sum('after_discount');
    }
}
