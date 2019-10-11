@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> Order Listing</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <div class="cst-table-row">
                <table id="example" class="table listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Shop Name</th>
                        <th>Group Name</th>
                        <th>Agent Name</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['orders'] as $order)
                        <tr>
                    <td>{{$order->shop->name}}</td>
                    <td>{{$order->group->name}}</td>
                    <td>{{$order->agent->name}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>
                        <a href="{{URL::to('order_detail/'.$order->id)}}">Detail</a>

                        <a href="{{URL::to('order_update/'.$order->id)}}">Update</a>
                        {{--<a href="{{URL::to('order_finish/'.$order->id)}}">Finish</a>--}}

                        {{--<a href="{{URL::to('order_delete/'.$order->id)}}" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>--}}
                    </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            </div>

        </div>




@endsection