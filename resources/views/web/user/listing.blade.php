@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Users</h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <h4 class="h4">Users List</h4>
                <hr>
                <div class="cst-table-row">
                <table id="example" class="table  listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="120">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['users'] as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="">
                            <a class="btn btn-primary btn-sm" href="{{URL::to('edit_user').'?user_id='.$user->id}}"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-sm" href="{{URL::to('delete_user').'?user_id='.$user->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
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