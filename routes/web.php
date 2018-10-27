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

use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

//Route::get( 'hello/{id?}/{pass?}', 'HelloController@index' );
//Route::get( 'hello', 'HelloController@index' );
//Route::get( 'hello/other', 'HelloController@other' );
//Route::get( 'hello/other', 'HelloController@other' );
//Route::get( 'hello', 'HelloController' );
//Route::get( 'hello', 'HelloController@index' );
/*Route::get( 'hello', function(){
  return view( 'hello.index' );
} );*/

//Route::get( 'hello/{id?}', 'HelloController@index' );

//クエリー文字
//Route::get( 'hello', 'HelloController@index' );
/* Auth 特定ページの保護 */
Route::get( 'hello', 'HelloController@index' ) -> middleware('auth');

Route::post( 'hello', 'HelloController@post' );

Route::get( 'hello/show', 'HelloController@show' );

Route::get( 'hello/add', 'HelloController@add' );
Route::post( 'hello/add', 'HelloController@create' );

Route::get( 'hello/edit', 'HelloController@edit' );
Route::post( 'hello/edit', 'HelloController@update' );

Route::get( 'hello/del', 'HelloController@del' );
Route::post( 'hello/del', 'HelloController@remove' );



Route::get( 'person', 'PersonController@index' );

Route::get( 'person/find', 'PersonController@find' );
Route::post( 'person/find', 'PersonController@search' );

Route::get( 'person/add', 'PersonController@add' );
Route::post( 'person/add', 'PersonController@create' );

Route::get( 'person/edit', 'PersonController@edit' );
Route::post( 'person/edit', 'PersonController@update' );

Route::get( 'person/del', 'PersonController@delete' );
Route::post( 'person/del', 'PersonController@remove' );


Route::get( 'board', 'BoardController@index' );

Route::get( 'board/add', 'BoardController@add' );
Route::post( 'board/add', 'BoardController@create' );

Route::get( 'hello/rest', 'HelloController@rest' );

/* RESTRoute */
Route::resource('rest', 'RestappController');


Route::get( 'hello/session', 'HelloController@ses_get' );
Route::post( 'hello/session', 'HelloController@ses_put' );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get( 'hello/auth', 'HelloController@getAuth' );
Route::post( 'hello/auth', 'HelloController@postAuth' );
