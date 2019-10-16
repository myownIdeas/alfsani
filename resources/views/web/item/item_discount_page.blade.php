@extends('include.layout')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <section class="sub-header">
        <div class="container-fluid">
            <div class="subheader-main">
                <h2>Dashboard</h2>
                <div class="breadcrumb-link ml-3">
                    <a href="#"><i class="far fa-envelope"></i> Item Discount Page</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        {{Form::open(array('url'=> 'insert/item/discount','method'=>'POST','enctype'=>"multipart/form-data"))}}
        <div class="card">
            <div class="card-header">Add Item Discount</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Select Shop</label>

                    <select name="shop_id" id="shop_id"  class="form-control">
                        <option value="0">Please Select Parent Category</option>
                        @foreach($response['data']['shopes'] as $shop)
                            <option value="{{$shop->id}}">{{$shop->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Select Company</label>

                    <select name="company_id" id="company_id" onchange="getSubCategories(this.value,'sub_model')" class="form-control">
                        <option value="0">Please Select Parent Category</option>
                        @foreach($response['data']['companies'] as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <label for="">Select First Model</label>
                    <select name="model_id" onchange="getSubCategories(this.value,'sec_model')" id="sub_model" class="form-control">
                    </select>


                </div>
                <div class="form-group row">

                    <label for="">Select Second Model</label>
                    <select name="model_id" onchange="getSubCategories(this.value,'third_model')" id="sec_model" class="form-control">
                    </select>


                </div>
                <div class="form-group row">
                    <label for="">Select Third Model</label>
                    <select name="model_id" onchange="getSubCategories(this.value,'forth_model')" id="third_model" class="form-control">
                    </select>
                </div>
                <div class="col-12">
                    <label for="">Search Item</label>
                    <input type="text" class="form-control srchItem" onkeyup="searchItemForDiscount(this.value,0)">
                    <div>
                        <ul id="appendItemsForDiscount">

                        </ul>
                    </div>
                    <div>
                        <ul id="add_more_itmes_discount">

                        </ul>
                    </div>
                </div>
                <button type="submit" style="display:none" class="btn btn-primary submitbtn">ADD Item Discount</button>

                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection

<script>
    function searchItemForDiscount(value){

        var model = $('#third_model').val();
        var companyId = $('#company_id').val();
        $.ajax({

            type:'GET',

            url:url+'/getItemsForDiscount',

            data:{model:model,value:value,companyId:companyId},

            success:function(data){
                var items =  JSON.parse(data);

                var html = '';
                $.each(items, function(index, item){
                    html +='<a href="javascript:void(0);"><li onclick="addItemInDiscount('+item.id+','+"'"+item.name+"'"+')">'+item.name+'</li></a>'
                });
               // console.log(html);
                $('#appendItemsForDiscount').empty();

                $('#appendItemsForDiscount').append(html);
            }
        });
    }
    function addItemInDiscount(id,name,condition = null){
        $.ajax({

            type:'GET',

            url:url+'/checkItemCondition',

            data:{itemId:id,shop_id:$('#shop_id').val(),},

            success:function(data) {
                var conditoin =  JSON.parse(data);
                if (conditoin.res) {
                    $('#appendItemsForDiscount').empty();
                    $('#add_more_itmes_discount').append(
                        '<div class="col-4">' +
                        '<label for="">Item Name :</label>' +
                        '<span>' + name + '</span>' +
                        '<input type="hidden" required class="form-control" id="item_id" value="' + id + '" name="itemId[]">' +
                        '</div>' +

                        '<div class="col-4">' +
                        '<label for="">Discount Price</label>' +
                        '<input type="text" name="item_discount[]" id="item_discount" required  class="form-control">' +
                        '</div>'
                    );
                    $('.srchItem').val('');
                    $('.submitbtn').show();
                }else{
                    alert('this item already added please add new one ');
                }
            }
        });

    }
</script>
