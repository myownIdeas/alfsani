@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Company</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                {{Form::open(array('url'=> 'insert/company','method'=>'POST','enctype'=>"multipart/form-data"))}}
                
                <div class="content-box">
                    <h4 class="h4">Add Company</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Parent Items</label>
                                <select name="parent_category" class="form-control">
                                    <option value="0">Please Select Parent Category</option>
                                @foreach($response['data']['categories'] as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Company Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    
                        
                        
                    {{Form::close()}}
                </div>

            </div>

@endsection