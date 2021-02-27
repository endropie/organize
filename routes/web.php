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

Route::get('/demo', function () {
    \App\Models\Transaction::create([
        'date' => now()->format('Y-m-d'),
        'type' => 'INCOME',
        'amount' => 1000,
    ]);
    // $user = auth()->user();
    // dd($user->allow(['member-manager', 'member-admin']), $user->roles);
    return view('test1');
});

// Route::get('/test1', function () { return view('test1'); });
// Route::get('/test2', function () { return view('test2'); });
// Route::get('/test3', function () { return view('test3'); });

Route::get('/', function () { return view('welcome'); })->name('welcome');
require __DIR__.'/auth.php';
Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'members', 'as' => 'members.', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('register', 'Members@register')->name('register');
    Route::get('premium/{premium}', 'Members@premium')->name('premium');
    Route::get('/{member}', 'Members@show')->name('show');
    Route::get('/', 'Members@index')->name('index');
});
Route::group(['prefix' => 'finances', 'as' => 'finances.', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Finances@index')->name('index');
    Route::get('/transactions', 'Finances@transactions')->name('transactions.index');
});


