<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::post('/inscription',[
    'uses'=>'UtilisateurController@postInscription',
    'as'=>'inscription'
]);
Route::post('/connexion',[
    'uses'=>'UtilisateurController@postConnexion',
    'as'=>'connexion'
]);



Route::group(['middleware' => 'auth'], function () {


    Route::get('/dashboard',[
        'uses'=>'UtilisateurController@getDashboard',
        'as'=>'dashboard'
    ]);


});