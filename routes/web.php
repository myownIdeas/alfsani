<?php
$GLOBALS['r_name'] = 'muhammad.waqas7266@gmail.com';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/',
    [
        'middleware'=>
            [
                //'webAuthenticate'
            ],
        'uses'=>'HomeController@index',
    ]
);
Route::post('auth/user',
    [
        'middleware'=>
            [
                //'webAuthenticate'
            ],
        'uses'=>'HomeController@validateUser',
    ]
);

Route::get('addOrderAmount',
    [
        'middleware'=>
            [
              'webAuthenticate'
            ],
        'uses'=>'OrderController@addOrderAmount',
    ]
);

Route::get('deleteContactForShop',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@deleteContactForShop',
    ]
);
Route::get('changeStatus',
    [
        'middleware'=>
            [
               //'webAuthenticate'
            ],
        'uses'=>'OrderController@changeOrderStatus',
    ]
);

Route::get('assignOrderTo',
    [
        'middleware'=>
            [
               //'webAuthenticate'
            ],
        'uses'=>'OrderController@assignOrderTo',
    ]
);
Route::get('/dashboard',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'DashboardController@index',
    ]
);
Route::get('add/shop',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@addShop',
    ]
);



Route::post('insert/shop',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@create',
    ]
);
Route::get('updateReminderForShop',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@updateReminderForShop',
    ]
);

Route::get('edit_shop',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@edit',
    ]
);

Route::get('get_shop_for_ajax',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@getShopForAjax',
    ]
);

Route::post('update_shop',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@update',
    ]
);

Route::get('delete',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@delete',
    ]
);

Route::get('shop/listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'HomeController@listingPage',
    ]
);
Route::get('add/city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@index',
    ]
);

Route::post('insert/city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@create',
    ]
);

Route::get('city/listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@listingPage',
    ]
);

Route::get('edit_city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@edit',
    ]
);

Route::post('update_city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@update',
    ]
);

Route::get('delete_city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@delete',
    ]
);



Route::post('insert/city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@create',
    ]
);

Route::get('city/listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@listingPage',
    ]
);

Route::get('edit_city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@edit',
    ]
);

Route::post('update_city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@update',
    ]
);

Route::get('delete_city',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CityController@delete',
    ]
);





Route::get('add/company',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@index',
    ]
);

Route::post('insert/company',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@create',
    ]
);


Route::get('company/listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@listingPage',
    ]
);
Route::get('subCat_listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@subCategoryList',
    ]
);


Route::get('insert_model',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@insertModels',
    ]
);



Route::get('edit_company',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@edit',
    ]
);

Route::post('update_company',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@update',
    ]
);

Route::get('delete_company',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@delete',
    ]
);
















Route::get('add/company/model',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@index',
    ]
);

Route::post('insert/company/model',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@create',
    ]
);


Route::get('company/listing/model',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@listingPage',
    ]
);

Route::get('updateModelItems',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@updateModelItems',
    ]
);
Route::get('get_items',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@getModelItems',
    ]
);
Route::get('edit_company_model',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@edit',
    ]
);

Route::post('update_company_model',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@update',
    ]
);

Route::get('delete_company_model',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyController@delete',
    ]
);



Route::get('updateModel',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@updateModel',
    ]
);
Route::get('deleteModel',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@deleteModel',
    ]
);













Route::get('add/user',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@index',
    ]
);

Route::post('insert/user',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@create',
    ]
);


Route::get('user/listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@listingPage',
    ]
);

Route::get('edit_user',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@edit',
    ]
);

Route::post('update_user',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@update',
    ]
);

Route::get('delete_user',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@delete',
    ]
);
Route::get('active_delete_user',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@active_delete_user',
    ]
);

Route::get('deleted_user/listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'UserController@deleteUserListing',
    ]
);



















Route::get('add/group',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@index',
    ]
);

Route::post('insert/group',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@create',
    ]
);


Route::get('group/listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@listingPage',
    ]
);

Route::get('group_detail',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@groupDetail',
    ]
);

Route::get('edit_group',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@edit',
    ]
);

Route::get('edit_my_group',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@editListingPage',
    ]
);
Route::get('group_detail',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@groupDetail',
    ]
);

Route::get('edit_group_detail',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@editMyGroup',
    ]
);

Route::post('update_group',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@update',
    ]
);

Route::get('delete_group',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@delete',
    ]
);


Route::get('get_order_page',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@getOrder',
    ]
);


Route::get('order_listing',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'OrderController@orderListing',
    ]
);

Route::get('order_detail/{id}',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'OrderController@orderDetail',
    ]
);

Route::get('order_delete/{id}',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'OrderController@orderDelete',
    ]
);

Route::get('delete_item_from_order/{id}',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'OrderController@deleteItemFromOrder',
    ]
);

Route::post('addItemIntoOrder',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'OrderController@addItemIntoOrder',
    ]
);

Route::get('order_update/{id}',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'OrderController@updateOrder',
    ]
);

Route::get('getCompanies',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@getCompaniesList',
    ]
);

Route::get('search/autocomplete', 'GroupController@autocomplete');


Route::get('add_shop_into_group',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@addShopIntoGroup',
    ]
);

Route::get('deleteShop',
    [
        'middleware'=>
            [
               'webAuthenticate'
            ],
        'uses'=>'GroupController@deleteRecordFromDetail',
    ]
);


Route::get('add_Items',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@addItems',
    ]
);

Route::post('insert_model_items',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@insertItems',
    ]
);

Route::get('item_listing',
    [
        'middleware'=>
            ['webAuthenticate'

            ],
        'uses'=>'CompanyModelController@itemListingPage',
    ]
);
Route::get('add_item_discount',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@itemDiscountPage',
    ]
);
Route::get('item_discount_listing',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@itemDiscount',
    ]
);
Route::get('/edit_discount_item',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@editItemDiscount',
    ]
);
Route::get('getCompanyItemListing',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@getCompanyItemListing',
    ]
);


Route::get('getItemsForDiscount',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@getItemsForDiscount',
    ]
);
Route::post('insert/item/discount',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@insertItemDiscount',
    ]
);
Route::get('checkItemCondition',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@checkItemCondition',
    ]
);
Route::get('getItems',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'CompanyModelController@getItems',
    ]
);
Route::post('place_order',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'OrderController@placeOrder',
    ]
);

Route::get('order_finish/{id}',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'OrderController@finishOrder',
    ]
);


Route::get('add/stock',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'StockController@index',
    ]
);

Route::post('insert/stock',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'StockController@insert',
    ]
);
Route::get('stock/listing',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'StockController@listing',
    ]
);

Route::get('delete/stock/{id}',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'StockController@deleteStock',
    ]
);

Route::get('update/stock/{id}',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'StockController@updateStock',
    ]
);

Route::post('update/stock/Quantity',
    [
        'middleware'=>
            [
                'webAuthenticate'
            ],
        'uses'=>'StockController@updateStockQuantity',
    ]
);

Route::get('/logout', function(Illuminate\Http\Request $request){
    $request->session()->flush();
    return redirect('/');
});