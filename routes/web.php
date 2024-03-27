<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutpageController;
use App\Http\Controllers\Ajax\GalleryAjaxController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\BlogComtroller;
use App\Http\Controllers\BlogpageController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ContuctController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PortfoliopageController;
use App\Http\Controllers\PricepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewpageController;
use App\Http\Controllers\ServicepageController;
use App\Http\Controllers\TearmsController;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('portfolio', [PortfoliopageController::class, 'index'])->name('portfoliopage');
Route::get('portfolio/{slug}', [PortfoliopageController::class, 'singlePortfolio'])->name('singleportfolio');
Route::get('about-me', [AboutpageController::class, 'index'])->name('aboutpage');
Route::get('services', [ServicepageController::class, 'index'])->name('servicepage');
Route::get('services/{slug}', [ServicepageController::class, 'singleService'])->name('singleservice');
Route::get('reviews', [ReviewpageController::class, 'index'])->name('reviewpage');
Route::get('blogs', [BlogpageController::class, 'index'])->name('blogpage');

Route::get('/test', function () {
    return view('test');
});


Route::group(['prefix' => 'ajax'], function () {
    Route::get('galleries', [GalleryAjaxController::class, 'getGallery'])->name('ajax.galleries');
    Route::get('galleries/paginate', [GalleryAjaxController::class, 'getPaginateGallery']);
    // Multi Photo Modal
    Route::get('multi-photo/galleries', [GalleryAjaxController::class, 'getMultiPhotoGallery'])->name('ajax.multiphto.galleries');
    Route::get('multi-photo/galleries/paginate', [GalleryAjaxController::class, 'getPaginateMultiPhotoGallery']);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
