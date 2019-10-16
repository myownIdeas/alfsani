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
                            <a href="#"><i class="far fa-envelope"></i> Add Item</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                {{Form::open(array('url'=> 'insert_model_items','method'=>'POST','enctype'=>"multipart/form-data"))}}
                <div class="card">
    <div class="card-header">Add Item</div>
    <div class="card-body">
                    <div class="form-group">
                        <label for="">Select Company</label>

                        <select name="company_id" onchange="getSubCategories(this.value,'sub_model')" class="form-control">
                            <option value="0">Please Select Parent Category</option>
                            @foreach($response['data']['companies'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">

                            <label for="">Select First Model</label>
                            <select name="model_id" onchange="getSubCategories(this.value,'sec_model')" id="sub_model" class="form-control">
                            </select>


                    </div>
                    <div class="form-group">

                            <label for="">Select Second Model</label>
                            <select name="second_model" onchange="getSubCategories(this.value,'third_model')" id="sec_model" class="form-control">
                            </select>
                     </div>
                    <div class="form-group">
                         <label for="">Select Third Model</label>
                            <select name="third_model" onchange="getSubCategories(this.value,'forth_model')" id="third_model" class="form-control">
                         </select>



                    </div>

                    <div class="row" id="add_more_itmes">
                        <div class="col-6">
                            <div class="form-group ">
                            <label for="">Add Item</label>
                            <input type="text" required class="form-control" name="itemName[]">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group ">

                                <label for="">Per Peace purchase Price</label>
                                <input type="number" required class="form-control" name="itemPurchasePrice[]">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group ">
                            
                            <label for="">Per Peace Price</label>
                            <input type="number" required class="form-control" name="itemPrice[]">
                    </div>
                        </div>
                    </div>  <br />

                       <button type="submit"  class="btn btn-primary">Add Items</button>
                       <a href="javascript:void(0);" onclick="appendMoreItem()" class="btn btn-success">Add More Items</a>

                    {{Form::close()}}
                </div>
</div>
            </div>

@endsection

<script>
    function getCategoryModel(companyid){

    }
</script>