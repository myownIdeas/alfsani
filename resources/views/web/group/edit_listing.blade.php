@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Group</h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <h4 class="h4">Edit Group</h4>
                <hr>
                <table id="example" class="table listing-table">
                    <thead>
                    <tr>
                        <th>City Name</th>
                        <th>Group Creater</th>
                        <th>Group For</th>
                        <th>Time</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['groups'] as $group)
                    <tr>
                        <td> <a href="{{URL::to('edit_group_detail').'?edit_group_id='.$group->id}}">{{$group->name}} </a></td>
                        <td>{{$group->owner->name}}</td>
                        <td>{{$group->userFor->name}}</td>
                        <td>{{$group->created_at}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{URL::to('edit_group_detail').'?edit_group_id='.$group->id}}"><i class="fas fa-pencil-alt"></i></a></td>
                    </tr>
                  @endforeach

                    </tbody>

                </table>
            </div>

        </div>




@endsection