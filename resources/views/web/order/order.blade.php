@extends('include.layout')
@section('content')
<section class="sub-header">
    <div class="container-fluid">
        <div class="subheader-main">
            <h2>Group</h2>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="content-box">
        <h2 class="float-right">Price: <span id="top_price">0.00</span></h2>
        <h4 class="h4">Make Order</h4>
        <hr>
        <form action="{{URL::to('place_order')}}" method="post">
            <input type="hidden" name="shop_id" value="{{$response['data']['shopId']}}">
            <input type="hidden" name="group_id" value="{{$response['data']['groupId']}}">
            <input type="hidden" id="final_amount" name="final_amount" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Bilty No</label>
                        <input type="text" name="bilty_no" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Select Company</label>
                        <select name="company_id[]" onchange="getSubCategories(this.value,'sub_model0')" class="form-control">
                            <option value="0">Please Select Parent Category</option>
                            @foreach($response['data']['companies'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Select First Model</label>
                        <select name="model_id[]" onchange="getSubCategories(this.value,'sec_model0')" id="sub_model0" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Select Second Model</label>
                        <select name="second_model[]" onchange="getSubCategories(this.value,'third_model0')" id="sec_model0" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Select Third Model</label>
                        <select name="third_model[]" onchange="getSubCategories(this.value,'forth_model0')" id="third_model0" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Search Item</label>
                        <input type="text"   class="form-control srchItem" onkeyup="searchItem(this.value,0)">
                        <div class="form-group-dd">
                            <ul class="shop_select" id="appendItemsHere0"></ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="more_order_list"></div>
                    <div class="" id="add_more_itmes0"></div>
                </div>
                <div class="col-md-12 text-right">
                    <a href="javascript:void(0);" onclick="appendMoreOrders()" class="btn btn-dark mr-2">Add More Order</a>
                    <button type="submit" class="btn btn-primary">Add Order</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection