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

Route::get('/', function () {
    return view('welcome');
});
Route::any('_nekkta_register',['as'=>"_nekkta_register",'uses'=>'_nekkta_usersController@nekkta_reg']);
Route::any('_nekkta_feeds_details',
    ['as'=>"_nekkta_feeds_details",'uses'=>'_nekkta_feedsController@feeds_upload_details']);
Route::get('_nekkta_feeds_download/{request_from}',
    ["as" => "_nekkta_feeds_download", "uses" => '_nekkta_feedsController@web_feeds_query']);
Route::get('_nekkta_feeds_download/{request_from}/{start_id}/{end_id}',
    ["as" => "_nekkta_feeds_download", "uses" => '_nekkta_feedsController@app_feeds_query']);

Route::get('_nekkta_feeds_upload/{feeds_create}',
    ["as"=>"_nekkta_feeds_upload","uses"=>'_nekkta_feedsController@view_redirect']);
