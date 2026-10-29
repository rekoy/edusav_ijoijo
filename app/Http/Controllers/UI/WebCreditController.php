<?php

namespace App\Http\Controllers\UI;

use App\Constants\General;
use App\Constants\RC;
use App\Constants\TheURL;
use App\Http\Controllers\Controller;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class WebCreditController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_credit(Request $request)
    {
        $data = [];
        /*
            $data = $request->validate([
                'cl_id' => '',
                'cl_userid' => '',
                'cl_nickname' => '',
                'cl_active' => '',
                'search_txt' => '',
                'lang' => '',
                'offset' => '',
                'num' => '',
            ]);
            $lang= (array_key_exists('lang',$data) ? $data['lang'] : "in");
            $data['cl_userid']= (array_key_exists('cl_userid',$data) ? $data['cl_userid'] : "");
            $data['cl_id']= (array_key_exists('cl_id',$data) ? $data['cl_id'] : "0");
            $data['cl_nickname']= (array_key_exists('cl_nickname',$data) ? $data['cl_nickname'] : "");
            $data['cl_active']= (array_key_exists('cl_active',$data) ? $data['cl_active'] : "-1");
            $data['search_txt']= (array_key_exists('search_txt',$data) ? $data['search_txt'] : "");
            $data['offset']= (array_key_exists('offset',$data) ? $data['offset'] : "0");
            $data['num']= (array_key_exists('num',$data) ? $data['num'] : General::QUERY_NUM);
        */
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_MEMBER) {
            return redirect(TheURL::$BASE_MEMBER);
        }

        //    $ses_dt_user=session('dt_user');

        $dt_row = [];
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_CREDIT_LIST, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                // error_log("Coutn:".json_encode($dt_resp));
                $dt_row = $dt_resp['data']['row'];
            }
        }
        $title = 'List Credit';

        return view('in-credit.list', compact('title', 'dt_row'));
    }

    public function list_trx_credit($cl_id)
    {
        $data = ['cl_id' => $cl_id];
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_MEMBER) {
            return redirect(TheURL::$BASE_MEMBER);
        }

        $dt_row = [];
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_CREDIT_LIST_TRX, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                // error_log("Coutn:".json_encode($dt_resp));
                $dt_row = $dt_resp['data']['row'];
            }
        }
        $title = 'List Transaksi Credit';

        return view('in-credit.list-trx', compact('title', 'dt_row'));
    }

    public function available()
    {
        $title = 'Available Voucher';

        return view('in-credit.available', compact('title'));
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
        $dt_content['title'] = 'My Credit';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['credit_list_trx'] = TheURL::$API_CREDIT_LIST_TRX;
        $dt_row = [];
        $counting = null;
        $response = Http::get(TheURL::$API_URL_DRAW_COUNTING, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $counting = $dt_resp['data'];
        }
        $dt_content['counting'] = $counting;

        $data['cl_id'] = $dt_user['cl_id'];
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_CREDIT_LIST_TRX, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                // error_log("Coutn:".json_encode($dt_resp));
                $dt_row = $dt_resp['data']['row'];
            }
        }
        $dt_content['dt_row'] = $dt_row;

        return view('in-credit.my', compact('dt_content'));
    }

    public function transaction($credit_type)
    {
        $title = 'My Voucher';

        return view('in-credit.my', compact('title'));
    }
}
