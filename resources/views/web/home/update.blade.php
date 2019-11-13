@extends('include.layout')
@section('content')

        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Edit Shop</h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                {{Form::open(array('url'=> 'update_shop','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="shop_id" value="{{$response['data']['shop']->id}}">
                    <h4 class="h4">Basic Info</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Shop Name</label>
                                <input type="text" class="form-control" name="shop_name" value="{{$response['data']['shop']->name}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Person Name</label>
                                <input type="text" class="form-control" name="person_name" value="{{$response['data']['shop']->person_name}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control" name="mobile" value="{{$response['data']['shop']->mobile}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Work Type</label>
                                <input type="text" class="form-control" name="work_type" value="{{$response['data']['shop']->work_type}}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="more_mobile"></div>
                        </div>

                        <div class="mobile_field card-gray mb-4">
                            @foreach($response['data']['shop']->shopDetailContent as $contact)
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <label>Person Name</label>
                                        <input type="text" name="ext_name[]" value="{{$contact->name}}" required class="form-control">
                                        </div>
                                    </div>
                                <div class="col-sm-3 col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" name="ext_mobile[]" value="{{$contact->mobile}}" required class="form-control">
                                        </div></div>
                                <div class="col-sm-3 col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <label>WhatApp</label>
                                        <input type="text" name="ext_whats_app[]" value="{{$contact->what_app}}" required class="form-control">
                                        </div></div>
                                <div class="col-sm-3 col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="ext_email[]" value="{{$contact->email}}" required class="form-control">
                                        </div>
                                </div>
                                <div class="col-sm-3 col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteContact({{$contact->id}})">Delete</a>
                                    </div>
                                </div>

                                </div>
                            @endforeach
                            </div>

                        <div class="col-sm-12 text-right">
                            <div class="add-more mb-3">
                                <a href="#" class="btn btn-primary more_info">Add More Person</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="h4">Contact Info</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>WhatsApp</label>
                                <input type="text" class="form-control" name="whats_app" value="{{$response['data']['shop']->what_app_number}}" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>PTCL</label>
                                <input type="text" class="form-control" name="ptcl" value=" {{$response['data']['shop']->ptcl}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>City Name</label>
                                <select name="city_id" class="form-control" required>
                                    @foreach($response['data']['cities'] as $city)
                                    <option value="{{$city->id}}" @if($response['data']['shop']->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Society</label>
                                <input type="text" name="society" class="form-control"  value=" {{$response['data']['shop']->society_name}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address"  value=" {{$response['data']['shop']->address}}" required>
                            </div>
                        </div>
                    </div>
                    <h4 class="h4">Other Info</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"  value=" {{$response['data']['shop']->email}}" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <input type="text" class="form-control" name="facebook"  value=" {{$response['data']['shop']->facebook_url}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" name="website" class="form-control"  value=" {{$response['data']['shop']->website}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" name="discount" value="{{$response['data']['shop']->discount}}" class="form-control" >
                            </div>
                        </div>
                        <div class="form-submit w-100">
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <div class="img-upload w-100">
                                        <label>Profile Image</label>
                                        <div class="upload-btn-wrapper w-100">
                                            <button class="btn btn-success btn-block">Upload a file</button>
                                            <input type="file" name="image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary">Update Account</button>
                            </div>
                        </div>
                    </div>
                
                <?php /* <div class="more_mobile">
                    @foreach($response['data']['shop']->shopDetailContent as $detail)
                    <div class="mobile_field">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>PERSON NAME</label>
                                    <input type="text" name="ext_name[]" value="{{$detail->name}}"  class="form-control">
                                    </div>
                                </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="ext_mobile[]" value="{{$detail->mobile}}"  class="form-control">
                                    </div></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>WhatApp</label>
                                    <input type="text" name="ext_whats_app[]" value="{{$detail->what_app}}"  class="form-control">
                                    </div></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Email</label>
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
                </div> */ ?>

                {{Form::close()}}
            </div>

        </div>




@endsection