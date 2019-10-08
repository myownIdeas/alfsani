@extends('backend')
@section('content')

    <div class="content">
        <div class="content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Tables</a></li>
                    <li><a>Data-table</a></li>
                </ul>
            </div>
        </div>
        <div class="row animated fadeInRight">
            <div class="col-sm-12">
                <h4 class="section-subtitle"><b>School Listing</b></h4>
                <div class="panel">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table class="datatable mdl-data-table dataTable" cellspacing="0"
                                   width="100%" role="grid" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>View</th>
                                    <th>Description</th>
                                    <th>Meta Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax:"news-listing",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'name'},
                    {data: 'views', name: 'address'},
                    {data: 'description', name: 'phone'},
                    {data: 'meta_title', name: 'official_email'},
                    {data: 'is_active', name: 'views'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection