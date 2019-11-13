@extends('include.layout')
@section('content')

        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Order Listing</h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <div class="cst-table-row">
                <table id="example" class="table listing-table">
                    <thead>
                    <tr>
                        <th>Shop Name</th>
                        <th>Group Name</th>
                        <th>Agent Name</th>
                        <th>Total Price</th>
                        <th>After Discount</th>
                        <th>Date Time</th>
                        <th>Status</th>
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
                    <td>{{$order->after_discount}}</td>
                    <td>{{$order->order_date}}</td>
                    <td>{{$order->myStatus->name}}</td>
                    <td>
                        <a href="{{URL::to('order_detail/'.$order->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    @if($order->myStatus->id !=2)
                        <a href="{{URL::to('order_update/'.$order->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                        @endif
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