@extends('include.layout')
@section('content')

            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Dashboard</h2>
                        <div class="breadcrumb-link ml-3">
                            <a href="#"><i class="far fa-envelope"></i> Update City</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">Update City</div>
                    <div class="card-body">
                    {{Form::open(array('url'=> 'update_city','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="city_id" value="{{$response['data']['city']->id}}">
                        <div class="form-group">
                            <label for="">Update City</label>
                            <input type="text" name="city" value="{{$response['data']['city']->name}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update city</button>
                    {{Form::close()}}
                </div>
</div>
            </div>

@endsection