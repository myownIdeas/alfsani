@extends('include.layout')
@section('content')

    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Dashboard</h2>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        @foreach($response['data']['records'] as $reports)
        <div class="row">
            @foreach($reports as $key=>$report)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="pb-1">
                                <div class="total-pr">
                                    <i class="far fa-star  font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 info float-right">{{$report}}</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">{{$key}}</span>
                                    {{--<span class="info float-right"><i class="ft-arrow-up info"></i> 2.89%</span>--}}
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        @endforeach

        <?php /* 
        @foreach($response['data']['records'] as $reports)
    <div class="card">
    <div class="card-content">
        <div class="card-body">

            <div class="row">
                @foreach($reports as $key=>$report)
                <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="pb-1">
                        <div class="total-pr">
                            <i class="far fa-star  font-large-1 blue-grey float-left mt-1"></i>
                            <span class="font-large-2 text-bold-300 info float-right">{{$report}}</span>
                        </div>
                        <div class="clearfix">
                            <span class="text-muted">{{$key}}</span>
                            {{--<span class="info float-right"><i class="ft-arrow-up info"></i> 2.89%</span>--}}
                        </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
        <br />
        @endforeach
        */?>
</div>

{{--<div class="row">
<div class="col-xl-6 col-lg-6 col-md-12">
<div class="card">
    <div class="card-content">
        <div class="card-body sales-growth-chart">
           <canvas id="myChart"  height="300"></canvas>
        </div>
    </div>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-12">
<div class="card">
    <div class="card-header">
       Ongoing Projects
    </div>
    <div class="card-content">
        <div class="card-body">
            <p class="m-0">Total ongoing projects 6<span class="float-right"><a href="#" target="_blank">Project Summary <i class="ft-arrow-right"></i></a></span></p>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Owner</th>
                        <th>Priority</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-truncate">ReactJS App</td>
                        <td class="text-truncate">
                           </span> <span>Sarah W.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-success">Low</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">Fitness App</td>
                        <td class="text-truncate">
                            </span> <span>Edward C.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-warning">Medium</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">SOU plugin</td>
                        <td class="text-truncate">
                           </span> <span>Carol E.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-danger">Critical</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">Android App</td>
                        <td class="text-truncate">
                           </span> <span>Gregory L.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-success">Low</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">ABC Inc. UI/UX</td>
                        <td class="text-truncate">
                          </span> <span>Susan S.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-warning">Medium</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">Product UI</td>
                        <td class="text-truncate">
                         <span>Walter K.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-danger">Critical</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                      <tr>
                        <td class="text-truncate">ReactJS App</td>
                        <td class="text-truncate">
                           </span> <span>Sarah W.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-success">Low</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">Fitness App</td>
                        <td class="text-truncate">
                            </span> <span>Edward C.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-warning">Medium</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">SOU plugin</td>
                        <td class="text-truncate">
                           </span> <span>Carol E.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-danger">Critical</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">Android App</td>
                        <td class="text-truncate">
                           </span> <span>Gregory L.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-success">Low</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">ABC Inc. UI/UX</td>
                        <td class="text-truncate">
                          </span> <span>Susan S.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-warning">Medium</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate">Product UI</td>
                        <td class="text-truncate">
                         <span>Walter K.</span>
                        </td>
                        <td class="text-truncate"><span class="tag tag-danger">Critical</span></td>
                        <td class="valign-middle">
                            <div class="progress m-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>--}}
@endsection
