<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SlideController;


Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('register', 'register')->name('register');
    Route::post('user/register', 'userregisterSave')->name('userregister.save');
 
    Route::get('/', 'login')->name('login');
    Route::post('/', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::get('destroy', 'destroy')->name('products.destroy');
    });

    Route::controller(NewsEventController::class)->prefix('newsevents')->group(function () {
        Route::get('', 'index')->name('newsevents');
        Route::get('get', 'getnewsevents')->name('newsevents.get');
        Route::post('store', 'store')->name('newsevents.store');
        Route::get('show', 'show')->name('newsevents.show');
        Route::get('edit/{id}', 'edit')->name('newsevents.edit');
        Route::post('update', 'update')->name('newsevents.update');
        Route::get('destroy', 'destroy')->name('newsevents.destroy');
    });
    Route::controller(EventController::class)->prefix('events')->group(function () {
        Route::get('', 'index')->name('events');
        Route::get('get', 'getnewsevents')->name('events.get');
         Route::post('store', 'store')->name('events.store');
        Route::get('show', 'show')->name('events.show');
        Route::post('update', 'update')->name('events.update');
        Route::get('destroy', 'destroy')->name('events.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/user', [App\Http\Controllers\AuthController::class, 'user'])->name('usersget');
    Route::get('/users', [App\Http\Controllers\AuthController::class, 'users'])->name('users.index');
    Route::get('/users/edit', [App\Http\Controllers\AuthController::class, 'edit'])->name('users.edit');
    Route::post('/users', [App\Http\Controllers\AuthController::class, 'update'])->name('users.update');    
    Route::delete('/users', [App\Http\Controllers\AuthController::class, 'destroy'])->name('users.destroy');
    Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/activity-log', [App\Http\Controllers\ActivityLogController::class, 'index'])->name('activity-log.index');
    Route::get('/export-pdf', [App\Http\Controllers\ActivityLogController::class, 'exportToPdf'])->name('export.pdf');
    Route::delete('/activity-log/{id}', [App\Http\Controllers\ActivityLogController::class, 'deleteActivityLog'])->name('delete.activity-log');
    // Show the form
    Route::get('/content/create', [ContentController::class, 'create'])->name('content.create');
    // Handle the form submission
    Route::post('/content/store', [ContentController::class, 'store'])->name('content.store');
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
    Route::get('/content/edit/{id}', [ContentController::class, 'contentedit'])->name('content.edit');

    Route::get('/content/{id}', [ContentController::class, 'destroy'])->name('content.delete');
    Route::post('/contentupdate', [ContentController::class,'contentupdate'])->name('content.update');
    Route::get('contentsget', [ContentController::class,'contentsget'])->name('contentsget');

    Route::get('/forgot-password', 'ForgotPasswordController@showForm')->name('password.request');
    Route::post('/forgot-password', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');


    Route::controller(NewsController::class)->prefix('news')->group(function () {
        Route::get('', 'index')->name('news');
    });
    Route::post('ResourceUploadFile', [NewsController::class,'ResourceUploadFile'])->name('ResourceUploadFile');
    Route::get('resourcefilesget', [NewsController::class,'resourcefilesget'])->name('resourcefilesget');
    Route::get('resourcefilesview', [NewsController::class,'resourcefilesview'])->name('resourcefilesview');
    Route::post('resourcefilesupdate', [NewsController::class,'resourcefilesupdate'])->name('resourcefilesupdate');
    Route::post('updateresourcefile', [NewsController::class,'updateresourcefile'])->name('updateresourcefile');
    Route::get('destroyresourcefile', [NewsController::class,'destroyresourcefile'])->name('destroyresourcefile');

    // side
    Route::get('/slide/list', [SlideController::class,'index'])->name('slide');
    Route::post('/slideimageupload', [SlideController::class,'slideimageupload'])->name('slideimageupload');
    Route::get('/slidesget', [SlideController::class,'slidesget'])->name('slidesget');
    Route::get('/slidesview', [SlideController::class,'slidesview'])->name('slidesview');
    Route::post('/slideupdate', [SlideController::class,'slideupdate'])->name('slideupdate');
    Route::get('/destroyslide', [SlideController::class,'destroyslide'])->name('destroyslide');


    // Route for creating a new slider
    // Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    // Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');

    // Route for listing sliders
    // Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');

    // Route for editing a slider
    // Route::get('/slider/{slider}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    // Route::put('/slider/{slider}', [SliderController::class, 'update'])->name('slider.update');

    // Route for deleting a slider
    // Route::delete('/slider/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');

    // Route for handling image uploads
    // Route::post('/slider/upload', [SliderController::class, 'uploadImage'])->name('slider.upload');
   
    Route::get('download', [NewsController::class,'externalfiels']);


});