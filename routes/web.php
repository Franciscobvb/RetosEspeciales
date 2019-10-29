<?php
Route::get('/kiai/{associateid}', "Retos\kaizenController@kiaiIndex");

Route::get('/kaizen/{associateid}', 'Retos\kaizenController@index');
Route::get('/kaizen/{associateid}/updatekaizen', 'Retos\kaizenController@updateTotalKaizen');

Route::get('/taishi/{associateid}', 'Retos\kaizenController@indexTaishi');
Route::get('/taishi/{associateid}/updatetaishi', 'Retos\kaizenController@updateTotalTaishi');


Route::get('/serpro/{associateid}-{staff}', "serpro@index");

Route::get('/404', function(){
    return view('error');
});