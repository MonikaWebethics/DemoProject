<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumImagesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\UpdateController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredController;

Route::middleware('auth')->group(function () {
    Route::get('user-profile', [UserProfileController::class, 'userProfile'])
    ->name('userProfile');
    Route::get('change-password', [ChangePasswordController::class, 'showForm'])->name('change.password.form');
    Route::post('change-password', [ChangePasswordController::class, 'updatePassword'])->name('change.password');
    Route::get('user/profile', [UpdateController::class, 'editUser'])->name('user.profile.edit');
    Route::post('user/profile', [UpdateController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');

});


Route::middleware('guest')->group(function () {
Route::get('register', [RegisteredController::class, 'create'])
->name('register');
Route::post('register', [RegisteredController::class, 'store']);
Route::get('login', [AuthenticatedSessionController::class, 'create'])
->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::controller(PagesController::class)->group(function () {
    Route::get('/','viewHome')->name('index');
    Route::get('/about-us','viewAbout')->name('about');
});

// Route::controller(AlbumController::class)->group(function () {
//     Route::get('/album','album')->name('album');
//     Route::get('/add-album','addAlbum')->name('addAlbum');
//     Route::get('/album-images','albumImages')->name('albumImages');
//     Route::get('/add-images','addImages')->name('addImages');
    
// });

Route::group(['prefix' => 'album'], function () {
    Route::get('/', [AlbumController::class, 'album'])->name('album');
    Route::get('/create', [AlbumController::class, 'create'])->name('addAlbum');
    Route::post('/create', [AlbumController::class, 'store'])->name('store');
    // Route::get('/{slug}/edit', [AlbumController::class, 'edit'])->name('edit');
    // Route::put('/{slug}/edit', [AlbumController::class, 'update'])->name('update');
    Route::delete('/{id}', [AlbumController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'AlbumImages'], function () {
    Route::get('/{id}', [AlbumImagesController::class, 'albumImages'])->name('albumImages');
    Route::get('/{id}/create', [AlbumImagesController::class, 'create'])->name('addImages');
    Route::post('/{id}/create', [AlbumImagesController::class, 'store'])->name('store');
    // Route::get('/{slug}/edit', [AlbumImagesController::class, 'edit'])->name('edit');
    // Route::put('/{slug}/edit', [AlbumImagesController::class, 'update'])->name('update');
    Route::delete('/{id}', [AlbumImagesController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogController::class, 'blog'])->name('blog');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/create', [BlogController::class, 'store'])->name('store');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
    Route::get('/{slug}/edit', [BlogController::class, 'edit'])->name('edit');
    Route::put('/{slug}/edit', [BlogController::class, 'update'])->name('update');
    Route::delete('/{slug}', [BlogController::class, 'destroy'])->name('destroy');
});



Route::fallback(function(){
    return "<h1>Page Not Found</h1>";
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

?>


