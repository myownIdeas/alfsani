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
                            <a href="#"><i class="far fa-envelope"></i> Add City</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">ADD CITY</div>
                    <div class="card-body">
                    {{Form::open(array('url'=> 'insert/city','method'=>'POST','enctype'=>"multipart/form-data"))}}
                        <div class="form-group">
                            <label for="">Add City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">ADD CITY</button>
                    {{Form::close()}}
                </div>
                </div>

            </div>

@endsection