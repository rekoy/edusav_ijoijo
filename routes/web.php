<?php

use App\Http\Controllers\API\ApiSessionController;
use App\Http\Controllers\UI\JsController;
use App\Http\Controllers\UI\WebAccountController;
use App\Http\Controllers\UI\WebContentController;
use App\Http\Controllers\UI\WebCouponController;
use App\Http\Controllers\UI\WebCreditController;
use App\Http\Controllers\UI\WebDrawingController;
use App\Http\Controllers\UI\WebpageController;
use App\Http\Controllers\UI\WebTicketController;
use App\Http\Controllers\UI\WebWalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [WebpageController::class, 'index'])->name('index');
Route::get('/buy', [WebpageController::class, 'buy'])->name('buy');
Route::get('/index', [WebpageController::class, 'index'])->name('index');
Route::get('/home', [WebpageController::class, 'home'])->name('home');
Route::get('/registration', [WebpageController::class, 'registration'])->name('registration');
Route::post('/registration_first', [WebpageController::class, 'registration_first'])->name('registration_first');
Route::post('/do_registration', [WebpageController::class, 'do_registration'])->name('do_registration');
Route::get('/member/index', [WebpageController::class, 'index'])->name('index-member');
Route::get('/member/home', [WebpageController::class, 'home'])->name('home-member');
Route::get('/member/registration', [WebpageController::class, 'registration'])->name('registration-member');

Route::get('/forgot_pwd', [WebpageController::class, 'forgot_pwd'])->name('forgot_pwd');
Route::post('/do_forgot_pwd', [WebpageController::class, 'do_forgot_pwd'])->name('do_forgot_pwd');

Route::get('/reset_pwd/{verify_code}/{lang}', [WebpageController::class, 'reset_pwd'])->name('reset_pwd');
Route::post('/do_reset_pwd', [WebpageController::class, 'do_reset_pwd'])->name('do_reset_pwd');

Route::get('/login', [WebAccountController::class, 'login'])->name('login');
Route::post('/do_login', [WebAccountController::class, 'do_login'])->name('login-post');
Route::post('/do_login_ajax', [WebAccountController::class, 'do_login_ajax'])->name('login-post-ajax');
Route::get('/logout', [WebAccountController::class, 'logout'])->name('logout');

Route::get('/dashboard', [WebContentController::class, 'dashboard'])->name('dashboard');
Route::get('/content', [WebContentController::class, 'content'])->name('content');
Route::get('/content_video', [WebContentController::class, 'content_video'])->name('content-video');
Route::get('/content_article', [WebContentController::class, 'content_article'])->name('content-article');
Route::get('/content_ebook', [WebContentController::class, 'content_ebook'])->name('content-ebook');
Route::get('/content_history', [WebContentController::class, 'content_history'])->name('content-history');
Route::get('/content/detail/{lco_id}', [WebContentController::class, 'content_detail'])->name('content-detail');
Route::get('/content/summary', [WebContentController::class, 'content_summary'])->name('content-summary');

Route::get('/profile', [WebContentController::class, 'profile'])->name('profile');
Route::get('/update_profile', [WebContentController::class, 'update_profile'])->name('update_profile');

Route::get('/video/access/{video_key}', [WebContentController::class, 'video_access'])->name('video-access');
Route::get('/video/access/stream/{video_key}', [WebContentController::class, 'video_access_stream'])->name('video-access');
Route::get('/content/access/{clv_key}', [WebContentController::class, 'content_access'])->name('content-access');

Route::get('/video/play/{video_key}/{token}', [WebContentController::class, 'play_video2'])->name('video-play');

Route::get('/video/play_android/{video_key}/{token}', [WebContentController::class, 'play_video_android'])->name('video-play');
Route::get('/content/voucher_android/{clv_key}/{token}', [WebContentController::class, 'content_voucher_android'])->name('content_voucher_android');
Route::get('/content/voucher_web/{clv_key}/{token}', [WebContentController::class, 'content_voucher_web'])->name('content_voucher_web');

Route::get('/wallet/topup', [WebWalletController::class, 'topup'])->name('wallet.topup');
Route::post('/wallet/do_topup', [WebWalletController::class, 'do_topup'])->name('do.wallet.topup');
Route::get('/wallet/input-retail', [WebWalletController::class, 'inputRetail'])->name('wallet.inputRetail');
Route::get('/wallet/transaction', [WebWalletController::class, 'transaction'])->name('wallet.transaction');

Route::post('/doku/notify', [WebWalletController::class, 'doku_notify'])->name('doku.notify');

Route::get('/unit/buy', [WebTicketController::class, 'buy'])->name('unit.buy');
Route::get('/unit/transaction', [WebTicketController::class, 'transaction'])->name('unit.transaction');

Route::get('/coupon/available', [WebCouponController::class, 'coupon_available'])->name('coupon-available');
Route::get('/coupon/my', [WebCouponController::class, 'coupon_my'])->name('coupon.my');
Route::get('/content_voucher', [WebCouponController::class, 'coupon_available'])->name('content-voucher');
Route::get('/voucher/my', [WebCreditController::class, 'my'])->name('voucher.my');
Route::get('/credit/transaction/{credit_type}', [WebCreditController::class, 'credit_transaction'])->name('credit.transaction');
Route::get('/credit/my', [WebCreditController::class, 'my'])->name('credit.my');

Route::get('/invest/info', [WebContentController::class, 'investInfo'])->name('invest.info');

Route::get('/drawing', [WebDrawingController::class, 'drawing'])->name('drawing');
Route::get('/drawing/my', [WebDrawingController::class, 'my'])->name('drawing.my');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    //    return $request->user();
});

Route::post('/set-session', [ApiSessionController::class, 'setSession']);

Route::get('/js/edusav_all.js', [JsController::class, 'edusav_all'])->name('js-edusav-all');

Route::get('/draw/list', [WebDrawingController::class, 'draw_list'])->name('draw-list');
Route::get('/draw/my_win', [WebDrawingController::class, 'my_win'])->name('draw-my-win');

Route::get('/verification/{verify_code}/{lang}', [WebpageController::class, 'verify_code'])->name('verification');
