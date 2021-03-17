<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\VersionsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/dashboard');

Auth::routes(['register' => false]);

Route::get('/dashboard', [PagesController::class, 'dashboard']);

Route::prefix('versions')->group(function () {
    Route::get('/', [VersionsController::class, 'index']);
    Route::post('create', [VersionsController::class, 'create']);
    Route::get('edit/{id}', [VersionsController::class, 'edit']);
    Route::post('store/{id}', [VersionsController::class, 'store']);
    Route::delete('delete/{id}', [VersionsController::class, 'delete']);
});

Route::prefix('branches')->group(function () {
    Route::get('/', [BranchesController::class, 'index']);
    Route::post('create', [BranchesController::class, 'create']);
    Route::get('edit/{id}', [BranchesController::class, 'edit']);
    Route::post('store/{id}', [BranchesController::class, 'store']);
    Route::delete('delete/{id}', [BranchesController::class, 'delete']);
});