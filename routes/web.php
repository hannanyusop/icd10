<?php

use Illuminate\Support\Facades\Route;
use Redbastie\Crudify\Helpers\AutoRoute;

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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
AutoRoute::controller('blocks', \App\Http\Controllers\BlockController::class);
AutoRoute::controller('chapters', \App\Http\Controllers\ChapterController::class);
AutoRoute::controller('codes', \App\Http\Controllers\CodeController::class);
AutoRoute::controller('maps', \App\Http\Controllers\MapController::class);
AutoRoute::controller('raws', \App\Http\Controllers\RawController::class);
AutoRoute::controller('reports', \App\Http\Controllers\ReportController::class);
