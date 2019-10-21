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
                <h4 class="h4">Deleted Users</h4>
                <hr>
                <div class="cst-table-row">
                <table id="example" class="table  listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Stauts</th>

                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['users'] as $user)
                    <tr>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>Delete</td>

                        <td>
                            <div class="action-btn">
                            <a class="btn btn-success" href="{{URL::to('active_delete_user').'?user_id='.$user->id}}">Active</a>
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