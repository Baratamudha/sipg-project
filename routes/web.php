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

Route::get('register', 'RegisterController@create')->name('register');
Route::post('postRegister', 'RegisterController@store');
Route::get('destroyGuru/{id}', 'RegisterController@destroy');
Route::get('editGuru/{id}', 'RegisterController@edit');
Route::post('updateGuru/{id}', 'RegisterController@update');
Route::get('dataGuru', 'RegisterController@index');

Route::get('tambahDataMurid', 'MuridController@create')->name('tambahDataMurid');
Route::post('postDataMurid', 'MuridController@store');
Route::get('destroyMurid/{id}', 'MuridController@destroy');
Route::get('editMurid/{id}', 'MuridController@edit');
Route::post('updateMurid/{id}', 'MuridController@update');
Route::get('dataMurid', 'MuridController@index');

Route::get('tambahKelas', 'KelasController@create')->name('tambahKelas');
Route::post('postKelas', 'KelasController@store');
Route::get('destroyKelas/{id}', 'KelasController@destroy');
Route::get('editKelas/{id}', 'KelasController@edit');
Route::post('updateKelas/{id}', 'KelasController@update');
Route::get('dataKelas', 'KelasController@index');

Route::get('tambahDataMapel', 'MapelController@create')->name('tambahDataMapel');
Route::post('postDataMapel', 'MapelController@store');
Route::get('destroyMapel/{id}', 'MapelController@destroy');
Route::get('editMapel/{id}', 'MapelController@edit');
Route::post('updateMapel/{id}', 'MapelController@update');
Route::get('dataMapel', 'MapelController@index');

Route::get('tambahDataEkskul', 'EkskulController@create')->name('tambahDataEkskul');
Route::post('postDataEkskul', 'EkskulController@store');
Route::get('destroyEkskul/{id}', 'EkskulController@destroy');
Route::get('editEkskul/{id}', 'EkskulController@edit');
Route::post('updateEkskul/{id}', 'EkskulController@update');
Route::get('dataEkskul', 'EkskulController@index');

Route::get('tambahJadwalMapel', 'JadwalMapelController@create')->name('tambahJadwalMapel');
Route::post('postJadwalMapel', 'JadwalMapelController@store');
Route::get('destroyJadwalMapel/{id}', 'JadwalMapelController@destroy');
Route::get('editJadwalMapel/{id}', 'JadwalMapelController@edit');
Route::post('updateJadwalMapel/{id}', 'JadwalMapelController@update');
Route::get('dataJadwal', 'JadwalMapelController@index');

Route::get('tambahJadwalEkskul', 'JadwalEkskulController@create')->name('tambahJadwalEkskul');
Route::post('postJadwalEkskul', 'JadwalEkskulController@store');
Route::get('destrouJadwalEkskul/{id}', 'JadwalEkskulController@destroy');
Route::get('editJadwalEkskul/{id}', 'JadwalEkskulController@edit');
Route::post('updateJadwalEkskul/{id}', 'JadwalEkskulController@update');
Route::get('dataJadwal', 'JadwalEkskulController@index');

Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('postLogin', 'LoginController@postLogin');

Route::get('logout', function(){
  Auth::logout();
  return view('login');
});
