<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CommissionPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\JoinPageController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/about/{about}', [AboutController::class, 'show']);
Route::post('/about', [AboutController::class, 'store']);
Route::put('/about/{about}', [AboutController::class, 'update']);
Route::delete('/about/{about}', [AboutController::class, 'destroy']);

Route::get('/artist', [ArtistController::class, 'index']);
Route::get('/artist/{artist}', [ArtistController::class, 'show']);
Route::post('/artist', [ArtistController::class, 'store']);
Route::put('/artist/{artist}', [ArtistController::class, 'update']);
Route::delete('/artist/{artist}', [ArtistController::class, 'destroy']);

Route::get('/commissions', [CommissionController::class, 'index']);
Route::get('/commissions/{commission}', [CommissionController::class, 'show']);
Route::post('/commissions', [CommissionController::class, 'store']);
Route::put('/commissions/{commission}', [CommissionController::class, 'update']);
Route::delete('/commissions/{commission}', [CommissionController::class, 'destroy']);

Route::get('/commission-page', [CommissionPageController::class, 'index']);
Route::get('/commission-page/{commission_page}', [CommissionPageController::class, 'show']);
Route::post('/commission-page', [CommissionPageController::class, 'store']);
Route::put('/commission-page/{commission_page}', [CommissionPageController::class, 'update']);
Route::delete('/commission-page/{commission_page}', [CommissionPageController::class, 'destroy']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::put('/contacts/{contact}', [ContactController::class, 'update']);
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

Route::get('/contact-page', [ContactPageController::class, 'index']);
Route::get('/contact-page/{contact_page}', [ContactPageController::class, 'show']);
Route::post('/contact-page', [ContactPageController::class, 'store']);
Route::put('/contact-page/{contact_page}', [ContactPageController::class, 'update']);
Route::delete('/contact-page/{contact_page}', [ContactPageController::class, 'destroy']);

Route::get('/galleries', [GalleryController::class, 'index']);
Route::get('/galleries/{gallery}', [GalleryController::class, 'show']);
Route::post('/galleries', [GalleryController::class, 'store']);
Route::put('/galleries/{gallery}', [GalleryController::class, 'update']);
Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy']);

Route::get('/home-sections', [HomeSectionController::class, 'index']);
Route::get('/home-sections/{home_section}', [HomeSectionController::class, 'show']);
Route::post('/home-sections', [HomeSectionController::class, 'store']);
Route::put('/home-sections/{home_section}', [HomeSectionController::class, 'update']);
Route::delete('/home-sections/{home_section}', [HomeSectionController::class, 'destroy']);

Route::get('/home-sliders', [HomeSliderController::class, 'index']);
Route::get('/home-sliders/{home_slider}', [HomeSliderController::class, 'show']);
Route::post('/home-sliders', [HomeSliderController::class, 'store']);
Route::put('/home-sliders/{home_slider}', [HomeSliderController::class, 'update']);
Route::delete('/home-sliders/{home_slider}', [HomeSliderController::class, 'destroy']);

Route::get('/join', [JoinController::class, 'index']);
Route::get('/join/{join}', [JoinController::class, 'show']);
Route::post('/join', [JoinController::class, 'store']);
Route::put('/join/{join}', [JoinController::class, 'update']);
Route::delete('/join/{join}', [JoinController::class, 'destroy']);

Route::get('/join-page', [JoinPageController::class, 'index']);
Route::get('/join-page/{join_page}', [JoinPageController::class, 'show']);
Route::post('/join-page', [JoinPageController::class, 'store']);
Route::put('/join-page/{join_page}', [JoinPageController::class, 'update']);
Route::delete('/join-page/{join_page}', [JoinPageController::class, 'destroy']);

Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index']);
Route::get('/privacy-policy/{privacy_policy}', [PrivacyPolicyController::class, 'show']);
Route::post('/privacy-policy', [PrivacyPolicyController::class, 'store']);
Route::put('/privacy-policy/{privacy_policy}', [PrivacyPolicyController::class, 'update']);
Route::delete('/privacy-policy/{privacy_policy}', [PrivacyPolicyController::class, 'destroy']);

Route::get('/shop', [ShopController::class, 'index']);
Route::get('/shop/{shop}', [ShopController::class, 'show']);
Route::post('/shop', [ShopController::class, 'store']);
Route::put('/shop/{shop}', [ShopController::class, 'update']);
Route::delete('/shop/{shop}', [ShopController::class, 'destroy']);

Route::get('/shop-images', [ShopImageController::class, 'index']);
Route::get('/shop-images/{shop_image}', [ShopImageController::class, 'show']);
Route::post('/shop-images', [ShopImageController::class, 'store']);
Route::put('/shop-images/{shop_image}', [ShopImageController::class, 'update']);
Route::delete('/shop-images/{shop_image}', [ShopImageController::class, 'destroy']);

Route::get('files', [FileController::class, 'index']);
Route::post('files', [FileController::class, 'upload'])->name('file.store');
