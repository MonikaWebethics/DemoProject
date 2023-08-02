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
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserBlogController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

Route::middleware('auth','verified')->group(function () {
    Route::get('user-profile', [UserProfileController::class, 'userProfile'])
    ->name('userProfile');
    Route::get('change-password', [ChangePasswordController::class, 'showForm'])->name('change.password.form');
    Route::post('change-password', [ChangePasswordController::class, 'updatePassword'])->name('change.password');
    Route::get('user/profile', [UpdateController::class, 'editUser'])->name('user.profile.edit');
    Route::post('api/fetch-state-user', [UserProfileController::class, 'fatchStateUserProfile'])
->name('fetch-state-user');
    Route::post('user/profile', [UpdateController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
    // Route::get('/search', [AlbumController::class, 'search'])->name('searchAlbum');
    Route::group(['prefix' => 'album'], function () {
        Route::get('/', [AlbumController::class, 'album'])->name('album');
        Route::get('/search', [AlbumController::class, 'search'])->name('searchAlbum');
        Route::get('/create', [AlbumController::class, 'create'])->name('addAlbum');
        Route::post('/create', [AlbumController::class, 'store'])->name('store');
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
    Route::get('/search', [UserBlogController::class, 'search'])->name('user.search');
    Route::get('/user-blog', [UserBlogController::class, 'blog'])->name('user.blog');
    Route::get('/user/{slug}', [BlogController::class, 'show'])->name('user.show');
    Route::get('/create', [UserBlogController::class, 'create'])->name('create');
    Route::post('/create', [UserBlogController::class, 'store'])->name('store');
    Route::get('/{slug}/edit', [UserBlogController::class, 'edit'])->name('edit');
    Route::put('/{slug}/edit', [UserBlogController::class, 'update'])->name('update');
    Route::delete('/{slug}', [UserBlogController::class, 'destroy'])->name('destroy');
});

    
});

Route::get('/load-data', 'DataController@loadData')->name('load.data');


Route::middleware('guest')->group(function () {
Route::get('register', [RegisterController::class, 'create'])
->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [AuthenticatedSessionController::class, 'show'])
->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('api/fetch-state', [RegisterController::class, 'fatchState'])
->name('fetch-state');

});

  
Route::get('/search', [BlogController::class, 'search'])->name('search.blog');
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogController::class, 'blog'])->name('blog');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');

});

Route::controller(PagesController::class)->group(function () {
    Route::get('/','viewHome')->name('index');
    Route::get('/about-us','viewAbout')->name('about');
});


// Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    session()->flash('status', 'Email verification successful! Please log in.');
     if (Auth::check()) {
                Auth::logout();
            }
            return redirect()->route('login');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route for resending verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification email sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::fallback(function(){
    return "<h1>Page Not Found</h1>";
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

?>


