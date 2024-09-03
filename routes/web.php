<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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


Route::middleware(['auth'])->group(function () { 

    Route::get('/home', function () {
        return view('page.home');
    })->name('home');

    Route::resource('product', ProductController::class);
    
});


// Route::get('/', function () {   
//     return view('page.listproduct');
// });
Route::get('/', [ProductController::class, 'list']);