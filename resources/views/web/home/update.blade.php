@extends('include.layout')
@section('content')

        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Shope</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> Shopes</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                {{Form::open(array('url'=> 'update_shop','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="shop_id" value="{{$response['data']['shop']->id}}">
                    <div class="form-group">
                        <label for="">SHOP NAME</label>
                        <input type="text" class="form-control" name="shop_name" value="{{$response['data']['shop']->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">PERSON NAME</label>
                        <input type="text" class="form-control" name="person_name" value="{{$response['data']['shop']->person_name}}" required>
                    </div>



                    <div class="form-group">
                        <label for="">Mobile</label>
                        <input type="text" class="form-control" name="mobile" value="{{$response['data']['shop']->mobile}}" required>
                    </div>
                <div class="form-group">
                    <label for="">Work Type</label>
                    <input type="text" class="form-control" name="mobile" value="{{$response['data']['shop']->work_type}}" required>
                </div>
                <div class="more_mobile">
                    @foreach($response['data']['shop']->shopDetailContent as $detail)
                    <div class="mobile_field">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">PERSON NAME</label>
                                    <input type="text" name="ext_name[]" value="{{$detail->name}}"  class="form-control">
                                    </div>
                                </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Mobile</label>
                                    <input type="text" name="ext_mobile[]" value="{{$detail->mobile}}"  class="form-control">
                                    </div></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">WhatApp</label>
                                    <input type="text" name="ext_whats_app[]" value="{{$detail->what_app}}"  class="form-control">
                                    </div></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="ext_email[]" value="{{$detail->email}}"  class="form-control">
                                    </div></div>
                            <div class="col-md-1">
                                <a class="delete_mob" href="#">
                                    <i class="fas fa-trash-alt "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>

                <div class="add-more mb-3">
                    <a href="#" class="btn btn-info more_info">Add More Person</a>
                </div>
                    <div class="form-group">
                        <label for="">WHATSAPP</label>
                        <input type="text" class="form-control" name="whats_app" value="{{$response['data']['shop']->what_app_number}}" >
                    </div>

                    <div class="form-group">
                        <label for="">PTCL</label>
                        <input type="text" class="form-control" name="ptcl" value=" {{$response['data']['shop']->ptcl}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">CITY NAME</label>
                        <select name="city_id"  class="form-control" required>
                            @foreach($response['data']['cities'] as $city)
                            <option value="{{$city->id}}" @if($response['data']['shop']->city_id == $city->id) selected @endif>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Society</label>
                        <input type="text" name="society" class="form-control"  value=" {{$response['data']['shop']->society_name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">ADDRESS</label>
                        <input type="text" class="form-control" name="address"  value=" {{$response['data']['shop']->address}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email" class="form-control" name="email"  value=" {{$response['data']['shop']->email}}" >
                    </div>

                    <div class="form-group">
                        <label for="">FACEBOOK URL</label>
                        <input type="text" class="form-control" name="facebook"  value=" {{$response['data']['shop']->facebook_url}}" required>
                    </div>
                <div class="form-group">
                    <label for="">WebSite</label>
                    <input type="text" name="website" class="form-control"  value=" {{$response['data']['shop']->website}}" required>
                </div>
                <div class="form-group">
                    <label for="">Discount</label>
                    <input type="text" name="discount" value="{{$response['data']['shop']->discount}}" class="form-control" >
                </div>
                    <div class="form-submit">
                        <div class="img-upload">
                            <label for="">Profile Image</label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-success">Upload a file</button>
                                <input type="file" name="image" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update ACCOUNT</button>
                    </div>
                {{Form::close()}}
            </div>

        </div>




@endsection