var url = mainUrl;
var counter = 1;
var mainModel = 25;
$(document).ready(function() {

    $(".year-listing li a").click(function() {
        $(".make-listing").show();
        $(".version-listing").hide();
        $(".model-listing").hide();
        $(".done").hide();
    })

    $(".make-listing li a").click(function() {
        $(".model-listing").show();
        $(".done").hide();
        $(".version-listing").hide();
    })

    $(".model-listing li a").click(function() {
        $(".version-listing").show();
        $(".done").hide();
    })


    $(".version-listing li a").click(function() {
        $(".done").show();
    })
    $('#sidebarCollapse').on('click', function() {
        $('.sidebar').toggleClass('active');
        $(this).toggleClass('active');
        $(".content").toggleClass('active');

    });


    $('.sidebar ul li a').click(function() {
        $('ul li.active').removeClass('active');
        $(this).closest('li').addClass('active');
    });


    $('#example').DataTable({
        responsive: true
    });

    $(".more_info").click(function() {
        event.preventDefault();
        $(".more_mobile").append(
            '<div class="mobile_field card-gray mb-4">' +
            '<div class="row">' +
            '<div class="col-sm-6 col-md-4 col-lg-3">' +
            '<div class="form-group">' +
            '<label>Person Name</label>' +
            '<input type="text" name="ext_name[]" required class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-6 col-md-4 col-lg-3">' +
            '<div class="form-group">' +
            '<label>Mobile</label>' +
            '<input type="text" name="ext_mobile[]" required class="form-control">' +
            '</div></div>' +
            '<div class="col-sm-6 col-md-4 col-lg-3">' +
            '<div class="form-group">' +
            '<label>WhatApp</label>' +
            '<input type="text" name="ext_whats_app[]" required class="form-control">' +
            '</div></div>' +
            '<div class="col-sm-6 col-md-4 col-lg-3">' +
            '<div class="form-group">' +
            '<label>Email</label>' +
            '<input type="email" name="ext_email[]" required class="form-control">' +
            '</div></div>' +
            '<div class="col-sm-12 text-right">' +
            '<span class="delete_mob">' +
            '<button class="btn btn-sm btn-danger">Delete</button>' +
            '</span>' +
            '</div> ' +
            '</div>' +
            '</div>'
        );
    });

});

function getSubCategories(itemId, append_where) {

    $.ajax({

        type: 'GET',

        url: url + '/subCat_listing',

        data: { itemId: itemId },

        success: function(data) {

            var models = JSON.parse(data);
            $('#' + append_where).empty();
            var html = '';
            html += '<option value="">Please Select Model</option>';
            $.each(models, function(i, model) {
                html += '<option value="' + model.id + '">' + model.name + "  => " + model.year + '</option>'
            });
            $('#' + append_where).append(
                html
            )
        }
    });
}

function getItems(itemId, id) {

    $.ajax({

        type: 'GET',

        url: url + '/get_items',

        data: { model: itemId },

        success: function(data) {
            var models = JSON.parse(data);
            $('#' + id).empty();
            var html = '';
            $.each(models, function(i, model) {
                i = ++mainModel;
                html += '<li><a href="javascript:void(0)" onclick="showBoxForItem(' + i + ')">' + model.name + '</i></a></li>';
                html += '<div style="display:none" id="itemBox' + i + '"><input type="text" id="md' + i + '"> <a href="javascript:void(0)" onclick="updateModelItems(' + model.id + ',' + i + ')">update</a></div>';
            });
            //console.log(html);
            $('#' + id).append(
                html
            );
            $('#' + id).show();

        }

    });
}

function showBoxForItem(id) {
    $('#itemBox' + id).show();
}

function updateModelItems(itemId, id) {
    var name = $('#md' + id).val();

    $.ajax({
        type: 'GET',
        url: url + '/updateModelItems',
        data: { itemId: itemId, name: name },
        success: function(data) {
            window.location.reload();
        }
    })
}

function getSubModelsForList(itemId, id) {
    var scnd = '';
    if (id == 'first_md_ls') {
        scnd = 'second_md_ls';
    } else if (id == 'second_md_ls') {

        scnd = 'third_md_ls';
    } else if (id == 'third_md_ls') {
        scnd = 'item';
    }
    var trhd = 'third_md_ls';
    $.ajax({

        type: 'GET',

        url: url + '/subCat_listing',

        data: { itemId: itemId, scnd: scnd },

        success: function(data) {

            var models = JSON.parse(data);
            $('#' + id).empty();
            var html = '';

            if (scnd == 'third_md_ls') {
                var counterIndex = 0;
                $.each(models, function(index, model) {
                    html += '<span><b>' + index + '</b></span>';
                    $.each(model, function(subindex, submodel) {
                        html += '<li><a href="javascript:void(0)" onclick="getSubModelsForList(' + submodel.id + ',' + "'" + scnd + "'" + ')">' + submodel.name + ' <a class="text-right"href="javascript:void(0)" onclick="showModel(' + subindex + ',' + "'" + counterIndex + "'" + ')">Edit</a>/<a class="text-right"href="javascript:void(0)" onclick="deleteModel(' + submodel.id + ')">Delete</a></a></li>';
                        html += '<div style="display:none" id="' + counterIndex + subindex + '"><div class="input-group"><input class="form-control" type="text" id="md' + counterIndex + '"> <div class="input-group-prepend"><a class="btn btn-info" href="javascript:void(0)" onclick="updateMyModel(' + submodel.id + ',' + counterIndex + ',' + "'" + id + "'" + ')">update</a></div></div></div>';
                    });
                    counterIndex++;
                });
            } else {
                $.each(models, function(i, model) {
                    i = ++mainModel;
                    if (id == 'third_md_ls') {

                        html += '<li><a href="javascript:void(0)" onclick="getItems(' + model.id + ',' + "'" + 'main_item' + "'" + ')">' + model.name + ' <a href="javascript:void(0)" onclick="showModel(' + i + ',' + "'" + trhd + "'" + ')">Edit</a></a></li> ';
                        html += '<div style="display:none" id="' + trhd + i + '"><div class="input-group"><input class="form-control" type="text" id="md' + i + '"><div class="input-group-prepend"><a class="btn btn-info"href="javascript:void(0)" onclick="updateMyModel(' + model.id + ',' + i + ',' + "'" + trhd + "'" + ')">update</a></div></div></div>';
                    } else {
                        html += '<li><a href="javascript:void(0)" onclick="getSubModelsForList(' + model.id + ',' + "'" + scnd + "'" + ')">' + model.name + ' <a class="text-right"href="javascript:void(0)" onclick="showModel(' + i + ',' + "'" + id + "'" + ')">Edit</a></a></li>';
                        html += '<div style="display:none" id="' + id + i + '"><div class="input-group"><input class="form-control" type="text" id="md' + i + '"> <div class="input-group-prepend"><a class="btn btn-info" href="javascript:void(0)" onclick="updateMyModel(' + model.id + ',' + i + ',' + "'" + id + "'" + ')">update</a></div></div></div>';
                    }

                });
            }

            $('#' + id).append(
                html
            )
            $('#' + id).show();

        }

    });
}

function deleteModel(id) {
    $.ajax({
        type: 'GET',
        url: url + '/deleteModel',
        data: { modelId: id },
        success: function(data) {
            window.location.reload();
        }
    })
}

function updateMyModel(modelId, condition) {
    var name = $('#md' + condition).val();

    $.ajax({
        type: 'GET',
        url: url + '/updateModel',
        data: { modelId: modelId, name: name },
        success: function(data) {
            window.location.reload();
        }
    })
}

function showModel(val, id) {
    $('#' + id + val).show();
}

function getSubModels(itemId) {
    $.ajax({

        type: 'GET',

        url: url + '/subCat_listing',

        data: { itemId: itemId },

        success: function(data) {

            var models = JSON.parse(data);
            $('#company_sub_model').empty();
            $('#sub_model').modal('show');
            $('.modal-backdrop').hide();
            var html = '';
            $.each(models, function(i, model) {
                html += '<div class="form-group col-4 mb-0">' +
                    '<input type="text" class="form-control" value="' + model.name + '">' +
                    '</div>'

            });
            console.log(html);
            $('#company_sub_model').append(html);
        }

    });
}

function insertModel(selectBox, model, appendWhere) {
    var model = $('#' + model).val();
    var selectBox = $('#' + selectBox).val();
    var from = $('#from').val();
    var toyear = $('#to').val();
    if (validation(appendWhere)) {
        $.ajax({

            type: 'GET',

            url: url + '/insert_model',

            data: { selectBox: selectBox, model: model, from: from, to: toyear },

            success: function(data) {

                var models = JSON.parse(data);
                $('#' + appendWhere).empty();
                var html = '';
                html += '<option value="">Please Select Model</option>';
                $.each(models, function(i, model) {
                    html += '<option value="' + model.id + '">' + model.name + '</option>'
                });
                $('#' + appendWhere).append(
                    html
                )
            }

        });
    }

}

function validation(appendWhere) {
    if (appendWhere == 'sec_model' || appendWhere == 'third_model') {
        if ($('#from').val() == "") {
            alert('please Add From Year');
            return false;
        }
        if ($('#to').val() == "") {
            alert('please Add To Year');
            return false;
        }
        return true;
    }
    return true;
}

function appendMoreItem() {
    $('#add_more_itmes').append(
        '<div class="row">' +
        '<div class="col-col-md-6">' +
        '<div class="form-group">' +
        '<label>Add Item</label>' +
        '<input type="text" required class="form-control" name="itemName[]">' +
        '</div>' +
        '</div>' +
        '<div class="col-col-md-6">' +
        '<div class="form-group">' +
        '<label>Per Peace Price</label>' +
        '<input type="number" required class="form-control" name="itemPrice[]">' +
        '</div>' +
        '</div>' +
        '</div>'
    )
}

function showSecondOption(conditon, value) {
    $.ajax({

        type: 'GET',

        url: url + '/subCat_listing',

        data: { itemId: value },

        success: function(data) {
            console.log(data);
        }

    });
}

function showItems(thirdModel, companyId) {
    $.ajax({

        type: 'GET',

        url: url + '/getCompanyItemListing',

        data: { thirdModel: thirdModel, companyId: companyId },

        success: function(data) {
            var html = '';
            var models = JSON.parse(data);

            if (models.res == 'false') {
                swal({
                    title: "No Item Found For This!",
                    text: "Please add the items!",
                    icon: "warning",
                });
            } else {
                $('#prtItem').empty();
                $.each(models, function(i, model) {
                    html += '<li <a href="javascript:void(0);">' + model.name + '</a></li>'


                });

                $('#prtItem').append(html);
                $('#compny_listing').modal('show');
            }

        }

    });
}

function autoSearch(itemId) {
    $.ajax({

        type: 'GET',

        url: url + '/search/autocomplete',

        data: { itemId: itemId },

        success: function(data) {

            var models = JSON.parse(data);

            $('#company_sub_model').empty();

            var html = '';
            $.each(models, function(i, model) {
                html += '<li onclick="appendLiResult(' + model.id + ')"><a href="javascript:void(0);">' + model.value + '</a></li>'


            });
            $('#results').empty();
            $('#results').append(html);

        }

    });
}

function appendLiResult(shopid) {

    var group_id = $('#group_id').val();

    $.ajax({

        type: 'GET',

        url: url + '/add_shop_into_group',

        data: { groupId: group_id, shopid: shopid },

        success: function(data) {

            window.location.reload();
            $('#results').hide();
        }

    });

}

function searchItem(value, myindex, update) {

    var model = $('#third_model' + myindex).val();
    var companyId = $('#company_id' + myindex).val();
    $.ajax({

        type: 'GET',

        url: url + '/getItems',

        data: { model: model, value: value },

        success: function(data) {
            var items = JSON.parse(data);
            var html = '';
            $.each(items, function(index, item) {
                html += '<a href="javascript:void(0);"><li onclick="addItemInOrder(' + item.id + ',' + "'" + item.name + "'" + ',' + "'" + item.price + "'" + ',' + myindex + ',' + model + ',' + "'" + update + "'" + ')">' + item.name + '</li></a>'
            });

            $('#appendItemsHere' + myindex).empty();

            $('#appendItemsHere' + myindex).append(html);
        }
    });
}

function addItemInOrder(id, name, price, index, model, condition = null) {
    $('#appendItemsHere' + index).empty();
    var myindx = $('.price').length;

    $('#add_more_itmes' + index).append(
        '<div class="bg-white px-4 pt-4 pb-2 border mb-2">' +
        '<div class="row">' +
        '<div class="col-col-md-6 col-lg-3">' +
        '<div class="form-group">' +
        '<label>Add Item</label>' +
        '<input type="text" required class="form-control" value="' + name + '" name="itemName[]">' +
        '<input type="hidden" required class="form-control" id="item_id' + index + '" value="' + id + '" name="itemId[][' + index + ']">' +
        '</div>' +
        '</div>' +
        '<div class="col-col-md-6 col-lg-3">' +
        '<div class="form-group">' +
        '<label>Manufactured By</label>' +
        '<input type="text" name="item_type[]" id="item_type' + index + '" required  class="form-control">' +
        '</div>' +
        '</div>' +
        '<div class="col-col-md-6 col-lg-3">' +
        '<div class="form-group">' +
        '<label>Piece</label>' +
        '<select name="item_set[]" id="set_pack' + index + '" required class="form-control">' +
        '<option value="peace">Peace</option>' +
        '<option value="set">Set</option>' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-col-md-6 col-lg-3">' +
        '<div class="form-group">' +
        '<label>Quantity</label>' +
        '<input type="text" name="quantity[]" id="qty' + index + '" required onchange="calculatePrice(' + price + ',this.value,' + index + ',' + "'" + condition + "'" + ')" class="form-control">' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<input type="hidden" value="" name="totalPrice[]" class="price" id="price' + myindx + '">' +
        '<input type="hidden" value="" name="linePrice[]"  id="linePrice' + index + '">'
    );



    $('.srchItem').val('');
}

function addOrderForUpdate(index) {

    var companyId = $('#company_id' + index).val();
    var firstModel = $('#sub_model' + index).val();
    var secondModel = $('#sec_model' + index).val();
    var thirdModel = $('#third_model' + index).val();
    var itemId = $('#item_id' + index).val();
    var orderId = $('#orderId').val();
    var quantity = $('#qty' + index).val();
    var linePrice = $('#linePrice' + index).val();
    var set_pack = $('#set_pack' + index).val();
    var token = $('#token').val();

    $.ajax({

        type: 'POST',
        url: url + '/addItemIntoOrder',
        data: { set_pack: set_pack, quantity: quantity, orderId: orderId, linePrice: linePrice, companyId: companyId, firstModel: firstModel, secondModel: secondModel, thirdModel: thirdModel, itemId: itemId, _token: token },
        success: function(data) {
            window.location.reload();
        }
    });
}

function calculatePrice(price, quantity, index, condition = null) {

    var myPrice = 0;

    var calPrice = price * quantity;

    $('#price' + index).val(calPrice);
    $('#linePrice' + index).val(price);

    $('.price').each(function(i, obj) {
        myPrice = myPrice + parseInt($(this).val(), 10);
    });

    $('#top_price').text(myPrice);
    $('#final_amount').val(myPrice);

    if (condition == 'update') {
        addOrderForUpdate(index);
    }
}

function appendMoreOrders() {


    $.ajax({

        type: 'GET',

        url: url + '/getCompanies',

        data: {},

        success: function(data) {
            var items = JSON.parse(data);
            var optionList = '';
            $.each(items, function(index, item) {
                optionList += '<option value="' + item.id + '">' + item.name + '</option>'
            });
            appendOrderHtml(optionList);
        }
    });

}

function updateMoreOrders() {


    $.ajax({

        type: 'GET',

        url: url + '/getCompanies',

        data: {},

        success: function(data) {
            var items = JSON.parse(data);
            var optionList = '';
            $.each(items, function(index, item) {
                optionList += '<option value="' + item.id + '">' + item.name + '</option>'
            });
            updateOrderHtml(optionList, 'update');
        }
    });

}

function updateOrderHtml(optionList, condition) {

    $('#more_order_list').append(


        '<div class="card-gray pb-2 mb-3">' +
        '<div class="row">' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +
        '<label>Select Company</label>' +
        '<select name="company_id[]" id="company_id' + counter + '" onchange="getSubCategories(this.value,' + "'" + 'sub_model' + counter + "'" + ')" class="form-control">' +
        '<option value="0">Please Select Parent Category</option>' +
        optionList +

        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +

        '<label>Select First Model</label>' +
        '<select name="model_id[]" onchange="getSubCategories(this.value,' + "'" + 'sec_model' + counter + "'" + ')" id="sub_model' + counter + '" class="form-control">' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +

        '<label>Select Second Model</label>' +
        '<select name="second_model[]" onchange="getSubCategories(this.value,' + "'" + 'third_model' + counter + "'" + ')" id="sec_model' + counter + '" class="form-control">' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +
        '<label>Select Third Model</label>' +
        '<select name="third_model[]" onchange="getSubCategories(this.value)" id="third_model' + counter + '" class="form-control">' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +
        '<label>Search Item</label>' +
        '<input type="text" required class="form-control" onkeyup="searchItem(this.value,' + counter + ',' + "'" + condition + "'" + ')">' +
        '<div class="form-group-dd">' +
        '<ul class="shop_select" id="appendItemsHere' + counter + '">' +
        '</ul>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-12">' +
        '<div class="" id="add_more_itmes' + counter + '">' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
    )
    counter++;
}

function appendOrderHtml(optionList) {

    $('#more_order_list').append(


        '<div class="card-gray mb-3 pb-2">' +
        '<div class="row">' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +

        '<label>Select Companyd</label>' +
        '<select name="company_id[]" onchange="getSubCategories(this.value,' + "'" + 'sub_model' + counter + "'" + ')" class="form-control">' +
        '<option value="0">Please Select Parent Category</option>' +
        optionList +

        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +

        '<label>Select First Model</label>' +
        '<select name="model_id[]" onchange="getSubCategories(this.value,' + "'" + 'sec_model' + counter + "'" + ')" id="sub_model' + counter + '" class="form-control">' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +

        '<label>Select Second Model</label>' +
        '<select name="second_model[]" onchange="getSubCategories(this.value,' + "'" + 'third_model' + counter + "'" + ')" id="sec_model' + counter + '" class="form-control">' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +
        '<label>Select Third Model</label>' +
        '<select name="third_model[]" onchange="getSubCategories(this.value)" id="third_model' + counter + '" class="form-control">' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-6 col-lg-4">' +
        '<div class="form-group">' +
        '<label>Search Item</label>' +
        '<input type="text" required class="form-control" onkeyup="searchItem(this.value,' + counter + ')">' +
        '<div class="form-group-dd">' +
        '<ul class="shop_select" id="appendItemsHere' + counter + '">' +
        '</ul>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-12">' +
        '<div class="" id="add_more_itmes' + counter + '">' +
        '</div>' +
        '</div>' +
        '</div>'
    )
    counter++;
}


function deleteShop(val) {
    $.ajax({

        type: 'GET',

        url: url + '/deleteShop',

        data: { id: val },

        success: function(data) {
            window.location.reload();
        }
    });
}





var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "Feburary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: 'My Annual Sales',
            data: [12, 19, 3, 5, 2, 3, 20, 3, 5, 6, 2, 1],
            backgroundColor: [
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)'
            ],
            borderColor: [
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)',
                'rgba(150, 122, 220, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            xAxes: [{
                ticks: {
                    maxRotation: 90,
                    minRotation: 80
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});