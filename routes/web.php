<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\pages\PagesController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
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
Route::get('/profile', [PagesController::class, 'index']);
Route::get('/tentang/saya', [PagesController::class, 'about']);
Route::get('/detail', [PagesController::class, 'credentials']);
Route::get('/pekerjaan', [PagesController::class, 'project']);
Route::get('/detail/{id}/project', [PagesController::class, 'detailProject']);
Route::get('/contact', [PagesController::class, 'contact']);

Route::get('/', function () {
    return redirect('/profile');
});
Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login_action'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Users
    Route::get('/users', [OperatorController::class, 'index'])->name('users');
    Route::post('/users/plus', [OperatorController::class, 'store']);
    Route::post('/users/{id}/update', [OperatorController::class, 'update']);
    Route::get('/users/{id}/delete', [OperatorController::class, 'destroy']);

    // kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/kategori-tambah', [KategoriController::class, 'store']);
    Route::post('/edit/{id}/kategori', [KategoriController::class, 'update']);
    Route::get('/hapus/{id}/kategori', [KategoriController::class, 'destroy']);

    // skill
    Route::get('/skil', [SkillController::class, 'index'])->name('skil');
    Route::post('/skil-tambah', [skillController::class, 'store']);
    Route::post('/edit/{id}/skil', [skillController::class, 'update']);
    Route::get('/hapus/{id}/skil', [skillController::class, 'destroy']);

    // about
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::post('/about-tambah', [AboutController::class, 'store']);
    Route::post('/edit/{id}/about', [AboutController::class, 'update']);
    Route::get('/hapus/{id}/about', [AboutController::class, 'destroy']);

    // Project
    Route::get('/project', [ProjectController::class, 'index']);
    Route::get('/tambah/project', [ProjectController::class, 'tambah']);
    Route::post('/tambah/project', [ProjectController::class, 'store']);
    Route::get('/edit/{id}/project', [ProjectController::class, 'edit']);
    Route::post('/edit/{id}/project', [ProjectController::class, 'update']);
    Route::get('/hapus/{id}/project', [ProjectController::class, 'destroy']);
    Route::get('/foto/{id}', [ProjectController::class, 'foto'])->name('project.foto');

    // pengalaman
    Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman');
    Route::post('/tambah/pengalaman', [PengalamanController::class, 'store']);
    Route::post('/edit/{id}/pengalaman', [PengalamanController::class, 'update']);
    Route::get('/hapus/{id}/pengalaman', [PengalamanController::class, 'destroy']);

    Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan');
    Route::post('/tambah/pendidikan', [PendidikanController::class, 'store']);
    Route::post('/edit/{id}/pendidikan', [PendidikanController::class, 'update']);
    Route::get('/hapus/{id}/pendidikan', [PendidikanController::class, 'destroy']);

    //logout
    Route::get('/logout', [LoginController::class, 'logout']);
});
