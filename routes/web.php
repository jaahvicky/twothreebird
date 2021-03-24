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
    return redirect()->route('question.one');
});
Route::get('questions/three', [
    'uses' => 'DashboardController@indexThree',
    'as' => 'question.three',
]);
Route::get('questions/four', [
    'uses' => 'DashboardController@indexFour',
    'as' => 'question.four',
]);
Route::get('questions/five', [
    'uses' => 'DashboardController@indexFive',
    'as' => 'question.five',
]);
Route::get('questions/one', [
    'uses' => 'DashboardController@index',
    'as' => 'question.one',
]);
Route::get('questions/two', [
    'uses' => 'DashboardController@indexTwo',
    'as' => 'question.two',
]);
Route::post('questions/one/upload', [
    'uses' => 'DashboardController@fileupload',
    'as' => 'question.one.upload',
]);

