@extends('include.layout')
@section('content')

<section class="sub-header">
    <div class="container-fluid">
        <div class="subheader-main">
            <h2>Dashboard</h2>
            <div class="breadcrumb-link ml-3">
                <a href="#"><i class="far fa-envelope"></i> Shop Listing</a>
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
                <th>Owner Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>City</th>
                <th>Work Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($response['data']['shopes'] as $shope)
            <tr>
                <td>{{$shope->name}}</td>
                <td>{{$shope->person_name}}</td>
                <td>{{$shope->address}}</td>
                <td>{{$shope->mobile}}</td>
                <td>{{$shope->city->name}}</td>
                <td>{{$shope->work_type}}</td>
                <td>
                    <div class="action-btn">
                    <a class="btn btn-success" href="{{URL::to('edit_shop').'?shop_id='.$shope->id}}">Edit</a>

                    <a class="btn btn-danger"href="{{URL::to('delete').'?shop_id='.$shope->id}}" onclick="return confirm('Are you sure?')">Delete</a>

                    <a class="btn btn-info" href="{{URL::to('edit_shop').'?shop_id='.$shope->id}}">Update</a>
                    </div>
                </td>
            </tr>
            @endforeach


            </tbody>

        </table>>
    </div></div>

</div>
@endsection
		