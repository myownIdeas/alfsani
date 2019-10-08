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
                            <a href="#"><i class="far fa-envelope"></i> Add Modal</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                {{Form::open(array('url'=> 'insert/company/model','method'=>'POST','enctype'=>"multipart/form-data"))}}
                <div class="card">
    <div class="card-header">Add Modal</div>
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
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">FROM</label>
                            <input type="text" id="from" required class="form-control" placeholder="1940" name="year">
                        </div>
                        <div class="col-6">
                            <label for="">To</label>
                            <input type="text" id="to" required class="form-control" placeholder="1945" name="year">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Select Second Model</label>
                            <select name="model_id" onchange="getSubCategories(this.value,'third_model')" id="sec_model" class="form-control">
                            </select>
                        </div>
                        <div class="col-6 form-inline">
                            <label for="">Insert Model</label>
                            <input type="text" id="insert_sec_model" class="form-control">
                            <a href="javascript:void(0);"  onclick="insertModel('sub_model','insert_sec_model','sec_model')" >Insert</a>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Select Third Model</label>
                            <select name="model_id" onchange="getSubCategories(this.value,'forth_model')" id="third_model" class="form-control">
                            </select>
                        </div>
                        <div class="col-6 form-inline">
                            <label for="">Insert Model</label>
                            <input type="text" id="insert_third_model" class="form-control">
                            <a href="javascript:void(0);"  onclick="insertModel('sec_model','insert_third_model','third_model')" >Insert</a>
                        </div>

                    </div>

                    {{--<div class="form-group row">--}}
                        {{--<div class="col-6">--}}
                            {{--<label for="">Select Forth Model</label>--}}
                            {{--<select name="model_id" onchange="getSubCategories(this.value,'third_model')" id="forth_model" class="form-control">--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-6 form-inline">--}}
                            {{--<label for="">Insert Model</label>--}}
                            {{--<input type="text" id="insert_forth_model" class="form-control">--}}
                            {{--<a href="javascript:void(0);"  onclick="insertModel('third_model','insert_forth_model','forth_model')" >Insert</a>--}}
                        {{--</div>--}}

                    {{--</div>--}}


                        <button type="submit" style="display:none" class="btn btn-primary">ADD Company Model</button>

                    {{Form::close()}}
                </div>
</div>
            </div>

@endsection

<script>
    function getCategoryModel(companyid){

    }
</script>