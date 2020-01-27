<?php
Route::get('/kiai/{associateid}', "Retos\kaizenController@kiaiIndex");
Route::get('/viajeros/{associateid}', "Retos\kaizenController@kiaiIndex");
Route::get('/serpro/{associateid}/{staff?}', "Retos\kaizenController@serProIndex");
Route::get('/loadupline', "Retos\kaizenController@loadUpline");
Route::get('/kaizen/{associateid}', 'Retos\kaizenController@index');
Route::get('/kaizen/{associateid}/updatekaizen', 'Retos\kaizenController@updateTotalKaizen');
Route::get('/taishi/{associateid}', 'Retos\kaizenController@indexTaishi');
Route::get('/taishi/{associateid}/updatetaishi', 'Retos\kaizenController@updateTotalTaishi');
Route::get('/no/{associateid}', 'Retos\kaizenController@no');
Route::post('/registeclubv', 'Retos\kaizenController@registeClubV');
Route::get('/mantenimiento', 'Retos\kaizenController@mantenimiento');