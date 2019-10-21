@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif


    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Group</h2>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        
            {{Form::open(array('url'=> 'insert/group','method'=>'POST','enctype'=>"multipart/form-data"))}}
            
            <div class="content-box">
            <h4 class="h4">Basic Info</h4>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Select User</label>
                        <select name="user" id="" required class="form-control">
                            @foreach($response['data']['users'] as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Group Name</label>
                        <input type="text" name="group_name" required class="form-control">
                    </div>
                </div>
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
                


                {{--<label for="">Select Shops</label>--}}
                {{--<div class="form-row">--}}
                {{--@foreach($response['data']['shopes'] as $shope)--}}
                    {{--<div class="form-group col-sm-4">--}}
                        {{--<div>--}}
                            {{--<input id="{{$shope->id}}" class="checkbox-style" name="shopes[{{$shope->id}}]" type="checkbox" >--}}
                            {{--<label for="{{$shope->id}}" class="checkbox-style-3-label">{{$shope->name.' '.$shope->mobile}}</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}

                {{--</div>--}}
            
            {{Form::close()}}

        
        </div>

    </div>

@endsection