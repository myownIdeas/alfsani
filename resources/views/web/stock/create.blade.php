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
                            <a href="#"><i class="far fa-envelope"></i> Add Stock</a>
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
                            <option value="">Please Select Option</option>
                            @foreach($response['data']['shoppes'] as $shop)
                                <option value="{{$shop->id}}">{{$shop->name}}</option>
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
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                      <label for="">Select First Model</label>
                        <select name="model_id[]" onchange="getSubCategories(this.value,'sec_model0')" id="sub_model0" class="form-control">
                        </select>
                </div>
            </div>
              <div class="col-lg-6">
                  <div class="form-group"> <label for="">Select Second Model</label>
                        <select name="second_model[]" onchange="getSubCategories(this.value,'third_model0')" id="sec_model0" class="form-control">
                        </select></div>
              </div>
                <div class="col-lg-6">    <div class="form-group"> <label for="">Select Third Model</label>
                        <select name="third_model[]" onchange="getSubCategories(this.value,'forth_model0')" id="third_model0" class="form-control">
                        </select></div></div>
                  <div class="col-lg-6">    <div class="form-group">
                        <label for="">Search Item</label>
                        <input type="text"   class="form-control srchItem" onkeyup="searchItem(this.value,0)">
                  </div>
                   
                </div>
                  
        </div>
        <div>
            <ul id="appendItemsHere0">

            </ul>
        </div>
    </div>
    <div class="row col-12" id="add_more_itmes0">

    </div>
        <br />
        <br />
        <br />
        <br />
                        <button type="submit" class="btn btn-primary">ADD Stock</button>
    </div>
    
    
</div>
                  
                   
                   
                    {{Form::close()}}
                

            </div>

@endsection