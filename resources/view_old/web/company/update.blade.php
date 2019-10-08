@extends('include.layout')
@section('content')

            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Dashboard</h2>
                        <div class="breadcrumb-link ml-3">
                            <a href="#"><i class="far fa-envelope"></i> Update Item</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="content-box">
                    {{Form::open(array('url'=> 'update_company','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="company_id" value="{{$response['data']['company']->id}}">
                        <div class="form-group">
                            <label for="">Update City</label>
                            <input type="text" name="name" value="{{$response['data']['company']->name}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Item</button>
                    {{Form::close()}}
                </div>

            </div>

@endsection