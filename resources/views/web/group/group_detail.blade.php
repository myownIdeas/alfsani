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
            <h4 class="h4">Group Info</h4>
            <hr>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Created Date:</label>
                        {{$response['data']['group']->created_at}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Created Admin:</label>
                        {{$response['data']['group']->owner->name}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Group User:</label>
                        {{$response['data']['group']->userFor->name}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Group Category:</label>
                        {{$response['data']['group']->name}}
                    </div>
                </div>
            </div>
            <table class="table listing-table mt-4">
                <thead>
                    <tr>
                        <td colspan="3" class="font-weight-bold">Manage Shops</td>

                    </tr>
                </thead>
                <tbody>
                @foreach($response['data']['group']->groupDetail as $key=>$detail)
                    <tr>
                        <th>{{$detail->getShop->name}}</th>
                        <th>{{$detail->getShop->mobile}}</th>
                        <th id="th_id{{$key}}">
                            <a href="javascript:void(0)" onclick="showReminderText({{$key}})">Reminder</a>
                        <div id="main{{$key}}" style="display: none">
                        <input type="text" name="reminder" id="reminder{{$key}}" >
                        <a href="javascript:void(0)" onclick="updateReminder({{$key}},{{$detail->getShop->id}})">Update</a>
                        </div>
                        </th>
                        <th>
                            {{$detail->getShop->reminder}}
                        </th>
                        <th class="text-center"><a href="{{URL::to('/get_order_page?shop_id='.$detail->getShop->id.'&group_id='.$response['data']['group']->id)}}" class="btn btn-info btn-sm">Make Order</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>

    </div>
<script>
    function showReminderText(id) {
        $('#main'+id).show();
    }
    function updateReminder(id,shopId) {
        var reminder = $('#reminder'+id).val();
        $.ajax({

            type: 'GET',

            url: url + '/updateReminderForShop',

            data: {reminder:reminder,shopId:shopId},

            success: function(data) {
                $('#main'+id).hide();
                $('#th_id'+id).text(reminder);
            }
        });
    }
</script>

@endsection