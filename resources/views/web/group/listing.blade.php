@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> Group Listing</a>
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
                        <th>Group Creater</th>
                        <th>Group For</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['groups'] as $group)
                    <tr>
                        <td> <a href="{{URL::to('group_detail').'?group_id='.$group->id}}">{{$group->name}} </a></td>
                        <td>{{$group->owner->name}}</td>
                        <td>{{$group->userFor->name}}</td>
                        <td>{{$group->created_at}}</td>
                    </tr>
                  @endforeach

                    </tbody>

                </table>
            </div>
</div>
        </div>




@endsection