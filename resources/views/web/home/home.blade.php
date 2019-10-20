@extends('include.layout')
@section('content')
    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Add Shop</h2>
            </div>
        </div>
    </section>
    {{Form::open(array('url'=> 'insert/shop','method'=>'POST','enctype'=>"multipart/form-data"))}}

        <div class="container-fluid">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="h4">Basic Info</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input type="text" class="form-control"name="shop_name" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Person Name</label>
                                    <input type="text" class="form-control"name="person_name" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control"name="mobile" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Work Type</label>
                                    <input type="text" class="form-control"name="work_type" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="more_mobile"></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="add-more text-right">
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
                                    <input type="text" class="form-control"name="whats_app" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>PTCL</label>
                                    <input type="text" class="form-control"name="ptcl" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>City Name</label>
                                    <select name="city_id"  class="form-control"required>
                                        @foreach($response['data']['cities'] as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <input type="hidden" name="society" class="form-control">
                                <div class="form-group mb-0">
                                    <label>Address</label>
                                    <input type="text" class="form-control"name="address" required>
                                </div>
                            </div>
                        </div>
                        <h4 class="h4">Other Info</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control"name="email" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" name="website" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Facebook URL</label>
                                    <input type="text" class="form-control"name="facebook" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" name="discount" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail w-100 border">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" width="100%" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file btn-block">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Choose Image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" />
                                            </span>
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{Form::close()}}

        </div>
@endsection