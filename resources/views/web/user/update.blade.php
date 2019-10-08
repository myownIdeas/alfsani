@extends('include.layout')
@section('content')

            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Dashboard</h2>
                        <div class="breadcrumb-link ml-3">
                            <a href="#"><i class="far fa-envelope"></i> Update User</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">Update User</div>
                    <div class="card-body">
                    {{Form::open(array('url'=> 'update_user','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="user_id" value="{{$response['data']['user']->id}}">
                    <div class="form-group">
                        <label for="">Add Name</label>
                        <input type="text" name="name" value="{{$response['data']['user']->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Add Email</label>
                        <input type="text" name="email" value="{{$response['data']['user']->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Add Password</label>
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    {{Form::close()}}
                </div>
                </div>

            </div>

@endsection