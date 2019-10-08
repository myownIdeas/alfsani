@extends('include.layout')
@section('content')


    <div class="container-fluid">
        <div class="content-box pt-0 invoices">
            <div class="head-invoice">
                <h3 class="cp">INVOICE</h3>
                <div class="shop_detail">
                    <h3>ALIFSANI TRADERS</h3>
                    <p>Cecilia Chapman, 711-2880 Nulla St, MankatoMississippi </p>
                    <p>96522</p>
                </div>
            </div>
            <div class="row detail_invoice">
                <div class="col-md-3">
                    <h4>Date</h4>
                    <span>{{substr($response['data']['order']->created_at ,0,10)}}</span>
                </div>
                <div class="col-md-3">
                    <h4>Invoice No</h4>
                    <span>GS 000014</span>
                </div>
                <div class="col-md-3">
                    <h4>Bilty NO</h4>
                    <span>{{$response['data']['order']->bilty_no}}</span>
                </div>

                <div class="col-md-3">
                    <h4>Order By</h4>
                    <span>{{$response['data']['order']->agent->name}}</span>
                </div>
            </div>

            <h3 class="heading3">Order Detail</h3>


            <table class="table table-striped table-bordered listing-table table-list" style="width:100%">
                <thead>
                <tr>
                    <th>Company</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Item</th>
                    <th>Quantiy</th>
                    <th class="text-center">Amount</th>
                </tr>
                </thead>
                <tbody>
                {{$totalPrice = 0}}
                @foreach($response['data']['orderDetail'] as $detail)
                    {{$totalPrice = $totalPrice + $detail->line_price}}
                    <tr>
                        <td>{{$detail->companyId->name}}</td>
                        <td>{{$detail->firstModel->name}}</td>
                        <td>{{$detail->secondModel->name}}</td>
                        <td>{{$detail->thirdModel->name}}</td>
                        <td>{{$detail->thirdModel->year}}</td>
                        <td>{{$detail->item->item}}</td>
                        <td>{{$detail->quantity}}</td>
                        <td class="center">{{$detail->line_price}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="total_box">
                <span></span>
                <div class="kt-invoice__content text-right">
                    <p>TOTAL AMOUNT</p>
                    <span class="kt-invoice__price">Rs {{$totalPrice}}</span>
                </div>
            </div>
        </div>
    </div>


@endsection