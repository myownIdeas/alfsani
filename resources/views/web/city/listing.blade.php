@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>City</h2>
                 </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="content-box">
                <h4 class="h4">Cities List</h4>
                <hr>
                <div class="cst-table-row">
                <table id="example" class="table listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>City Name</th>
                        <th>Country</th>
                        <th width="120">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['cities'] as $city)
                    <tr>

                        <td>{{$city->name}}</td>
                        <td>{{$city->Country->name}}</td>
                        <td>
                            <div class="">
                            <a class="btn btn-primary btn-sm" href="{{URL::to('edit_city').'?city_id='.$city->id}}"><i class="fas fa-pencil-alt"></i></i></a>
                            <a class="btn btn-danger btn-sm" href="{{URL::to('delete_city').'?city_id='.$city->id}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
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