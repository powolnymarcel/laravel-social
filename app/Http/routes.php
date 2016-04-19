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
Route::get('/deconnexion',[
    'uses'=>'UtilisateurController@getDeconnexion',
    'as'=>'deconnexion'
]);



Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[
        'uses'=>'PostController@getDashboard',
        'as'=>'dashboard'
    ]);

    Route::post('/creationpost',[
        'uses'=>'PostController@postCreationPost',
        'as'=>'creation.post'
    ]);


    Route::post('/editer',[
        'uses'=>'PostController@postEditerPost'

    ])->name('editer');


    Route::get('/supprimer-post/{postid}',[
        'uses'=>'PostController@getSupprimerPost',
        'as'=>'post.supprimer'
    ]);








});