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
                <div class="cst-table-row">
                <table id="example" class="table listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>shop Name</th>
                        <th>Company Name</th>
                        <th>First Modle</th>
                        <th>Second Modle</th>
                        <th>Third Modle</th>
                        <th>Item</th>
                        <th>Type</th>
                        <th>Date/Time</th>
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
                        <td> {{ $stock->item_type }}   </td>
                        <td> {{ $stock->thirdModel->created_at }}   </td>
                        <td>
                            
                            <div class="action-btn"> 
                            <a href="{{URL::to('update/stock/'.$stock->id)}}" class="btn btn-info">Update</a>
                            <a class="btn btn-danger" href="{{URL::to('delete/stock/'.$stock->id)}}" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>  </div> </td>

                    </tr>
                  @endforeach

                    </tbody>

                </table>
            </div>
            </div>

        </div>




@endsection