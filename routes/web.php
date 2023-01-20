<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect('/member');
});

Auth::routes();

// Route::resource('/member', [MemberController::class]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [MemberController::class, 'index'])->name('member.index');
Route::get('/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/show/{id}', [MemberController::class, 'show'])->name('member.show');
Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
Route::post('/update/{id}', [MemberController::class, 'update'])->name('member.update');
Route::post('/destroy/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
