<?php

use App\Models\Listing; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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
//All Listings

Route::get('/',[ListingController::class,'index']);

// Show create form

Route::get("/listings/create",[ListingController::class,'create'])->middleware('auth');

//Manage Listing

Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//A single Listing

Route::get("/listings/{listing}",[ListingController::class,'show'])->where('id','[0-9]+');

//Store listing data

Route::post("/listings",[ListingController::class,'store']);

//Show Edit Form

Route::get('listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');


//Edit Submite To Update

Route::put("listings/{listing}",[ListingController::class,'update'])->middleware('auth');

//Delete

Route::delete("listings/{listing}",[ListingController::class,'delete'])->middleware('auth');

//Show Register From

Route::get("/register",[UserController::class,'create'])->middleware('guest');


//Create New User

Route::post('/users',[UserController::class,'store']);


//Log User Out

Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Show Login Form

Route::get("/login",[UserController::class,'show'])->name('login')->middleware('auth') ;

//Login User

Route::post('user/login',[UserController::class,'login']);













Route::get('/listings/test/{id}',function($id){
 return view('listings/index',[
        'heading'=>"Requested Listings",
        'listings'=>[Listing::find((int)$id)],
    ]);
});
Route::get('/hello ',function(){
    return response("<h1>hello world</h1>")->header('Content-Type','text/plain')->header('foo','bar');
});
Route::get("/posts",function(){
    return '<h2>This is me tanking</h2>';
});

Route::get('/posts/{id}',function($id){
   // ddd($id);
return response('Posts '. $id);
})->where('id','[0-9]+');

Route::get("/search",function(Request $request,Response $response){
      return ($request->name ." " . $request->city);
});