@extends('include.layout')
@section('content')

            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Group</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="content-box">
                    {{Form::open(array('url'=> 'update_city','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="city_id" value="{{$response['data']['city']->id}}">
                        <div class="form-group">
                            <label>Update City</label>
                            <input type="text" name="city" value="{{$response['data']['city']->name}}" class="form-control">
                        </div>
                        <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    {{Form::close()}}
                </div>

            </div>

@endsection