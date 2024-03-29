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
                    <label for="">Group Name</label>
                    <input type="text" name="group_name" value="{{$response['data']['group']->name}}" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Select User</label>
                    <select name="user" id="" required class="form-control">
                @foreach($response['data']['users'] as $user)
                    <option value="{{$user->id}}" @if($response['data']['group']->group_user_for == $user->id) selected @endif>{{$user->name}}</option>
                @endforeach
                    </select>
                </div>

                     <input type="hidden"  id="group_id" value="{{$response['data']['group']->id}}">
                     <label for="">Select Shops</label>
                     <input type="text" class="form-control" id="auto_search"  onkeyup="autoSearch(this.value)" >


                    <div class="card p-0 ">

                        <ul class="shop_select" id="results" >

                        </ul>

                </div>
                <div class="form-row mt-3" id="shop_added_list" >

                @foreach($response['data']['group']->groupDetail as $detail)
                    <div class="form-group col-sm-4">
                        <div>
                            <a href="javascript:void(0);"    onclick="deleteShop(<?=$detail->id?>)" >Delete</a>
                            <label for="{{$detail->id}}" >{{$detail->getShop->name.' '.$detail->getShop->mobile}}</label>
                        </div>
                    </div>

                @endforeach

                </div>
            <button type="submit" class="btn btn-success">Submit</button>
            {{Form::close()}}

        </div>

    </div>

@endsection