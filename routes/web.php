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

Route::get('/', 'HomeController@index')->name('welcome');

/*
foreach (scandir($path = base_path('Modules')) as $dir) {
	if (file_exists($filepath = "{$path}/{$dir}/routes.php")) {
		require $filepath;
	}
}
*/