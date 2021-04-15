<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\Admin\SubscriberController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('campaigns/{id}',[CampaignController::class, 'destroy'])->whereNumber('id')->name('campaigns.destroy');

Route::resource('campaigns',CampaignController::class);

Route::get('subscribers/{id}', [SubscriberController::class, 'destroy'])->whereNumber('id')->name('subscribers.destroy');

Route::resource('subscribers', SubscriberController::class);

Route::resource('json', JsonController::class);