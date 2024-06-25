<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\WebNewsController;
use App\Http\Controllers\WebProfileController;
use App\Http\Controllers\WebTrikController;
use App\Http\Controllers\WebVideosController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TrikController;
use App\Http\Controllers\CprofileController;

use Illuminate\Support\Facades\Route;

//UNTUK MENAMPILKAN FRONTEND BOWMASTERS
Route::get('', function () {
    // Mendapatkan data dari kedua controller
    $webVideos = app(WebVideosController::class)->index();
    $webnews = app(WebNewsController::class)->index();
    $trik = app(WebTrikController::class)->index();
    $profile = app(WebProfileController::class)->index();
    

    // Mengembalikan view welcome sambil mengirimkan data dari kedua controller
    return view('welcome', ['webvideos' => $webVideos, 'webnews' => $webnews, 'webtrik'=> $trik, 'profile' => $profile ]);
});

// Merge webvideos and webnews into home route
Route::get('/webvideos', [WebVideosController::class, 'index']);
Route::get('/webnews', [WebNewsController::class, 'index']);
Route::get('/webprofile', [WebProfileController::class, 'index']);
Route::get('/webtrik', [WebTrikController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

    Route::middleware('auth')->group(function () {
        // Change the view to 'videos' instead of 'dashboard'
        Route::get('/webvideos', [VideosController::class, 'index'])->name('videos.index');
        Route::post('webvideos/tambah', [VideosController::class, 'tambah']);
        Route::post('webvideos/hapus', [VideosController::class, 'hapus']);
        Route::post('webvideos/edit', [VideosController::class, 'edit']);
    });

    Route::middleware('auth')->group(function () {
        // Change the view to 'videos' instead of 'dashboard'
        Route::get('/webnews', [NewsController::class, 'index'])->name('news.index');
        Route::post('webnews/tambah', [NewsController::class, 'tambah']);
        Route::post('webnews/hapus', [NewsController::class, 'hapus']);
        Route::post('webnews/edit', [NewsController::class, 'edit']);
    });

    Route::middleware('auth')->group(function () {
        // Ubah tampilan menjadi 'trik' daripada 'dashboard'
        Route::get('/webtrik', [TrikController::class, 'index'])->name('trik.index');
        Route::post('webtrik/tambah', [TrikController::class, 'tambah']);
        Route::post('webtrik/hapus', [TrikController::class, 'hapus']);
        Route::post('webtrik/edit', [TrikController::class, 'edit']);
    });
    
    Route::middleware('auth')->group(function () {
        // Ubah tampilan menjadi 'profile' daripada 'dashboard'
        Route::get('/webprofile', [CprofileController::class, 'index'])->name('profile.index');
        Route::post('webprofile/tambah', [CprofileController::class, 'tambah']);
        Route::post('webprofile/hapus', [CprofileController::class, 'hapus']);
        Route::post('webprofile/edit', [CprofileController::class, 'edit']);
    });
    

    

require __DIR__.'/auth.php';
