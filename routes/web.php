<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('react');
});

Route::get('/send', function() {
    try {
        Mail::send(new TestMail());        
        return response()
            ->json(['status' => 'Ok']);
    } catch (\Throwable $th) {
        return response()
            ->json(['status' => 'error', 'datas' => $th->getMessage()]);
    }
})->name('send.index');


Route::get('/recovery', function() {
    return 'recuperado';
})->name('recovery.index');
