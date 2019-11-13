@extends('include.layout')
@section('content')
<section class="sub-header">
    <div class="container-fluid">
        <div class="subheader-main">
            <h2>Order</h2>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="content-box">
        <h2 class="float-right">Price: <span id="top_price">{{$response['data']['order']->total_price}}</span></h2>
        <h4 class="h4">Update Order</h4>
        <hr>
        <form action="{{URL::to('place_order')}}" method="post">

            <input type="hidden" id="final_amount" name="final_amount" >
            <input type="hidden" id="orderId" value="{{$response['data']['order']->id}}" >
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Bilty No</label>
                        <input type="text"  name="bilty_no" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Cargo</label>
                        <input type="text"  name="cargo" class="form-control">
                    </div>
                </div>
                @foreach($response['data']['orderDetail'] as $key=>$detail)
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Select Company</label>
                        <select name="company_id[]" onchange="getSubCategories(this.value,'sub_model{{$key}}')" id="company_id{{$key}}" class="form-control">
                            <option value="0">Please Select Parent Category</option>
                            @foreach($response['data']['companies'] as $category)
                                <option value="{{$category->id}}" @if($category->id == $detail->company_id) selected @endif>{{$category->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Select First Model</label>
                        <select name="model_id[]" onchange="getSubCategories(this.value,'sec_model{{$key}}')" id="sub_model{{$key}}" class="form-control">
                            <option value="0">Please Select Parent Category</option>
                            @foreach(\App\Http\Controllers\Web\OrderController::getCompanyDetail($detail->company_id) as $first)
                                <option value="{{$first->id}}" @if($first->id == $detail->first_model)selected @endif>{{$first->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Select Second Model</label>
                        <select name="second_model[]" onchange="getSubCategories(this.value,'third_model{{$key}}')" id="sec_model{{$key}}" class="form-control">
                            <option value="0">Please Select Parent Category</option>
                            @foreach( \App\Http\Controllers\Web\OrderController::getCompanyDetail($detail->first_model) as $second)
                                <option value="{{$second->id}}" @if($second->id == $detail->second_model)selected @endif>{{$second->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Select Third Model</label>
                        <select name="third_model[]" onchange="getSubCategories(this.value,'forth_model{{$key}}')" id="third_model{{$key}}" class="form-control">
                        <option value="0">Please Select Parent Category</option>
                        @foreach(\App\Http\Controllers\Web\OrderController::getCompanyDetail($detail->second_model) as $third)
                        <option value="{{$third->id}}" @if($third->id == $detail->third_model)selected @endif>{{$third->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Search Item</label>
                        <input type="text"   class="form-control srchItem" onkeyup="searchItem(this.value,'{{$key}}','update')">
                        <div class="form-group-dd">
                            <ul id="appendItemsHere{{$key}}"></ul>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pb-2" id="add_more_itmes{{$key}}"></div>
                </div>
                <div class="col-md-12">
                    <div class="card-gray py-3 mb-3">
                        <div class="row">
                        @foreach(\App\Http\Controllers\Web\OrderController::getItems($detail->third_model,$detail->order_id) as $item)
                            <div class="col-sm-4">
                                <div class="more-shop my-2 bg-white">
                                    <h4 for="2">{{$item->item}}</h4>
                                    <a href="{{URL::to('delete_item_from_order/'.$detail->id)}}" onclick="return confirm('Are you sure you want to delete this order?');" class="btn btn-danger"> Delete </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                
                <div class="col-md-12">
                    <div id="more_order_list"></div>
                </div>
                <div class="col-md-12 text-right">
                    <a href="javascript:void(0);" onclick="updateMoreOrders()" class="btn btn-dark">Add More Order</a>
                {{-- <button type="submit" class="btn btn-primary">Update Order</button>--}}
                </div>
                <div class="col-md-6 col-lg-3"></div>
                <div class="col-md-6 col-lg-3"></div>
                <div class="col-md-6 col-lg-3"></div>
            </div>
        </form>

    </div>

</div>
@endsection