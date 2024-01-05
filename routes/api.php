<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [IndexController::class, 'index'])->name('admin.index');
    Route::resource('/admin/roles', RoleController::class);
    Route::resource('/admin/permissions', PermissionController::class);

    // Autres routes API nécessitant à la fois l'authentification et le middleware 'role:admin'
});
