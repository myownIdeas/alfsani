@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>User</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                
                <div class="content-box">
                    <h4 class="h4">Add User</h4>
                    <hr>
                    {{Form::open(array('url'=> 'insert/user','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label for="">Add Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label for="">Add Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label for="">Add Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>

@endsection