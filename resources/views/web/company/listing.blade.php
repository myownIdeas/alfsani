@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-link ml-3">
                        <a href="#"><i class="far fa-envelope"></i> Company Listing</a>
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
                        <th>Item Name</th>
                        <th>Sub Category</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['companies'] as $company)
                    <tr>

                        <td>{{$company->name}}</td>
                        <td><a href="#" onclick="getSubModels({{$company->id}})">Sub Categories</a> </td>
                        <td>{{$company->created_at}}</td>
                        <td>
                            <a class="btn btn-info" href="{{URL::to('edit_company').'?company_id='.$company->id}}">Update</a>
                           {{-- <a class="btn btn-info"href="{{URL::to('delete_item').'?item_id='.$item->id}}" onclick="return confirm('Are you sure?')">Update</a>--}}

                        </td>
                    </tr>
                  @endforeach

                    </tbody>

                </table>
                </div>
            </div>

        </div>
        <div class="modal fade" id="sub_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sub Model</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row  mb-3" id="company_sub_model">


                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
@endsection