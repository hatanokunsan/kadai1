<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect('/member');
});

Auth::routes();

// Route::resource('/member', [MemberController::class]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/member', [MemberController::class, 'index'])->name('member');

