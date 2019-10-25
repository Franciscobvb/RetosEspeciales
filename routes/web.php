<?php
Route::get('/kaizen/{associateid}', 'kaizen\kaizenController@index');
Route::get('/kaizen/{associateid}/updatekaizen', 'kaizen\kaizenController@updateTotalKaizen');

Route::get('/taishi/{associateid}', 'kaizen\kaizenController@indexTaishi');
Route::get('/taishi/{associateid}/updatetaishi', 'kaizen\kaizenController@updateTotalTaishi');