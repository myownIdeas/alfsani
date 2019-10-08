@extends('include.layout')
@section('content')
<section class="sub-header">
    <div class="container-fluid">
        <div class="subheader-main">
            <h2>Dashboard</h2>
            <div class="breadcrumb-link ml-3">
                <a href="#"><i class="far fa-envelope"></i> Add City</a>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="content-box">
        <div style="margin-left:45%">
            <b>Price</b>
            <h1 id="top_price">0.00</h1>

        </div>

        <form action="{{URL::to('place_order')}}" method="post">
            <input type="hidden" name="shop_id" value="{{$response['data']['shopId']}}">
            <input type="hidden" name="group_id" value="{{$response['data']['groupId']}}">
            <input type="hidden" id="final_amount" name="final_amount" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Bilty No</label>
                <input type="text" name="bilty_no" class="form-control">
            </div>
            <div id="more_order_list">


            <div class="form-group">
                <label for="">Select Company</label>

                <select name="company_id[]" onchange="getSubCategories(this.value,'sub_model0')" class="form-control">
                    <option value="0">Please Select Parent Category</option>
                    @foreach($response['data']['companies'] as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row col-12">

                <label for="">Select First Model</label>
                <select name="model_id[]" onchange="getSubCategories(this.value,'sec_model0')" id="sub_model0" class="form-control">
                </select>
            </div>
            <div class="row col-12">

                <label for="">Select Second Model</label>
                <select name="second_model[]" onchange="getSubCategories(this.value,'third_model0')" id="sec_model0" class="form-control">
                </select>
            </div>
            <div class="row col-12">
                <label for="">Select Third Model</label>
                <select name="third_model[]" onchange="getSubCategories(this.value,'forth_model0')" id="third_model0" class="form-control">
                </select>
            </div>
            <div class="col-12">
                <label for="">Search Item</label>
                <input type="text"   class="form-control srchItem" onkeyup="searchItem(this.value,0)">
                <div>
                    <ul id="appendItemsHere0">

                    </ul>
                </div>
            </div>
            <div class="row col-12" id="add_more_itmes0">

            </div>
<br />
<br />

            </div>
            <div class="d-flex justify-content-between flex-wrap">
                <a href="javascript:void(0);" onclick="appendMoreOrders()" class="btn btn-info">Add More Order </a>
                <button type="submit" class="btn btn-primary">Add Order</button>
            </div>
        </form>

    </div>

</div>
@endsection