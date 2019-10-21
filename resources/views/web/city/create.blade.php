@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
            <section class="sub-header">
                <div class="container-fluid">
                    <div class="subheader-main">
                        <h2>City</h2>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                
                
                    <div class="content-box">
                    <h4 class="h4">Add City</h4>
                <hr>
                    {{Form::open(array('url'=> 'insert/city','method'=>'POST','enctype'=>"multipart/form-data"))}}
                        <div class="form-group">
                            <label for="">Type City Name</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        
                    {{Form::close()}}
                </div>
                </div>

            </div>

@endsection