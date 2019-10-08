@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Dashboard</h2>
                <div class="breadcrumb-link ml-3">
                    <a href="#"><i class="far fa-envelope"></i> Update Stock</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        {{Form::open(array('url'=> 'insert/stock','method'=>'POST','enctype'=>"multipart/form-data"))}}
        <div class="card">
            <div class="card-header">ADD STOCKS</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Select User</label>
                            <select name="shop" id="" required class="form-control">
                                @foreach($response['data']['shoppes'] as $shop)
                                    <option value="{{$shop->id}}" @if($shop->id == $response['data']['stock']->shop_id) selected @endif>{{$shop->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Select Company</label>

                            <select name="company_id" onchange="getSubCategories(this.value,'sub_model0')" class="form-control">
                                <option value="0">Please Select Parent Category</option>
                                @foreach($response['data']['companies'] as $category)
                                    <option value="{{$category->id}}" @if($category->id == $response['data']['stock']->company_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Select First Model</label>
                            <select name="model_id[]" onchange="getSubCategories(this.value,'sec_model0')" id="sub_model0" class="form-control">
                                @foreach($response['data']['firstModel'] as $firstModel)
                                    <option value="{{$firstModel->id}}" @if($firstModel->id == $response['data']['stock']->first_model) selected @endif>{{$firstModel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group"> <label for="">Select Second Model</label>
                            <select name="second_model[]" onchange="getSubCategories(this.value,'third_model0')" id="sec_model0" class="form-control">
                                @foreach($response['data']['secondModel'] as $secondModel)
                                    <option value="{{$secondModel->id}}" @if($secondModel->id == $response['data']['stock']->second_model) selected @endif>{{$secondModel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">    <div class="form-group"> <label for="">Select Third Model</label>
                            <select name="third_model[]" onchange="getSubCategories(this.value,'forth_model0')" id="third_model0" class="form-control">
                                @foreach($response['data']['thirdModel'] as $thirdModel)
                                    <option value="{{$thirdModel->id}}" @if($thirdModel->id == $response['data']['stock']->third_model) selected @endif>{{$thirdModel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">    <div class="form-group">
                            <label for="">Search Item</label>
                            <input type="text" class="form-control srchItem" onkeyup="searchItem(this.value,0)">
                        </div>

                    </div>

                </div>
                <ul id="appendItemsHere0">

                </ul>
                <ul>
                    @foreach($response['data']['items'] as $item)
                    <li>{{$item}}</li>
                    @endforeach
                </ul>
                <button type="submit" class="btn btn-primary">ADD Stock</button>
            </div>


        </div>



        {{Form::close()}}


    </div>

@endsection