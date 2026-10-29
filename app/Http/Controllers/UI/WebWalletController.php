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

class WebWalletController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_wallet(Request $request)
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
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_WALLET_LIST, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                // error_log("Coutn:".json_encode($dt_resp));
                $dt_row = $dt_resp['data']['row'];
            }
        }
        $title = 'List Wallet';

        return view('in-wallet.list', compact('title', 'dt_row'));
    }

    public function list_trx_wallet($cl_id)
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
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_WALLET_LIST_TRX, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                // error_log("Coutn:".json_encode($dt_resp));
                $dt_row = $dt_resp['data']['row'];
            }
        }
        $title = 'List Transaksi Wallet';

        return view('in-wallet.list-trx', compact('title', 'dt_row'));
    }

    public function topup2()
    {
        $dt_content['title'] = 'Purchase Voucher';
        $dt_content['message'] = '';
    }

    public function topup()
    {
        $dt_content['title'] = 'Purchase Voucher';
        $dt_content['message'] = '';
        $data = [];
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            //			return redirect('/login');
            return view('in-wallet.topup-no-login', compact('dt_content', 'data'));
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        $data['dt_user'] = $dt_user;

        error_log('user:'.json_encode($dt_user));
        $invoice = ''.$dt_user['cl_userid'].'-'.time();
        $amount = 0; // $data['amount'];
        $mallId = env('DOKU_MERCHANT_ID');
        $sharedKey = env('DOKU_SHARED_KEY');

        error_log("amount: $amount - $mallId");

        $words = sha1($amount.$mallId.$sharedKey.$invoice);

        $data = [
            'MALLID' => $mallId,
            'KEY' => $sharedKey,
            'CHAINMERCHANT' => 'NA',
            'AMOUNT' => number_format($amount, 2, '.', ''),
            'PURCHASEAMOUNT' => number_format($amount, 2, '.', ''),
            'TRANSIDMERCHANT' => $invoice,
            'WORDS' => $words,
            'REQUESTDATETIME' => date('YmdHis'),
            'CURRENCY' => '360',
            'PURCHASECURRENCY' => '360',
            'SESSIONID' => session()->getId(),
            'NAME' => 'Agus R',
            'EMAIL' => '',
            'BASKET' => "Produk Test,{$amount},1,{$amount}",
            'PAYMENTCHANNEL' => '', // kosong = semua channel
            'URL' => route('doku.notify'),
            'BACKURL' => route('home'),
        ];
        $data['dt_user'] = $dt_user;

        return view('in-wallet.topup', compact('dt_content', 'data'));
    }

    public function inputRetail()
    {
        $title = 'Input Retail Wallet';

        return view('in-wallet.input-retail', compact('title'));
    }

    public function transaction()
    {
        $title = 'Wallet Transaction';

        return view('in-wallet.transaction', compact('title'));
    }

    public function do_topup(Request $request)
    {
        error_log('do_topup');
        $dt_content['message'] = '';
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        error_log('user:'.json_encode($dt_user));
        //		if ($request->isMethod('post') && $request->all()) {
        $data = $request->validate([
            'amount' => 'required',
        ]);
        $invoice = ''.$dt_user['cl_userid'].'-'.time();
        $amount = $data['amount'];
        $mallId = env('DOKU_MERCHANT_ID');
        $sharedKey = env('DOKU_SHARED_KEY');

        error_log("amount: $amount - $mallId");

        $words = sha1($amount.$mallId.$sharedKey.$invoice);

        $data = [
            'MALLID' => $mallId,
            'KEY' => $sharedKey,
            'CHAINMERCHANT' => 'NA',
            'AMOUNT' => number_format($amount, 2, '.', ''),
            'PURCHASEAMOUNT' => number_format($amount, 2, '.', ''),
            'TRANSIDMERCHANT' => $invoice,
            'WORDS' => $words,
            'REQUESTDATETIME' => date('YmdHis'),
            'CURRENCY' => '360',
            'PURCHASECURRENCY' => '360',
            'SESSIONID' => session()->getId(),
            'NAME' => 'Agus R',
            'EMAIL' => 'agus@example.com',
            'BASKET' => "Produk Test,{$amount},1,{$amount}",
            'PAYMENTCHANNEL' => '', // kosong = semua channel
            'URL' => route('doku.notify'),
            'BACKURL' => route('home'),
        ];
        $data['dt_user'] = $dt_user;

        return view('doku.redirect', compact('data'));

        //  }
        return view('in-page.notification', compact('dt_content'));
        //    return view('in-wallet.topup', compact('dt_content'));
    }

    public function doku_notify(Request $request)
    {
        $data = $request->all();

        $invoice = $data['TRANSIDMERCHANT'];
        $status = $data['RESULTMSG'];

        if ($status == 'SUCCESS') {
            // Update transaksi jadi sukses
        }

        return response('Continue', 200);
    }
}
