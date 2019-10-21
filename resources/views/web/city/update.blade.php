@extends('include.layout')
@section('content')

            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>City</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                
                    <div class="content-box">
                    <h4 class="h4">Update City</h4>
            <hr>
                    {{Form::open(array('url'=> 'update_city','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="city_id" value="{{$response['data']['city']->id}}">
                        <div class="form-group">
                            <label for="">Type City Name</label>
                            <input type="text" name="city" value="{{$response['data']['city']->name}}" class="form-control">
                        </div>
                        <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    {{Form::close()}}
                </div>
</div>
            </div>

@endsection