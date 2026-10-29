<?php

namespace App\Http\Controllers\UI;

use App\Constants\General;
use App\Constants\TheURL;
use App\Http\Controllers\Controller;
use App\Services\SessionService;
use Illuminate\Support\Facades\Http;

class WebCouponController extends Controller
{
    public function coupon_available()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        $access_token = session('access_token');
        $dt_content['dt_user'] = $dt_user;
        $dt_content['title'] = 'Dashboard';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['coupon_available'] = TheURL::$API_WALLET_GET_WALLET_BALANCE;
        error_log('Masuk cupon.available');

        return view('in-coupon.coupon_available', compact('dt_content'));

    }

    public function coupon_my()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;
        $access_token = session('access_token');
        $dt_content['dt_user'] = $dt_user;
        $dt_content['title'] = 'Dashboard';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['coupon_my'] = TheURL::$API_WALLET_GET_WALLET_BALANCE;

        return view('in-coupon.my', compact('dt_content'));

    }
}
