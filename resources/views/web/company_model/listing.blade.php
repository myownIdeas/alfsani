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
    <div class="card ">
        <div class="card-header">
            Modal Listing <span class="small-text">(select modal to update and view detail)</span>
        </div>
        <div class="card-body p-0 bg-grey">  
        <div class="model_list">
            <div class="col-custom active">
                <div class="header-car-info">
                <h3>MODEL YEAR</h3>
                </div>
                <ul class="year-listing cst-list">
                    @foreach($response['data']['models'] as $model)
                    <li><a href="javascript:void(0)" onclick="getSubModelsForList('{{$model->id}}','first_md_ls')">{{$model->name}} <i class="fas fa-chevron-right"></i></a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-custom">
                  <div class="header-car-info">
                <h3>First Model</h3>
                </div>
                <ul class="make-listing cst-list" id="first_md_ls">
                </ul>
            </div>
            <div class="col-custom">
                  <div class="header-car-info">
                <h3>Second MODEL</h3>
                </div>

                <ul class="model-listing cst-list" id="second_md_ls">

                </ul>
            </div>
            <div class="col-custom">
                  <div class="header-car-info">
                <h3>Third Model</h3>
                </div>
                <ul class="version-listing cst-list" id="third_md_ls">
                </ul>
            </div>
            <div class="col-custom">
                  <div class="header-car-info">
                <h3>Items</h3>
                </div>
                <ul id="main_item" class="cst-list">

                </ul>
            </div>
        </div>
        </div>
       
    </div>
</div>
@endsection