<?php

use App\Http\Controllers\Admin\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\Ajax\AjaxSubCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\SoftwareController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Gallery\GalleryCategoryController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Portfolio\PortfolioController;
use App\Http\Controllers\Admin\Review\ReviewController;
use App\Http\Controllers\Admin\Review\ReviewtypeController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\Service\ServicefaqController;
use App\Http\Controllers\Admin\Service\ServicepackageController;
use App\Http\Controllers\Admin\Service\ServicesliderController;
use App\Http\Controllers\Admin\Setting\ChatSectionController;
use App\Http\Controllers\Admin\Setting\ContactSettingController;
use App\Http\Controllers\Admin\Setting\SideSettingController;
use App\Http\Controllers\Admin\Setting\SiteSettingController;
use App\Http\Controllers\Admin\Setting\SocialmediaSettingController;
use App\Http\Controllers\Admin\Setting\WebsiteSettingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('role', RoleController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('software', SoftwareController::class);
    Route::resource('blog', BlogController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::resource('role', RoleController::class);
    // Start Work

    Route::resource('category',           CategoryController::class);
    Route::resource('gallery',            GalleryController::class);
    Route::resource('user',               UserController::class);
    Route::resource('gallery',            GalleryController::class);
    Route::resource('gallery-category',   GalleryCategoryController::class);
    Route::resource('reviewtype',         ReviewtypeController::class);
    Route::resource('review',             ReviewController::class);
    Route::resource('portfolio',          PortfolioController::class);


    Route::resource('service',            ServiceController::class);
    Route::get('service/{id}/delete',[ ServicesliderController::class, 'removeImage'])->name('removesliderimage');
    Route::get('service/{id}/create-faq', [ServicefaqController::class, 'create'])->name('service.faq.create');
    Route::post('service/{id}/create-faq', [ServicefaqController::class, 'store'])->name('service.faq.store');

    Route::get('service/{id}/create-package',  [ServicepackageController::class, 'create'])->name('service.package.create')->middleware('can:service update');
    Route::post('service/{id}/create-package', [ServicepackageController::class, 'store'])->name('service.package.store');

    Route::get('service/{id}/create-slider',  [ServicesliderController::class, 'create'])->name('service.slider.create');
    Route::post('service/{id}/create-slider', [ServicesliderController::class, 'store'])->name('service.slider.store');
    // Ajax Calling
    Route::get('ajax/subcategory/{id}', [AjaxSubCategoryController::class, 'subcategoryByCategoryId']);

    Route::get('adminprofile/',[AdminProfileController::class,'adminProfile'])->name('admin.profile');
    Route::get('adminprofile/{id}/edit',[AdminProfileController::class,'editAdminProfile'])->name('admin.profile.edit');
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settingpage');
        Route::get('/site-setting', [SiteSettingController::class, 'sitesetting'])->name('sitesetting')->middleware('can:websitesetting');
        Route::get('/chat-section', [ChatSectionController::class, 'chatsection'])->name('chatsection');

        Route::get('/website-setting',[WebsiteSettingController::class,'websitesetting'])->name('website.setting');
        Route::post('/website-setting',[WebsiteSettingController::class,'websitestoresetting'])->name('website.setting.store');
        Route::get('/social-media',[SocialmediaSettingController::class,'socialmedia'])->name('socialmedia.setting');
        Route::post('/social-media/store',[SocialmediaSettingController::class,'socialmediastore'])->name('socialmedia.setting.store');
        Route::get('/contact-setting',[ContactSettingController::class,'contactsetting'])->name('contact.setting');
        Route::post('/contact-setting/store',[ContactSettingController::class,'contactsettingstore'])->name('contact.setting.store');
    });
});
