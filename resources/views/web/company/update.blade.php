@extends('include.layout')
@section('content')

            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>Company</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="content-box">
                    <h4 class="h4">Update Company</h4>
                    <hr>
                    {{Form::open(array('url'=> 'update_company','method'=>'POST','enctype'=>"multipart/form-data"))}}
                    <input type="hidden" name="company_id" value="{{$response['data']['company']->id}}">
                    <div class="form-group">
                        <label for="">Type Company Name</label>
                        <input type="text" name="name" value="{{$response['data']['company']->name}}" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>

@endsection