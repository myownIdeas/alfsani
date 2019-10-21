@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Items</h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            {{Form::open(array('url'=> 'insert_model_items','method'=>'POST','enctype'=>"multipart/form-data"))}}
            
            <div class="content-box">
                <h4 class="h4">Add Item</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Select Company</label>
                            <select name="company_id" onchange="getSubCategories(this.value,'sub_model')" class="form-control">
                                <option value="0">Please Select Parent Category</option>
                                @foreach($response['data']['companies'] as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Select First Model</label>
                            <select name="model_id" onchange="getSubCategories(this.value,'sec_model')" id="sub_model" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Select Second Model</label>
                        <select name="second_model" onchange="getSubCategories(this.value,'third_model')" id="sec_model" class="form-control">
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Select Third Model</label>
                            <select name="third_model" onchange="getSubCategories(this.value,'forth_model')" id="third_model" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="add_more_itmes">
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label>Add Item</label>
                                    <input type="text" required class="form-control" name="itemName[]">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label>Per Peace purchase Price</label>
                                    <input type="number" required class="form-control" name="itemPurchasePrice[]">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Per Peace Price</label>
                                    <input type="number" required class="form-control" name="itemPrice[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-right">
                            <a href="javascript:void(0);" onclick="appendMoreItem()" class="btn btn-dark mr-1">Add More Items</a>
                            <button type="submit"  class="btn btn-primary">Add Items</button>
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>

@endsection

<script>
    function getCategoryModel(companyid){

    }
</script>