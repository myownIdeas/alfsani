@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> Items Listing</a>
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
                        <th>Company Name</th>
                        <th>First Model Name </th>
                        <th>Second Model Name </th>
                        <th>Third Model Name </th>
                        <th>Items </th>

                        <th>Date</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['modelWithItems'] as $modelItem)
                    <tr>

                        <td>{{$modelItem->name}}</td>
                        <td>{{$modelItem->fName}} </td>
                        <td>{{$modelItem->sName}} </td>
                        <td>{{$modelItem->tName}} </td>
                        <td><a href="#" onclick="showItems({{$modelItem->third_model.','.$modelItem->company_id}})"> show Items</a></td>
                        <td>{{$modelItem->created_at}}</td>

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