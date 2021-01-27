<?php

use App\Http\Controllers\Members;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\Parameter;

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

// Route::get('/test1', function () { return view('test1'); });
// Route::get('/test2', function () { return view('test2'); });
// Route::get('/test3', function () { return view('test3'); });

Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('members/register', 'Members@register')->name('members.register');
    Route::get('members/premium/{id}', 'Members@premium')->name('members.premium');
    Route::resource('members', 'Members', ['parameter' => ['member' => 'id']]);
});

require __DIR__.'/auth.php';
Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');

Route::get('admin/{any}', function () {
    return view('admin');
})->where('any','.*');

