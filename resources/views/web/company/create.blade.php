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
                            <a href="#"><i class="far fa-envelope"></i> Add Company</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                {{Form::open(array('url'=> 'insert/company','method'=>'POST','enctype'=>"multipart/form-data"))}}
                <div class="card">
    <div class="card-header">Add Company</div>
    <div class="card-body">
                    <div class="form-group">
                        <label for="">Parent Items</label>
                        <select name="parent_category" class="form-control">
                            <option value="0">Please Select Parent Category</option>
                        @foreach($response['data']['categories'] as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="">Add Company</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">ADD Company</button>
                    {{Form::close()}}
                </div>
</div>
            </div>

@endsection