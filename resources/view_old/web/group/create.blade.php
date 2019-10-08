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
                    <a href="#"><i class="far fa-envelope"></i> Add Group</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">


        <div class="content-box">
            {{Form::open(array('url'=> 'insert/group','method'=>'POST','enctype'=>"multipart/form-data"))}}

            <div class="form-group">
                <label for="">Select User</label>
                <select name="user" id="" required class="form-control">
                    @foreach($response['data']['users'] as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label for="">Group Name</label>
                    <input type="text" name="group_name" required class="form-control">
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
            <button type="submit" class="btn btn-success">Submit</button>
            {{Form::close()}}

        </div>

    </div>

@endsection