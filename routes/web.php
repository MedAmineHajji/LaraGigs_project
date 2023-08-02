<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [
    ListingController::class, 'index'
]);

//Show Create Form 
Route::get('/listings/create', [
    ListingController::class, 'create'
])->middleware('auth');

//Store listing data
Route::post('/listings', [
    ListingController::class, 'store'
])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit',[
    ListingController::class, 'edit'
])->middleware('auth');

//Update listing data
Route::put('listings/{listing}', [
    ListingController::class, 'update'
])->middleware('auth');

//Delete listing
Route::delete('listings/{listing}', [
    ListingController::class, 'destroy'
])->middleware('auth');


//Manage Listings
Route::get('/listings/manage', [
    ListingController::class, 'manage'
])->middleware('auth');


//Show Single Listing
Route::get('/listings/{listing}', [
    ListingController::class, 'show'
]);

//Show Register create Form 
Route::get('/register', [
    UserController::class, 'create'
])->middleware('guest');

//Create New User
Route::post('/users', [
    UserController::class, 'store'
]);

//Log User Out
Route::post('/logout', [
    UserController::class, 'logout'
])->middleware('auth');

//Show Login Form
Route::get('/login', [
    UserController::class, 'login'
])->name('login')->middleware('guest');

//Log In User 
Route::post('/users/authenticate', [
    UserController::class, 'authenticate'
]);




    /*
        Route::get('/hello', function(){
            return response('<h1>Hello World</h1>',500)
            ->header('Content-Type', 'text/html')
            ->header('foo', 'bar');
        });

        Route::get('/posts/{id}', function($id){
            return response('This is Post ' . $id);
        });


        // THIS IS RESTREINTED PATH PARAM
        Route::get('/RESposts/{id}', function($id){
            return response('This is a Restrainted post with id : ' . $id);
        })->where('id', '[0-9]+');


        // THIS HOW YOU DEBUG
        Route::get('/debug/{param}', function($param){
            //dd($param);
            //ddd($param);
            return response('<h4>this is param ' . $param . '</h4>' . 'TRY AND UNCOMMENT TO SEE');
        });

        Route::get('/search', function(Request $req){
            dd($req);
        });
    */

