<?php

use App\Livewire\CreateChatMessage;
use App\Livewire\Friends;
use App\Livewire\Login;
use App\Livewire\RequestReceived;
use App\Livewire\ShowChat;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function () {
    // Route::redirect('/', '/friends');
    Route::get('/friends', Friends::class);
    Route::get('/send', CreateChatMessage::class);
    Route::get('/chat/{chat}', ShowChat::class);
    Route::get('/requests/received', RequestReceived::class);
});
Route::get('/login', Login::class)->name('login');
