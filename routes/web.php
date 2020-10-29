<?php

Auth::routes();
Route::get('/', 'ClientController@index')->name('home');

Route::get('users', 'ClientController@users_info');
Route::post('update-user', 'ClientController@update_user')->name('update-user');

Route::get('filesize', 'ClientController@file_size');
Route::get('ajax-filesize-info-check/{size}', 'ClientController@ajax_filesize_info_check');
Route::post('save-filesize', 'ClientController@save_file_size')->name('save-filesize');

Route::get('filetype', 'ClientController@file_type');
Route::get('ajax-filetype-info-check/{type}', 'ClientController@ajax_filetype_info_check');
Route::post('save-filetype', 'ClientController@save_file_type')->name('save-filetype');

Route::get('various-need', 'ClientController@various_need');
Route::get('search-product', 'ClientController@search_product')->name('search-product');
Route::get('search-pro/{sorting}', 'ClientController@search_pro');

Route::get('up-down-pre', 'ClientController@up_down_pre');
Route::post('save-image-info', 'ClientController@save_image_info')->name('save-image-info');
Route::get('download-image/{image_id}', 'ClientController@download_image');

Route::get('cre-ren-del', 'ClientController@cre_ren_del');
Route::post('create-dir-info', 'ClientController@create_dir_info')->name('create-dir-info');
Route::post('rename-dir-info', 'ClientController@rename_dir_info')->name('rename-dir-info');
Route::post('delete-dir-info', 'ClientController@delete_dir_info')->name('delete-dir-info');
Route::post('copy-dir-info', 'ClientController@copy_dir_info')->name('copy-dir-info');
Route::post('move-dir-info', 'ClientController@move_dir_info')->name('move-dir-info');

Route::get('file-tree', 'ClientController@file_tree');
Route::get('dir-back', 'ClientController@dir_back');