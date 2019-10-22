<?php
Route::get('/kaizen', 'kaizen\kaizenController@index');
Route::get('/kaizen/updatekaizen', 'kaizen\kaizenController@updateTotalKaizen');

Route::get('/taishi', 'kaizen\kaizenController@indexTaishi');
Route::get('/taishi/updatekaizen', 'kaizen\kaizenController@updateTotalKaizen');