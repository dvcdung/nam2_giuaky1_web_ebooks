<?php

use App\Http\Controllers\StaffManagementController;
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

Route::get('/', [StaffManagementController::class, 'index']);

Route::prefix('staff-management')->group(function() {
    Route::get('/', [StaffManagementController::class, 'index'])->name('staff-management.index');
    Route::post('/delete', [StaffManagementController::class, 'destroy'])->name('staff-management.destroy');
    Route::post('/update', [StaffManagementController::class, 'update'])->name('staff-management.update');
    Route::get('/create', [StaffManagementController::class, 'create'])->name('staff-management.create');
    Route::post('/create', [StaffManagementController::class, 'create'])->name('staff-management.create');
    Route::get('/reset', [StaffManagementController::class, 'resetTable'])->name('staff-management.reset');
    Route::get('/search', [StaffManagementController::class, 'search'])->name('staff-management.search');
    
    
});
