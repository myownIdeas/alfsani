@extends('include.layout')
@section('content')
    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Dashboard</h2>
                <div class="breadcrumb-link ml-3">
                    <a href="#"><i class="fas fa-store-alt"></i> Add Shop</a>
                </div>
            </div>
        </div>
    </section>
    {{Form::open(array('url'=> 'insert/shop','method'=>'POST','enctype'=>"multipart/form-data"))}}

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">Basic Info</div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">SHOP NAME</label>
                                <input type="text" class="form-control" name="shop_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">PERSON NAME</label>
                                <input type="text" class="form-control" name="person_name" required>
                            </div>

                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" class="form-control" name="mobile" required>

                            </div>
                            <div class="form-group">
                                <label for="">Work Type</label>
                                <input type="text" class="form-control" name="work_type" required>

                            </div>
                            <div class="more_mobile">

                            </div>
                            <div class="add-more">
                                <a href="#" class="btn btn-primary more_info">Add More Person</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">Contact Info</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">WHATSAPP</label>
                                <input type="text" class="form-control" name="whats_app" >
                            </div>

                            <div class="form-group">
                                <label for="">PTCL</label>
                                <input type="text" class="form-control" name="ptcl" >
                            </div>
                            <div class="form-group">
                                <label for="">CITY NAME</label>
                                <select name="city_id"  class="form-control" required>
                                    @foreach($response['data']['cities'] as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <input type="hidden" name="society" class="form-control">


                            <div class="form-group mb-0">
                                <label for="">ADDRESS</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Other Info</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email" class="form-control" name="email" >
                    </div>

                    <div class="form-group">
                        <label for="">FACEBOOK URL</label>
                        <input type="text" class="form-control" name="facebook" >
                    </div>

                    <div class="form-group">
                        <label for="">WebSite</label>
                        <input type="text" name="website" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="text" name="discount" class="form-control" >
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Image Upload</label>

                        </div>
                        <div class="col-md-12">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" />
                                                   </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">CREATE ACCOUNT</button>
                        </div>
                        </div>
                        </div>
                    </div>

    {{Form::close()}}

        </div>
@endsection