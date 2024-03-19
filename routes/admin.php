<?php

use App\Http\Controllers\Admin\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Ajax\AjaxSubCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\SoftwareController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\Admin\Gallery\GalleryCategoryController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Setting\ChatSectionController;
use App\Http\Controllers\Admin\Setting\SideSettingController;
use App\Http\Controllers\Admin\Setting\SiteSettingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('role',RoleController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('software', SoftwareController::class);
    Route::resource('blog', BlogController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::resource('role', RoleController::class);
    // Start Work

    Route::resource('category', CategoryController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('user', UserController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('gallery-category', GalleryCategoryController::class);

    // Ajax Calling
    Route::get('ajax/subcategory/{id}', [AjaxSubCategoryController::class, 'subcategoryByCategoryId']);

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/',[SettingController::class,'index'])->name('settingpage');
        Route::get('/site-setting',[SiteSettingController::class,'sitesetting'])->name('sitesetting');
        Route::get('/chat-section',[ChatSectionController::class,'chatsection'])->name('chatsection');
    });
});

