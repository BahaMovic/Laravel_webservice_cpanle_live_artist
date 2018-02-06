<?php

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::post('api/show/provider/locations/','locationController@getLocation');
Route::get('api/show/user/notific/{id}','notificUserController@show');
Route::post('api/search/service/providers','serviceController@search');
Route::get('api/get/all/cities/{id}','serviceController@getAllCountries');
///////////////////////////ServiceType api's///////////////////////
Route::get('/api/get/servicetype','serviceTypeController@index');
Route::post('/api/add/servicetype','serviceTypeController@store');
Route::post('/api/edit/servicetype/{id}','serviceTypeController@update');
Route::delete('/api/delete/servicetype/{id}','serviceTypeController@destroy');


///////////////////orderProvider//////////////////
Route::get('/api/get/orderproviders','orderProviderController@index');
Route::post('/api/add/orderproviders','orderProviderController@store');
Route::post('/api/edit/orderproviders/{id}','orderProviderController@update');
Route::delete('/api/delete/orderproviders/{id}','orderProviderController@destroy');
Route::get('/api/show/orderproviders/{id}','orderProviderController@show');


//////////////////////////orderUser///////////////////////
Route::get('/api/get/orderusers','orderUserController@index');
Route::post('/api/add/orderusers','orderUserController@store');
Route::post('/api/edit/orderusers/{id}','orderUserController@update');
Route::delete('/api/delete/orderusers/{id}','orderUserController@destroy');
Route::get('/api/show/orderusers/{id}','orderUserController@show');

//////////////////////////images////////////////////////////

Route::post('/api/add/images','imageController@store');

Route::post('/api/add/videos','videoController@store');

Route::delete('/api/delete/images/{id}','imageController@destroy');
Route::get('/api/show/images/{id}','imageController@show');
Route::get('/api/show/videos/{id}','videoController@show');

/////////////////////////////////////notific provider
Route::get('api/show/provider/notific/{id}','notificController@show');


///////////////////////////User api's///////////////////////
Route::get('/api/get/users','userController@index');
Route::post('/api/add/user/{id}','userController@store');
Route::post('/api/edit/user/{id}/{id_lan}','userController@update');
Route::delete('/api/delete/user/{id}','userController@destroy');
Route::get('/api/delete/user/{id}','userController@destroy');
Route::get('/api/show/user/{id}','userController@show');


///////////////////////////providers api's///////////////////////
Route::get('/api/get/providers','providerController@index');
Route::post('/api/add/provider/{id}','providerController@store');
Route::post('/api/edit/provider/{id}/{id_lan}','providerController@update');
Route::delete('/api/delete/provider/{id}','providerController@destroy');
Route::get('/api/delete/provider/{id}','providerController@destroy');
Route::get('/api/show/provider/{id}','providerController@show');


///////////////////////////service api's///////////////////////
Route::get('/api/get/services','serviceController@index');
Route::post('/api/add/service','serviceController@store');
Route::post('/api/edit/service/{id}','serviceController@update');
Route::delete('/api/delete/service/{id}','serviceController@destroy');
Route::get('/api/show/service/{id}','serviceController@show');


///////////////////////Login//////////////////////
Route::post('/api/provider/login/{id}','loginController@loginAsProvider');
Route::post('/api/user/login/{id}','loginController@loginAsUser');


Route::get('/api/get/notifications','notificationController@index');
Route::post('/api/add/notification','notificationController@store');
Route::get('/api/get/user/notificatoins/{id}','notificationController@showAsUser');
Route::get('/api/get/provider/notificatoins/{id}','notificationController@showAsProvider');
Route::delete('api/delete/notification/{id}','notificationController@destroy');

Route::get('/api/get/rates','rateController@index');
Route::post('/api/add/rate','rateController@store');
Route::get('/api/get/user/rate/{id}','rateController@showAsUser');
Route::get('/api/get/provider/rate/{id}','rateController@showAsProvider');
Route::delete('api/delete/rate/{id}','rateController@destroy');



///////////////Orders///////////////////
Route::get('/api/get/orders','ordersController@index');
Route::post('/api/add/order','ordersController@store');
Route::post('/api/edit/orderusers/{id}','ordersController@update');
Route::delete('/api/delete/order/{id}','ordersController@destroy');
Route::get('/api/delete/order/{id}','ordersController@destroy');
Route::get('/api/show/orderuser/{id}','ordersController@showUsers');
Route::get('/api/show/orderprovider/{id}','ordersController@showProv');
Route::get('/api/show/order/{id}','ordersController@show');
//ordersController
Route::get('/api/edit/order/{id}/{notific_id}','ordersController@editOrder');
Route::get('/api/cancel/order/{id}/{notific_id}','ordersController@editOrderCancel');
Route::get('/api/get/currency','serviceController@getCur');
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
////////////////admin/////////////////



Route::get('/home', 'HomeController@index');

///->middleware('auth');
  Route::get("admin/login","admin_usersController@login");
  Route::get("login","admin_usersController@login");
  Route::get("/","admin_usersController@login");

  Route::group(['middleware' => 'auth'], function () {
  Route::get("/admin/providers","admin_providersController@index");
  Route::get("admin/home","admin_homeController@index");
  Route::get("admin/supervisor","admin_supervisorController@index");
  Route::get("admin/stop/supervisor/{id}","admin_supervisorController@stop");
  Route::get("/admin/delete/user/{id}","admin_supervisorController@destroy");
  Route::post("/admin/add/user","admin_supervisorController@store");
  Route::get("/admin/edit/user/{id}","admin_supervisorController@edit");
  Route::post("/admin/edit/user/{id}","admin_supervisorController@update");
  Route::get('/admin/edit/rate/{id}/{user_id}','admin_providersController@rate');
  ///admin/edit/user/
  ///delete/provider/admin_usersController//delete/user/
  Route::get("/delete/provider/{id}","admin_providersController@destroy");
  Route::get("/show/users","admin_usersController@index");
  Route::get("/delete/user/{id}","admin_usersController@destroy");
  Route::get("/stop/user/{id}","admin_usersController@stop");
  Route::get("/stop/user/{id}","admin_usersController@stop");
  Route::get('admin/get/adv',"admin_adverImageController@create");
  Route::get('admin/get/types',"admin_servicetypeController@index");
  Route::get('admin/delete/types/{id}',"admin_servicetypeController@destroy");
  //admin/add/type
  Route::post('admin/add/type',"admin_servicetypeController@store");
  Route::post('admin/edit/type/{id}',"admin_servicetypeController@update");

  Route::post('admin/get/adv',"admin_adverImageController@store");
  Route::get('/delete/adv/image/{id}','admin_adverImageController@destroy');
  Route::get('admin/get/orders',['as'=>'reports','uses'=>'admin_reportsController@index']);
  Route::post('admin/get/orders',['as'=>'reports','uses'=>'admin_reportsController@search']);
  Route::get('admin/message/{id}/{adminid}','messageController@getMessages');
  Route::post('admin/add/message/{id}/{adminid}','messageController@postMessages');
  Route::get('/admin/messageadmin/{id}','messageController@getMessagesadmin');
  Route::post('admin/messageadmin/{id}','messageController@postMessagesadmin');
  Route::get('discount/code','admin_discCodeController@index');
  Route::post('discount/code','admin_discCodeController@create');
  Route::get('delete/descount/{id}','admin_discCodeController@destroy');
  Route::get('/delete/image/{id}','admin_providersController@deleteImage');
  Route::get('/stop/provider/{id}','admin_providersController@stop2');
    });
