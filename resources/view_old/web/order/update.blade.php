@extends('include.layout')
@section('content')
<section class="sub-header">
    <div class="container-fluid">
        <div class="subheader-main">
            <h2>Dashboard</h2>
            <div class="breadcrumb-link ml-3">
                <a href="#"><i class="far fa-envelope"></i> Update Order</a>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="content-box">
        <div style="margin-left:45%">
            <b>Price</b>
            <h1 id="top_price">{{$response['data']['order']->total_price}}</h1>

        </div>

        <form action="{{URL::to('place_order')}}" method="post">

            <input type="hidden" id="final_amount" name="final_amount" >
            <input type="hidden" id="orderId" value="{{$response['data']['order']->id}}" >
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Bilty No</label>
                <input type="text" name="bilty_no" class="form-control">
            </div>
            <div id="more_order_list">

            @foreach($response['data']['orderDetail'] as $key=>$detail)
                <div class="form-group">
                    <label for="">Select Company</label>

                    <select name="company_id[]" onchange="getSubCategories(this.value,'sub_model{{$key}}')" id="company_id{{$key}}" class="form-control">
                        <option value="0">Please Select Parent Category</option>
                        @foreach($response['data']['companies'] as $category)
                            <option value="{{$category->id}}" @if($category->id == $detail->company_id) selected @endif>{{$category->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="row col-12">

                    <label for="">Select First Model</label>
                    <select name="model_id[]" onchange="getSubCategories(this.value,'sec_model{{$key}}')" id="sub_model{{$key}}" class="form-control">
                        <option value="0">Please Select Parent Category</option>
                        @foreach(\App\Http\Controllers\Web\OrderController::getCompanyDetail($detail->company_id) as $first)
                            <option value="{{$first->id}}" @if($first->id == $detail->first_model)selected @endif>{{$first->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row col-12">

                    <label for="">Select Second Model</label>
                    <select name="second_model[]" onchange="getSubCategories(this.value,'third_model{{$key}}')" id="sec_model{{$key}}" class="form-control">
                        <option value="0">Please Select Parent Category</option>
                        @foreach( \App\Http\Controllers\Web\OrderController::getCompanyDetail($detail->first_model) as $second)
                            <option value="{{$second->id}}" @if($second->id == $detail->second_model)selected @endif>{{$second->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row col-12">

                    <label for="">Select Third Model</label>
                    <select name="third_model[]" onchange="getSubCategories(this.value,'forth_model{{$key}}')" id="third_model{{$key}}" class="form-control">
                        <option value="0">Please Select Parent Category</option>
                        @foreach(\App\Http\Controllers\Web\OrderController::getCompanyDetail($detail->second_model) as $third)
                            <option value="{{$third->id}}" @if($third->id == $detail->third_model)selected @endif>{{$third->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="">Search Item</label>
                    <input type="text"   class="form-control srchItem" onkeyup="searchItem(this.value,'{{$key}}','update')">
                    <div>
                        <br />
                        <ul id="appendItemsHere{{$key}}">

                        </ul>
                        @foreach(\App\Http\Controllers\Web\OrderController::getItems($detail->third_model,$detail->order_id) as $item)
                            <li>{{$item->item}} <a href="{{URL::to('delete_item_from_order/'.$detail->id)}}" onclick="return confirm('Are you sure you want to delete this order?');" > Delete </a></li>
                        @endforeach
                    </div>
                </div>
                <div class="row col-12" id="add_more_itmes{{$key}}">


            </div>
                @endforeach
<br />
<br />

            </div>
            <div class="d-flex justify-content-between flex-wrap">
                <a href="javascript:void(0);" onclick="appendMoreOrders()" class="btn btn-info">Add More Order </a>
                <button type="submit" class="btn btn-primary">Update Order</button>
            </div>
        </form>

    </div>

</div>
@endsection