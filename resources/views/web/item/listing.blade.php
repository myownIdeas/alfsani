@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Items</h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <h4 class="h4">Items List</h4>
                <hr>
                <div class="cst-table-row">
                <table id="example" class="table listing-table">
                    <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>First Model Name </th>
                        <th>Second Model Name </th>
                        <th>Third Model Name </th>
                        <th>Items </th>
                        <th>purchase Price </th>
                        <th>Sale Price </th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['modelWithItems'] as $modelItem)
                    <tr>

                        <td>{{$modelItem->name}}</td>
                        <td>{{$modelItem->fName}} </td>
                        <td>{{$modelItem->sName}} </td>
                        <td>{{$modelItem->tName}} </td>
                        <td>{{$modelItem->tName}} </td>
                        <td>{{$modelItem->purchase_price}} </td>
                        <td>{{$modelItem->price}} </td>
                        <td>{{$modelItem->created_at}}</td>
                        <td><a href="#" class="btn btn-success btn-sm" onclick="showItems({{$modelItem->third_model.','.$modelItem->company_id}})"><i class="fa fa-eye"></i></a></td>
                    </tr>
                  @endforeach

                    </tbody>

                </table>
                </div>
            </div>

        </div>

        <div class="modal" tabindex="-1" role="dialog" id="compny_listing">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <ul id="prtItem">

                        </ul>
                    </div>

                </div>
            </div>
        </div>


@endsection