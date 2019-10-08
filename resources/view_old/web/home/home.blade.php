@extends('include.layout')
@section('content')

        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> Application</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                {{Form::open(array('url'=> 'insert/shop','method'=>'POST','enctype'=>"multipart/form-data"))}}

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
                <div class="more_mobile">
                    
                </div>
                <div class="add-more mb-3">
                    <a href="#" class="btn btn-info more_info">Add More Person</a>
                </div>
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


                    <div class="form-group">
                        <label for="">ADDRESS</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>

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
                    <div class="form-submit">
                        <div class="img-upload">
                            <label for="">Profile Image</label>
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-success">Upload a file</button>
                                <input type="file" name="image" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">CREATE ACCOUNT</button>
                    </div>
                {{Form::close()}}
            </div>

        </div>
@endsection