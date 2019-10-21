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
                <h4 class="h4">Edit Group</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="">Group Name</label>
                            <input type="text" name="group_name" value="{{$response['data']['group']->name}}" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="">Select User</label>
                            <select name="user" id="" required class="form-control">
                        @foreach($response['data']['users'] as $user)
                            <option value="{{$user->id}}" @if($response['data']['group']->group_user_for == $user->id) selected @endif>{{$user->name}}</option>
                        @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input type="hidden"  id="group_id" value="{{$response['data']['group']->id}}">
                            <label for="">Select Shops</label>
                            <input type="text" class="form-control" id="auto_search"  onkeyup="autoSearch(this.value)" >
                            <div class="form-group-dd">
                                <ul class="shop_select" id="results"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-gray" id="shop_added_list">
                        <div class="row">
                            @foreach($response['data']['group']->groupDetail as $detail)
                                <div class="col-sm-4">
                                    <div class="more-shop my-2 bg-white">
                                        <h4 for="{{$detail->id}}" >{{$detail->getShop->name.' '.$detail->getShop->mobile}}</h4>
                                        <a href="javascript:void(0);"  class="btn btn-danger"  onclick="deleteShop(<?=$detail->id?>)" >Delete</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>

            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
            {{Form::close()}}
            

        </div>

    </div>

@endsection