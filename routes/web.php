
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applicatio;;n. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('welcome');
});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','namespace'=>'Backend','as'=>'admin.','middleware'=>['auth']], function(){
	Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
	Route::resource('divition','divitionController');
	Route::resource('district', 'districtController');
	Route::resource('upazila', 'upazilaController');
});
