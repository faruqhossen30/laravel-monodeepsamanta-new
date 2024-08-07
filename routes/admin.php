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
use App\Http\Controllers\Admin\EditorImageController;
use App\Http\Controllers\Admin\Gallery\GalleryCategoryController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Portfolio\PortfolioContentController;
use App\Http\Controllers\Admin\Portfolio\PortfolioController;
use App\Http\Controllers\Admin\Portfolio\PortfolioImageController;
use App\Http\Controllers\Admin\Portfolio\PortfolioSectionController;
use App\Http\Controllers\Admin\Review\ReviewController;
use App\Http\Controllers\Admin\Review\ReviewtypeController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\Service\ServicefaqController;
use App\Http\Controllers\Admin\Service\ServicepackageController;
use App\Http\Controllers\Admin\Service\ServicesliderController;
use App\Http\Controllers\Admin\Setting\AboutmeSettingController;
use App\Http\Controllers\Admin\Setting\ChatSectionController;
use App\Http\Controllers\Admin\Setting\ContactSettingController;
use App\Http\Controllers\Admin\Setting\PortfolioVideoController;
use App\Http\Controllers\Admin\Setting\SideSettingController;
use App\Http\Controllers\Admin\Setting\SiteSettingController;
use App\Http\Controllers\Admin\Setting\SocialmediaSettingController;
use App\Http\Controllers\Admin\Setting\TestminialVideoController;
use App\Http\Controllers\Admin\Setting\WebsiteSettingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Skill\SkillController;
use App\Http\Controllers\Admin\Slider\SliderControler;
use App\Http\Controllers\Admin\UserController;


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('role', RoleController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('software', SoftwareController::class);
    Route::resource('blog', BlogController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('editor/image/store', [EditorImageController::class, 'store'])->name('editorimagestore');
    // Route::resource('role', RoleController::class);
    // Start Work

    Route::resource('category',           CategoryController::class);
    Route::resource('gallery',            GalleryController::class);
    Route::resource('user',               UserController::class);
    Route::resource('gallery',            GalleryController::class);
    Route::resource('gallery-category',   GalleryCategoryController::class);
    Route::resource('reviewtype',         ReviewtypeController::class);
    Route::resource('review',             ReviewController::class);
    Route::resource('skill',              SkillController::class);
    Route::resource('slider',             SliderControler::class);

    Route::resource('portfolio',          PortfolioController::class);
    // Route::get('portfolio/content/{id}', [PortfolioContentController::class, 'create'])->name('portfolioimage.create');
    // Route::post('portfolio/content/{id}', [PortfolioContentController::class, 'store'])->name('portfolioimage.store');

    Route::get( 'portfolio/section/{id}', [PortfolioSectionController::class, 'create'])->name('portfoliosection.create');
    Route::post('portfolio/section/{id}', [PortfolioSectionController::class, 'store'])->name('portfoliosection.store');


    Route::resource('service',            ServiceController::class);
    Route::get('service/{id}/delete',[    ServicesliderController::class, 'removeImage'])->name('removesliderimage');
    Route::get('service/{id}/create-faq', [ServicefaqController::class, 'create'])->name('service.faq.create');
    Route::post('service/{id}/create-faq',[ServicefaqController::class, 'store'])->name('service.faq.store');

    Route::get('service/{id}/create-package',  [ServicepackageController::class, 'create'])->name('service.package.create')->middleware('can:service update');
    Route::post('service/{id}/create-package', [ServicepackageController::class, 'store'])->name('service.package.store');

    Route::get('service/{id}/create-slider',  [ServicesliderController::class, 'create'])->name('service.slider.create');
    Route::post('service/{id}/create-slider', [ServicesliderController::class, 'store'])->name('service.slider.store');
    // Ajax Calling
    Route::get('ajax/subcategory/{id}', [AjaxSubCategoryController::class, 'subcategoryByCategoryId']);

    Route::get('profile/',[AdminProfileController::class,'adminProfile'])->name('admin.profile');
    Route::put('profile/update/{id}',[AdminProfileController::class,'UpdateAdminProfile'])->name('admin.profile.update');
    Route::get('profile/resetpassword/{id}',[AdminProfileController::class,'resetpasswordAdminProfile'])->name('admin.profile.resetpassword');
    Route::put('profile/changepassword/{id}',[AdminProfileController::class,'changepasswordProfile'])->name('admin.profile.changepassword');
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settingpage');
        Route::get('/site-setting', [SiteSettingController::class, 'sitesetting'])->name('sitesetting')->middleware('can:websitesetting');


        Route::get('/portfolio-video', [PortfolioVideoController::class, 'portfolioVideo'])->name('portfolio.video');
        Route::post('/portfolio-video/store', [PortfolioVideoController::class, 'portfolioVideoStore'])->name('portfolio.Video.store');

        Route::get('/testmonial-video', [TestminialVideoController::class, 'testmonialVideo'])->name('testmonial.video');
        Route::post('/testmonial-video/store', [TestminialVideoController::class, 'testmonialVideoStore'])->name('testmonial.video.store');

        Route::get('/website-setting',[WebsiteSettingController::class,'websitesetting'])->name('website.setting');
        Route::post('/website-setting',[WebsiteSettingController::class,'websitestoresetting'])->name('website.setting.store');
        Route::get('/social-media',[SocialmediaSettingController::class,'socialmedia'])->name('socialmedia.setting');
        Route::post('/social-media/store',[SocialmediaSettingController::class,'socialmediastore'])->name('socialmedia.setting.store');
        Route::get('/contact-setting',[ContactSettingController::class,'contactsetting'])->name('contact.setting');
        Route::post('/contact-setting/store',[ContactSettingController::class,'contactsettingstore'])->name('contact.setting.store');
        // Setting Start
        Route::get('/about-me',[AboutmeSettingController::class ,'aboutMeSetting'])->name('setting.aboutme');
        Route::post('/about-me/store',[AboutmeSettingController::class ,'aboutMesettingStore'])->name('setting.aboutme.store');
        Route::get('/chat-section', [ChatSectionController::class, 'chatsection'])->name('chatsection');
        Route::post('/chat-section/store', [ChatSectionController::class, 'chatsectionStore'])->name('chatsection.store');
    });
});
