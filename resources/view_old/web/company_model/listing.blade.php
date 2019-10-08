@extends('include.layout')
@section('content')
<section class="sub-header">
    <div class="container-fluid">
        <div class="subheader-main">
            <h2>Dashboard</h2>
            <div class="breadcrumb-link ml-3">
                <a href="#"><i class="far fa-envelope"></i> Modal Listing</a>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="content-box p-0 model_list">
        <div class="row no-gutters">
            <div class="col-md-2">
                <h3>MODEL YEAR</h3>
                <ul class="year-listing">
                    @foreach($response['data']['models'] as $model)
                    <li><a href="javascript:void(0)" onclick="getSubModelsForList('{{$model->id}}','first_md_ls')">{{$model->name}} <i class="fas fa-chevron-right"></i></a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-2">
                <h3>First Model</h3>
                <ul class="make-listing " id="first_md_ls">


                </ul>
            </div>
            <div class="col-md-2">
                <h3>Second MODEL</h3>

                <ul class="model-listing" id="second_md_ls">

                </ul>
            </div>
            <div class="col-md-2">
                <h3>Third Model</h3>
                <ul class="version-listing" id="third_md_ls">

                </ul>
            </div>
            <div class="col-md-2">
                <h3>Items</h3>
                <ul id="main_item">

                </ul>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#" Class="btn btn-primary done">DONE</a>
        </div>
    </div>
</div>
@endsection