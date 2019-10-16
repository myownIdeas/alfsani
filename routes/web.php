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
               // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@index',
    ]
);
Route::get('/dashboard',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'DashboardController@index',
    ]
);
Route::get('add/shop',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@addShop',
    ]
);

Route::post('auth/user',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@validateUser',
    ]
);

Route::post('insert/shop',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@create',
    ]
);

Route::get('edit_shop',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@edit',
    ]
);

Route::get('get_shop_for_ajax',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@getShopForAjax',
    ]
);

Route::post('update_shop',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@update',
    ]
);

Route::get('delete',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@delete',
    ]
);

Route::get('shop/listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'HomeController@listingPage',
    ]
);
Route::get('add/city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@index',
    ]
);

Route::post('insert/city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@create',
    ]
);

Route::get('city/listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@listingPage',
    ]
);

Route::get('edit_city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@edit',
    ]
);

Route::post('update_city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@update',
    ]
);

Route::get('delete_city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@delete',
    ]
);



Route::post('insert/city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@create',
    ]
);

Route::get('city/listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@listingPage',
    ]
);

Route::get('edit_city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@edit',
    ]
);

Route::post('update_city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@update',
    ]
);

Route::get('delete_city',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CityController@delete',
    ]
);





Route::get('add/company',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@index',
    ]
);

Route::post('insert/company',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@create',
    ]
);


Route::get('company/listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@listingPage',
    ]
);
Route::get('subCat_listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@subCategoryList',
    ]
);


Route::get('insert_model',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@insertModels',
    ]
);



Route::get('edit_company',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@edit',
    ]
);

Route::post('update_company',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@update',
    ]
);

Route::get('delete_company',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@delete',
    ]
);
















Route::get('add/company/model',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyModelController@index',
    ]
);

Route::post('insert/company/model',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyModelController@create',
    ]
);


Route::get('company/listing/model',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyModelController@listingPage',
    ]
);

Route::get('updateModelItems',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyModelController@updateModelItems',
    ]
);
Route::get('get_items',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyModelController@getModelItems',
    ]
);
Route::get('edit_company_model',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@edit',
    ]
);

Route::post('update_company_model',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@update',
    ]
);

Route::get('delete_company_model',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyController@delete',
    ]
);



Route::get('updateModel',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyModelController@updateModel',
    ]
);
Route::get('deleteModel',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'CompanyModelController@deleteModel',
    ]
);













Route::get('add/user',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@index',
    ]
);

Route::post('insert/user',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@create',
    ]
);


Route::get('user/listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@listingPage',
    ]
);

Route::get('edit_user',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@edit',
    ]
);

Route::post('update_user',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@update',
    ]
);

Route::get('delete_user',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@delete',
    ]
);
Route::get('active_delete_user',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@active_delete_user',
    ]
);

Route::get('deleted_user/listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'UserController@deleteUserListing',
    ]
);



















Route::get('add/group',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@index',
    ]
);

Route::post('insert/group',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@create',
    ]
);


Route::get('group/listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@listingPage',
    ]
);

Route::get('group_detail',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@groupDetail',
    ]
);

Route::get('edit_group',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@edit',
    ]
);

Route::get('edit_my_group',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@editListingPage',
    ]
);
Route::get('group_detail',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@groupDetail',
    ]
);

Route::get('edit_group_detail',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@editMyGroup',
    ]
);

Route::post('update_group',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@update',
    ]
);

Route::get('delete_group',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@delete',
    ]
);


Route::get('get_order_page',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@getOrder',
    ]
);


Route::get('order_listing',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'OrderController@orderListing',
    ]
);

Route::get('order_detail/{id}',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'OrderController@orderDetail',
    ]
);

Route::get('order_delete/{id}',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'OrderController@orderDelete',
    ]
);

Route::get('delete_item_from_order/{id}',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'OrderController@deleteItemFromOrder',
    ]
);

Route::post('addItemIntoOrder',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'OrderController@addItemIntoOrder',
    ]
);

Route::get('order_update/{id}',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'OrderController@updateOrder',
    ]
);

Route::get('getCompanies',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@getCompaniesList',
    ]
);

Route::get('search/autocomplete', 'GroupController@autocomplete');


Route::get('add_shop_into_group',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@addShopIntoGroup',
    ]
);

Route::get('deleteShop',
    [
        'middleware'=>
            [
                // 'webValidate:forgetPasswordRequest'
            ],
        'uses'=>'GroupController@deleteRecordFromDetail',
    ]
);


Route::get('add_Items',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@addItems',
    ]
);

Route::post('insert_model_items',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@insertItems',
    ]
);

Route::get('item_listing',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@itemListingPage',
    ]
);
Route::get('add_item_discount',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@itemDiscountPage',
    ]
);
Route::get('item_discount_listing',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@itemDiscount',
    ]
);
Route::get('getCompanyItemListing',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@getCompanyItemListing',
    ]
);


Route::get('getItemsForDiscount',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@getItemsForDiscount',
    ]
);
Route::post('insert/item/discount',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@insertItemDiscount',
    ]
);
Route::get('checkItemCondition',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@checkItemCondition',
    ]
);
Route::get('getItems',
    [
        'middleware'=>
            [

            ],
        'uses'=>'CompanyModelController@getItems',
    ]
);
Route::post('place_order',
    [
        'middleware'=>
            [

            ],
        'uses'=>'OrderController@placeOrder',
    ]
);

Route::get('order_finish/{id}',
    [
        'middleware'=>
            [

            ],
        'uses'=>'OrderController@finishOrder',
    ]
);


Route::get('add/stock',
    [
        'middleware'=>
            [

            ],
        'uses'=>'StockController@index',
    ]
);

Route::post('insert/stock',
    [
        'middleware'=>
            [

            ],
        'uses'=>'StockController@insert',
    ]
);
Route::get('stock/listing',
    [
        'middleware'=>
            [

            ],
        'uses'=>'StockController@listing',
    ]
);

Route::get('delete/stock/{id}',
    [
        'middleware'=>
            [

            ],
        'uses'=>'StockController@deleteStock',
    ]
);

Route::get('update/stock/{id}',
    [
        'middleware'=>
            [

            ],
        'uses'=>'StockController@updateStock',
    ]
);

