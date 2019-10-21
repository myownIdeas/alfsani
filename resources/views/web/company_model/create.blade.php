@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Model</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                {{Form::open(array('url'=> 'insert/company/model','method'=>'POST','enctype'=>"multipart/form-data"))}}
                
                <div class="content-box">
                    <h4 class="h4">Add Model</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Select First Model</label>
                                <select name="model_id" onchange="getSubCategories(this.value,'sec_model')" id="sub_model" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>FROM</label>
                                <input type="text" id="from" required class="form-control" placeholder="1940" name="year">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>To</label>
                                <input type="text" id="to" required class="form-control" placeholder="1945" name="year">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select Second Model</label>
                            <select name="model_id" onchange="getSubCategories(this.value,'third_model')" id="sec_model" class="form-control">
                            </select>
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Insert Model</label>
                                <div class="input-group">
                                    <input type="text" id="insert_sec_model" class="form-control">
                                    <div class="input-group-append">
                                        <a href="javascript:void(0);" class="btn btn-primary" onclick="insertModel('sub_model','insert_sec_model','sec_model')" >Insert</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Select Third Model</label>
                                <select name="model_id" onchange="getSubCategories(this.value,'forth_model')" id="third_model" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Insert Model</label>
                                <div class="input-group">
                                    <input type="text" id="insert_third_model" class="form-control">
                                    <div class="input-group-append">
                                        <a href="javascript:void(0);" class="btn btn-primary" onclick="insertModel('sec_model','insert_third_model','third_model')" >Insert</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    

                    {{--<div class="form-group row">--}}
                        {{--<div class="col-6">--}}
                            {{--<label>Select Forth Model</label>--}}
                            {{--<select name="model_id" onchange="getSubCategories(this.value,'third_model')" id="forth_model" class="form-control">--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-6 form-inline">--}}
                            {{--<label>Insert Model</label>--}}
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