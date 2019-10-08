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
        <table id="example" class="table table-striped table-bordered listing-table" style="width:100%">
            <thead>
            <tr>
                <th>Shop Name</th>
                <th>Owner Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>City</th>
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
                <td>
                    <a href="{{URL::to('edit_shop').'?shop_id='.$shope->id}}"><i class="fas fa-edit"></i></a>

                    <a href="{{URL::to('delete').'?shop_id='.$shope->id}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>

                    <a href="{{URL::to('edit_shop').'?shop_id='.$shope->id}}"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            @endforeach


            </tbody>

        </table>
    </div>

</div>
@endsection
		