<?php

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
Route::get('/', function () {
    $user = auth()->user();
    if(!$user){
        return view('welcome');
    }
    if($user && $user->is_admin == 1){
        return redirect()->route('dashboard');
    }
    if($user && $user->is_admin == 0){
        return redirect()->route('user-history');
    }
});

Auth::routes();
Route::get('/admin-dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin-dashboard/users', [App\Http\Controllers\Dashboard\UsersController::class, 'index'])->name('dashboard-users');
Route::get('/admin-dashboard/users/create', [App\Http\Controllers\Dashboard\UsersController::class, 'create'])->name('create-users');
Route::post('/admin-dashboard/users', [App\Http\Controllers\Dashboard\UsersController::class, 'store'])->name('store-users');
Route::get('/admin-dashboard/users/{id}/edit', [App\Http\Controllers\Dashboard\UsersController::class, 'edit'])->name('show-users');
Route::put('/admin-dashboard/users/{id}', [App\Http\Controllers\Dashboard\UsersController::class, 'update'])->name('edit-users');
Route::delete('/admin-dashboard/users/{id}', [App\Http\Controllers\Dashboard\UsersController::class, 'destroy'])->name('destroy-users');
Route::get('/admin-dashboard/transaction', [App\Http\Controllers\Dashboard\TransactionController::class, 'index'])->name('dashboard-transaction');
Route::get('/admin-dashboard/bills', [App\Http\Controllers\Dashboard\BillsController::class, 'index'])->name('dashboard-bills');


Route::get('/users-history', [App\Http\Controllers\User\HistoryController::class, 'index'])->name('user-history');
Route::get('/users-transaction', [App\Http\Controllers\User\TransactionController::class, 'index'])->name('user-transaction');
Route::post('/users-transaction', [App\Http\Controllers\User\TransactionController::class, 'store'])->name('store-transaction');

Route::get('/users-bills', [App\Http\Controllers\User\BillsController::class, 'index'])->name('user-bills');
Route::post('/users-bills', [App\Http\Controllers\User\BillsController::class, 'store'])->name('store-bills');