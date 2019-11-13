@extends('include.layout')
@section('content')



        <section class="sub-header">
            <div class="container-fluid">
                <div class="subheader-main">
                    <h2>Items</h2>
                </div>
            </div>
        </section>
        
        <div class="container-fluid">
            <div class="content-box">
                <a href="{{URL::to('add_item_discount')}}" class="btn btn-dark btn-sm float-right">Add Discount</a>
                <h4 class="h4">Items Discount List</h4>
                <hr>
                <div class="cst-table-row">
                <table id="example" class="table listing-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Shop Name</th>
                        <th>Company Name</th>
                        <th>First Model Name </th>
                        <th>Second Model Name </th>
                        <th>Third Model Name </th>
                        <th>Items </th>
                        <th>Discount</th>
                        <th>Date</th>
                        {{--<th>Action</th>--}}

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($response['data']['modelWithItems'] as $modelItem)
                    <tr>

                        <td>{{$modelItem->shopName}}</td>
                        <td>{{$modelItem->name}}</td>
                        <td>{{$modelItem->fName}} </td>
                        <td>{{$modelItem->sName}} </td>
                        <td>{{$modelItem->tName}} </td>
                        <td>{{$modelItem->itemName}} </td>
                        <td id="newDiscount{{$modelItem->itemId}}">
                            {{$modelItem->discount_rate}}
                            <a href="javascript:void(0)" onclick="showTextBox({{$modelItem->itemId}})">Edit Discount</a>
                            <div id="showModel{{$modelItem->itemId}}" style="display: none">
                            <input type="text" id="discount{{$modelItem->itemId}}"   >
                            <a href="javascript:void(0)" onclick="updateDiscount({{$modelItem->itemId}})">Submit</a>
                            </div>
                        </td>
                        <td>{{$modelItem->created_at}}</td>
                        {{--<td><a href="{{URL::to('edit_discount_item/'.$modelItem->itemId.'')}}">Edit</a> </td>--}}

                    </tr>
                  @endforeach

                    </tbody>

                </table>
                </div>
            </div>

        </div>

        <div class="modal" tabindex="-1" role="dialog" id="compny_listing">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <ul id="prtItem">

                        </ul>
                    </div>

                </div>
            </div>
        </div>
<script>
    function updateDiscount(discountId) {
        var discountRate = $('#discount'+discountId).val();
        $.ajax({

            type: 'GET',

            url: url + '/edit_discount_item',

            data: { id: discountId ,discountRate:discountRate},

            success: function(data) {
                if(data == 'true'){
                    $('#showModel'+discountId).hide();
                    $('#newDiscount'+discountId).text(discountRate);

                }

            }
        });
    }
    function showTextBox(id) {
        $('#showModel'+id).show();
    }
</script>

@endsection