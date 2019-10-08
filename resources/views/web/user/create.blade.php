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
                            <a href="#"><i class="far fa-envelope"></i> Add User</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">Add User</div>
                    <div class="card-body">
                    {{Form::open(array('url'=> 'insert/user','method'=>'POST','enctype'=>"multipart/form-data"))}}
                        <div class="form-group">
                            <label for="">Add Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Add Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Add Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">ADD User</button>
                    {{Form::close()}}
                </div>
</div>
            </div>

@endsection