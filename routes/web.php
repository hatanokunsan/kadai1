<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

// Route::get('/', function () {
//     return redirect('/');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 上手く動かないので、メソッド毎に記述する
// Route::resource('/member', [MemberController::class]);

Route::get('/', [MemberController::class, 'index'])->name('member.index');
Route::get('/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/show/{id}', [MemberController::class, 'show'])->name('member.show');
Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
Route::patch('/update/{id}', [MemberController::class, 'update'])->name('member.update');
// URLの{id}パラメータを変更された時の為にルートを用意した
Route::get('/destroy/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
Route::delete('/destroy/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
