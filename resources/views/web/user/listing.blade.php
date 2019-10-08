@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> User Listing</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <div class="cst-table-row">
                <table id="example" class="table  listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['users'] as $user)
                    <tr>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td>
                            <div class="action-btn">
                            <a class="btn btn-success" href="{{URL::to('edit_user').'?user_id='.$user->id}}">Update</a>
                            <a class="btn btn-danger" href="{{URL::to('delete_user').'?user_id='.$user->id}}" onclick="return confirm('Are you sure?')">Delete</a>
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