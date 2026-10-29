<?php

namespace App\Http\Controllers\UI;

use App\Constants\General;
use App\Constants\RC;
use App\Constants\TheURL;
use App\Http\Controllers\Controller;
use App\Services\SessionService;
use Illuminate\Support\Facades\Http;

class WebDrawingController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function drawing()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');

        $dt_content['dt_user'] = $dt_user;
        $dt_content['title'] = 'Dashboard';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['get_credit_summary_client'] = TheURL::$API_CREDIT_GET_SUMMARY_CLIENT;
        $dt_content['url']['wallet_list_trx'] = TheURL::$API_WALLET_LIST_TRX;

        return view('in-drawing.drawing', compact('dt_content'));
    }

    public function my()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        $dt_content['dt_user'] = $dt_user;
        $dt_content['title'] = 'My Drawing Number';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['credit_list_trx'] = TheURL::$API_CREDIT_LIST_TRX;
        $counting = null;
        $response = Http::get(TheURL::$API_URL_DRAW_COUNTING, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $counting = $dt_resp['data'];
        }
        $dt_content['counting'] = $counting;
        $dt_row = [];

        $data['cl_id'] = $dt_user['cl_id'];
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_DRAWING_LIST_TRX, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                // error_log("Coutn:".json_encode($dt_resp));
                $dt_row = $dt_resp['data']['row'];
            }
        }
        $dt_content['dt_row'] = $dt_row;

        return view('in-drawing.my', compact('dt_content'));
    }

    public function draw_list()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }
        $dt_user = session('dt_user');
        $dt_content['dt_user'] = $dt_user;
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;
        $counting = null;
        $response = Http::get(TheURL::$API_URL_DRAW_COUNTING, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $counting = $dt_resp['data'];
        }
        $dt_content['counting'] = $counting;

        $dt_content['title'] = 'Dashboard';
        $dt_content['access_token'] = session('access_token');
        $data['draw_id'] = 0;
        //        $dt_content['dt_draw'] = [];
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_URL_DRAW_DETAIL, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $dt_content['dt_draw'] = $dt_resp['data'];
            }
        }
        $data['cl_id'] = $dt_user['cl_id'];

        return view('in-drawing.list_draw', compact('dt_content'));
    }

    public function my_win()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }
        $dt_user = session('dt_user');
        $dt_content['dt_user'] = $dt_user;
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;
        $counting = null;
        $response = Http::get(TheURL::$API_URL_DRAW_COUNTING, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $counting = $dt_resp['data'];
        }
        $dt_content['counting'] = $counting;

        $dt_content['title'] = 'Dashboard';
        $dt_content['access_token'] = session('access_token');
        $data['cl_id'] = $dt_user['cl_id'];
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_URL_WIN_LIST, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $dt_content['dt_win'] = $dt_resp['data'];
            }
        }
        $data['cl_id'] = $dt_user['cl_id'];

        return view('in-drawing.my_winner', compact('dt_content'));
    }
}
