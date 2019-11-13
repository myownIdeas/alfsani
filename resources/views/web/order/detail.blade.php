@extends('include.layout')
@section('content')

    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Order Detail</h2>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-gray mb-4">
                                <h2>INVOICE</h2>
                                <ul class="ast-data-list mt-3">
                                    <li>
                                        <label>Invoice No:</label>
                                        <span class="text-muted">GS {{$response['data']['order']->id}}</span>
                                    </li>
                                    <li>
                                        <label>Date:</label>
                                        <span class="text-muted">{{substr($response['data']['order']->created_at ,0,10)}}</span>
                                    </li>
                                    <li>
                                        <label>Bilty No:</label>
                                        <span class="text-muted">{{$response['data']['order']->bilty_no}}</span>
                                    </li>
                                    <li>
                                        <label>Order By:</label>
                                        <span class="text-muted">{{$response['data']['order']->agent->name}}</span>
                                    </li>
                                    @if( \Session::get('user')->user_type ==1 &&  $response['data']['order']->status ==2)
                                    <li>
                                        <label>Order Status:</label>
                                        <b>Finish</b>
                                    </li>
                                    @endif
                                    @if( \Session::get('user')->user_type ==1 &&  $response['data']['order']->status ==2)
                                        <li>
                                            <label>Finish Date:</label>
                                            <b>{{$response['data']['order']->finish_date}}</b>
                                        </li>
                                    @endif
                                </ul>
                                @if( \Session::get('user')->user_type ==1 &&  $response['data']['order']->status !=2)
                                <div class="form-group mt-3 mb-0">
                                    <label>Change Order Status</label>
                                    <select name="" id="" class="form-control" onchange="onStatusChange({{$response['data']['order']->id}},this.value)">
                                        <option value="">Please Select The Status</option>
                                        @foreach($response['data']['orderStatus'] as $status)
                                            <option value="{{$status->id}}" @if($status->id == $response['data']['order']->status) selected  @endif>{{$status->name}}</option>
                                         @endforeach

                                    </select>
                                </div>
                                <div class="form-group mt-3 mb-0">
                                    <label>Assign Order</label>
                                    <select name="" id="" class="form-control" onchange="assignOrder({{$response['data']['order']->id}},this.value)">
                                        <option value="">Please Select The Status</option>
                                        @foreach($response['data']['users'] as $user)
                                            <option value="{{$user->id}}" @if($user->id == $response['data']['order']->agent_id) selected  @endif>{{$user->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                    @endif
                            </div>
                        </div>
                        @if( \Session::get('user')->user_type ==1 &&  $response['data']['order']->status !=2)
                        <div class="col-lg-4">

                            <div class="card-gray mb-4">
                                <h2>Add Payment</h2>
                                <ul class="ast-data-list mt-3">
                                    <li>
                                        <label>Amount:</label>
                                        <input type="text" class="form-control" id="new_payment" name="payment" >
                                        <br />
                                        <select class="form-control" id="order_payment_type">
                                            <option value="">Please Select Type</option>
                                            <option value="settlement">Settlement</option>
                                            <option value="installment">Installment</option>
                                            <option value="clear">Payment Clear</option>
                                        </select>
                                        <br />
                                        <button type="button" onclick="addNewPayment({{$response['data']['order']->id}})" class="btn btn-primary">Submit</button>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        @endif
                        <div class="col-lg-4">
                            <div class="card-gray mb-4">
                                <h2>Payment Detail</h2>
                                <br />
                                Total Amount:  {{$response['data']['order']->total_price}}
                                <ul class="ast-data-list mt-3">
                                    <?php $rcPrice = 0; ?>
                                @foreach($response['data']['order']->payments as $payment)
                                    <?php $rcPrice = $rcPrice + $payment->amount  ?>
                                <li>
                                   Amount: {{$payment->amount .' '.$payment->order_payment_type}}
                                </li>
                                @endforeach
                                        <br />
                                    <li>Recevied Amount : {{$rcPrice}}</li>

                                    <li>Left Amount : {{($response['data']['order']->after_discount - $rcPrice)}}</li>
                                </ul>
                                <input type="hidden" id="rcprice" value="{{$rcPrice}}">
                                <input type="hidden" id="totalprice" value="{{$response['data']['order']->after_discount}}">

                            </div>
                        </div>

                    </div>
                    @if( \Session::get('user')->user_type ==1 &&  $response['data']['order']->status !=2)
                    <a href="" class="btn btn-primary btn-sm float-right mt-2" data-toggle="modal" data-target="#addEditModal"><i class="fa fa-plus"></i> Add New</a>
                   @endif
                    <h3 class="heading3">Order Detail</h3>
                    <table class="table listing-table table-hover">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Item</th>
                                <th>Quantiy</th>
                                <th>Discount</th>
                                <th>Amount</th>
                                @if( \Session::get('user')->user_type ==1 &&  $response['data']['order']->status !=2)
                                <th class="text-center">Actions</th>
                                    @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalPrice = 0 ?>
                             @foreach($response['data']['orderDetail'] as $detail)
                            <span class="d-none">{{$totalPrice = $totalPrice + ($detail->quantity *$detail->line_price)}}</span>
                            <tr>
                                <td>{{$detail->companyId->name}}</td>
                                <td>{{$detail->firstModel->name}}</td>
                                <td>{{$detail->secondModel->name}}</td>
                                <td>{{$detail->thirdModel->name}}</td>
                                <td>{{$detail->thirdModel->year}}</td>
                                <td>{{$detail->item->item}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>{{(($detail->quantity * $detail->line_price) *$detail->item_discount)/100}}</td>
                                <td>{{($detail->quantity * $detail->line_price)}}</td>
                                @if( \Session::get('user')->user_type ==1 &&  $response['data']['order']->status !=2)
                                <td>
                                    <a href="" class="btn-link"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{--<nav class="d-flex justify-content-end">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>--}}
                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-lg-4">
                            <table class="table border bg-light mt-5">
                                <tr>
                                    <td><strong>Sub Total</strong></td>
                                    <td class="text-right">{{$response['data']['order']->total_price}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Discount</strong></td>
                                    <td class="text-right">{{($response['data']['order']->total_price - $response['data']['order']->after_discount)}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><span class="kt-invoice__price">Rs {{$response['data']['order']->after_discount}}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- addEditModal -->
<div class="modal fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add/Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Make</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Model</label>
                            <select class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Model</label>
                            <select class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Year</label>
                            <select class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Quantiy</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Item</label>
                            <textarea rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    function addNewPayment(orderId) {
        var status = $('#order_payment_type').val();
        if(status ==null || status ==""){
            alert('please select the payment status first');
            return false;
        }
        if($('#new_payment').val() !=""){
            $.ajax({

                type: 'GET',

                url: url + '/addOrderAmount',

                data: { amount: $('#new_payment').val(),orderId:orderId,status:status},

                success: function(data) {
                        window.location.reload()
                }
            });
        }else{
            alert('please add the amount');
        }
    }
    function assignOrder(orderId,agentid) {
        $.ajax({

            type: 'GET',

            url: url + '/assignOrderTo',

            data: {orderId:orderId,agentId:agentid},

            success: function(data) {
                window.location.reload()
            }
        });
    }
    function onStatusChange(orderId,statusId) {
        let receiveAmount = $('#rcprice').val()
        let totalAmount = $('#totalprice').val()
        if(statusId == 2){
            if(receiveAmount !=totalAmount){
                alert('Your payment is not complete you can not change the status ..');
                return false;
            }else{
                statuChange(orderId,statusId);
            }
        }else{
            statuChange(orderId,statusId);
        }
    }
    function statuChange(orderId,statusId) {
        $.ajax({

            type: 'GET',

            url: url + '/changeStatus',

            data: {orderId:orderId,statusId:statusId},

            success: function(data) {
                window.location.reload()
            }
        });
    }
</script>

@endsection