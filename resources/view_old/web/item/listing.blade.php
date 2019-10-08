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
                <table id="example" class="table table-striped table-bordered listing-table" style="width:100%">
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
                        <td><a href="#" onclick="showItems()"> show Items</a></td>
                        <td>{{$modelItem->created_at}}</td>

                    </tr>
                  @endforeach

                    </tbody>

                </table>
            </div>

        </div>




@endsection