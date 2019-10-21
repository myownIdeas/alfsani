@extends('include.layout')
@section('content')

    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Group</h2>
             </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="content-box">
            <h4 class="h4">Group Info</h4>
            <hr>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Created Date:</label>
                        {{$response['data']['group']->created_at}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Created Admin:</label>
                        {{$response['data']['group']->owner->name}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Group User:</label>
                        {{$response['data']['group']->userFor->name}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Group Category:</label>
                        {{$response['data']['group']->name}}
                    </div>
                </div>
            </div>
            <table class="table listing-table mt-4">
                <thead>
                    <tr>
                        <th colspan="3" class="font-weight-bold">Manage Shops</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($response['data']['group']->groupDetail as $detail)
                    <tr>
                        <td>{{$detail->getShop->name}}</td>
                        <td>{{$detail->getShop->mobile}}</td>
                        <td class="text-center"><a href="{{URL::to('/get_order_page?shop_id='.$detail->getShop->id.'&group_id='.$response['data']['group']->id)}}" class="btn btn-info btn-sm">Make Order</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>

    </div>


@endsection