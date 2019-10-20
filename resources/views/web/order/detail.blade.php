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
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <select name="" id="" class="form-control">
                                        <option value="">1</option>
                                        <option value="">1</option>
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <select name="" id="" class="form-control">
                                        <option value="">1</option>
                                        <option value="">1</option>
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <select name="" id="" class="form-control">
                                        <option value="">1</option>
                                        <option value="">1</option>
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary btn-sm float-right mt-2" data-toggle="modal" data-target="#addEditModal"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>Amount</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalPrice = 0 ?>
                            <!-- @foreach($response['data']['orderDetail'] as $detail)
                            <span class="d-none">{{$totalPrice = $totalPrice + ($detail->quantity *$detail->line_price)}}</span>
                            <tr>
                                <td>{{$detail->companyId->name}}</td>
                                <td>{{$detail->firstModel->name}}</td>
                                <td>{{$detail->secondModel->name}}</td>
                                <td>{{$detail->thirdModel->name}}</td>
                                <td>{{$detail->thirdModel->year}}</td>
                                <td>{{$detail->item->item}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>{{($detail->quantity * $detail->line_price)}}</td>
                                <td>
                                    <a href="" class="btn-link"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach -->
                            <tr>
                                <td>TOYOTA</td>
                                <td>COROLLA</td>
                                <td>XLi VVTi</td>
                                <td>1299 cc </td>
                                <td>2014_2019</td>
                                <td>door trim chrome</td>
                                <td>2</td>
                                <td>500</td>
                                <td class="text-center">
                                    <a href="" class="btn-link" data-toggle="modal" data-target="#addEditModal"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav class="d-flex justify-content-end">
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
                    </nav>
                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-lg-4">
                            <table class="table border bg-light mt-5">
                                <tr>
                                    <td><strong>Sub Total</strong></td>
                                    <td class="text-right">650</td>
                                </tr>
                                <tr>
                                    <td><strong>Discount</strong></td>
                                    <td class="text-right">100</td>
                                </tr>
                                <tr>
                                    <td><strong>TAX</strong></td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><span class="kt-invoice__price">Rs {{$totalPrice}}</span></td>
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


@endsection