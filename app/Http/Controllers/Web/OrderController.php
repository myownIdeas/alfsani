<?php
namespace App\Http\Controllers\Web;

use App\CompanyModel;
use App\Http\Controllers\Controller;

use App\Http\Response\Response\WebResponse;
use App\Order;
use App\Company;
use App\OrderDetail;
use App\Stock;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class OrderController  extends Controller
{
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
    }
    public function orderListing(Request $request){
       $userId = $request->session()->get('user')->id;
        if($userId == 1){
            $order =  Order::all();
        }else{
            $order =  Order::where('agent_id',$userId)->get();
        }


        return $this->response->setView("web.order.listing")->respond(["data"=>[
                'orders'=>$order
        ]]);
    }

    public function orderDelete($orderId){
        Order::find(1)->delete();
        OrderDetail::where('order_id',$orderId)->delete();
        return Redirect::back();
    }
    public function orderDetail($orderId){
        $orderDetail = OrderDetail::where('order_id',$orderId)->get();
        $order = Order::where('id',$orderId)->first();

        return $this->response->setView("web.order.detail")->respond(["data"=>[
            'orderDetail'=>$orderDetail,
            'order'=>$order
        ]]);
    }

    public function updateOrder($orderId){
        return $this->response->setView("web.order.update")->respond(["data"=>[
                'companies'=>Company::where('parent_category',0)->get(),
                'order'=>Order::where('id',$orderId)->first(),
                'orderDetail'=>OrderDetail::where('order_id',$orderId)->groupBy('third_model')->get(),
        ]]);
    }

    public static function getCompanyDetail($id){
       return Company::where('parent_category',$id)->get();
    }

    public static function getItems($thirdModel,$orderId) {
               $details = OrderDetail::where('order_id',$orderId)->where('third_model',$thirdModel)->get();

                $itemsIds = [];
                foreach($details as $item){
                    $itemsIds[] = $item->item_id;
                }

               return CompanyModel::whereIn('id',$itemsIds)->get();

    }

    public function deleteItemFromOrder($id){

        OrderDetail::find($id)->delete();
        return Redirect::back();
    }

    public function addItemIntoOrder(Request $request){

        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $request->orderId;
        $orderDetail->company_id = $request->companyId;
        $orderDetail->first_model = $request->firstModel;
        $orderDetail->second_model = $request->secondModel;
        $orderDetail->third_model = $request->thirdModel;
        $orderDetail->item_id = $request->itemId;
        $orderDetail->quantity = $request->quantity;
        $orderDetail->set_pack = $request->set_pack;
        $orderDetail->line_price = $request->linePrice;

        $orderDetail->save();
        $order = Order::where('id',$request->orderId)->first();
        $order->total_price = $order->total_price + ($request->quantity * $request->linePrice);
        $order->save();
        return json_encode(['res'=>'yes']);
    }

    public function finishOrder($orderId){
        $order = Order::find($orderId)->first();
        $orderDetails = OrderDetail::find($orderId)->get();
       // dd($orderDetails);
        foreach($orderDetails as $detail){
           $stock =  Stock::where('item_id',$detail->item_id)->first();
           dd($stock);
            $stock->qty = ($stock->qty - $detail->quantity);
            $stock->save();
        }
        $order->status = 2;
        $order->save();
        return Redirect::back();
    }

    public function placeOrder(Request  $request){
            $user = $request->session()->get('user');
            $order = new Order();

            $order->shop_id = $request->shop_id;
            $order->group_id = $request->group_id;
            $order->agent_id = $user->id;
            $order->delivery_agent = 0;
            $order->total_price = $request->final_amount;
            $order->save();
            $orderId = $order->id;
            $final=[];
        //dd($request->all());
        $totalPrice = 0;
            foreach($request->itemId as $key=>$order){

                $findKey= key($order);
                $totalPrice = $totalPrice + $request->linePrice[$findKey];
               // dd($findKey);
                $final[] = [
                    'order_id'=>$orderId,
                    'company_id'=>$request->company_id[$findKey],
                    'first_model'=>$request->model_id[$findKey],
                    'second_model'=>$request->second_model[$findKey],
                    'third_model'=>$request->third_model[$findKey],
                    'item_id'=>$order[$findKey],
                    'quantity'=>$request->quantity[$findKey],
                    'set_pack'=>$request->item_set[$findKey],
                    'line_price'=>$request->linePrice[$key],
                ];
            }

        DB::table('order_detail')->insert($final);


        return Redirect::back();

    }

}
