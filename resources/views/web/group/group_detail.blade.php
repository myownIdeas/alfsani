@extends('include.layout')
@section('content')

    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Dashboard</h2>
                <div class="breadcrumb-link ml-3">
                    <a href="#"><i class="far fa-envelope"></i> Group Detail</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="content-box pt-0">
            <h3 class="heading3">Group Info</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <ul class="group-info">
                        <li>Created Date <Span>{{$response['data']['group']->created_at}}</Span></li>
                        <li>Created Admin <span>{{$response['data']['group']->owner->name}}</span></li>
                        <li>Group User <span>{{$response['data']['group']->userFor->name}}</span></li>
                        <li>Group Category <span>{{$response['data']['group']->name}}</span></li>
                    </ul>
                </div>
            </div>
            <h3 class="heading3">Manage Shops</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <ul class="shop-listing">
                        @foreach($response['data']['group']->groupDetail as $detail)
                        <li><span>{{$detail->getShop->name}}</span><span>{{$detail->getShop->mobile}}</span>
                            <a href="{{URL::to('/get_order_page?shop_id='.$detail->getShop->id.'&group_id='.$response['data']['group']->id)}}" class="btn btn-info">Make Order</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>


@endsection