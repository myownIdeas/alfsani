@extends('include.layout')
@section('content')

            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Users</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="content-box">
                    <h4 class="h4">Edit User</h4>
                    <hr>
                    {{Form::open(array('url'=> 'update_user','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="user_id" value="{{$response['data']['user']->id}}">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label>Add Name</label>
                                <input type="text" name="name" value="{{$response['data']['user']->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label>Add Email</label>
                                <input type="text" name="email" value="{{$response['data']['user']->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label>Add Password</label>
                                <input type="password" name="password" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>

@endsection