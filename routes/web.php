<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//이거 주석치면 회원가입하고 notFound뜸
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//ProductController RouteList에 등록 product.index, product.show 등등
Route::resource('product', ProductController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('image', \App\Http\Controllers\ImageController::class)
    ->middleware(['auth:sanctum', 'verified']);


//컨트롤러 url 따로지정 하는 방법
//Route::get('image', [ImageController::class,'index'])->name('image.index');
//Route::get('image/create', [ImageController::class,'create'])->name('image.create');
//Route::post('image', [ImageController::class,'store'])->name('image.store');


