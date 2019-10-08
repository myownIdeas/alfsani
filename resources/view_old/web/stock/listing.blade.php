@extends('include.layout')
@section('content')
    <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> Stock Listing</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <table id="example" class="table table-striped table-bordered listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>shop Name</th>
                        <th>Company Name</th>
                        <th>First Modle</th>
                        <th>Second Modle</th>
                        <th>Third Modle</th>
                        <th>Item</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['stocks'] as $stock)
                    <tr>
                        <td> {{ $stock->shop->name }}      </td>
                        <td> {{ $stock->company_Id->name }}   </td>
                        <td> {{ $stock->firstModel->name }}   </td>
                        <td> {{ $stock->secondModel->name }}   </td>
                        <td> {{ $stock->thirdModel->name }}   </td>
                        <td> {{ $stock->item->item }}   </td>
                        <td> <a href="">Update /</a><a href="">Delete</a>   </td>

                    </tr>
                  @endforeach

                    </tbody>

                </table>
            </div>

        </div>




@endsection