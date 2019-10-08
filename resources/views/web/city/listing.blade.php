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
                        <th>City Name</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['cities'] as $city)
                    <tr>

                        <td>{{$city->name}}</td>
                        <td>{{$city->Country->name}}</td>
                        <td>
                            <div class="action-btn">
                            <a class="btn btn-info" href="{{URL::to('edit_city').'?city_id='.$city->id}}">Update</i></a>
                            <a class="btn btn-danger" href="{{URL::to('delete_city').'?city_id='.$city->id}}" onclick="return confirm('Are you sure?')">Delete</a>
</div>
                        </td>
                    </tr>
                  @endforeach

                    </tbody>

                </table>
            </div>
            </div>

        </div>




@endsection