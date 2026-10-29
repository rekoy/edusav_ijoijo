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

class WebAccountController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            $title = 'home';

            return view('in-page.login', compact('title'));
        }

        return redirect('/dashboard');
    }

    public function do_login(Request $request)
    {
        // dd($request->all());
        // Cek request POST
        if ($request->isMethod('post') && $request->all()) {
            $data = $request->validate([
                'cl_nickname' => 'required',
                'cl_pwd' => 'required',
                'lan' => '',
            ]);
            $response = Http::post(TheURL::$API_LOGIN, $data);
            $message = '';
            if ($response->successful()) {
                $dt_resp = $response->json(); // balikan hasil dari API
                if ($dt_resp['rc'] == RC::SUCCESS) {
                    Session::put('dt_user', $dt_resp['data']);
                    Session::put('access_token', $dt_resp['access_token']);
                    $title = 'dashboard';

                    return redirect('/dashboard');
                } else {
                    $dt_content['message'] = $dt_resp['message'] ?? '';
                    $dt_content['title'] = 'home';
                    $dt_content['cl_nickname'] = '';
                    $dt_content['cl_pwd'] = '';
                    $dt_content['cl_email'] = '';

                    return view('in-page.info', compact('dt_content'));
                }
            }

        }
        $dt_content['message'] = $message;
        $dt_content['title'] = 'home';
        $dt_content['cl_nickname'] = '';
        $dt_content['cl_pwd'] = '';
        $dt_content['cl_email'] = '';

        return view('in-page.info', compact('dt_content'));

        return redirect('/login');
    }

    public function do_login_ajax(Request $request)
    {
        // dd($request->all());
        // Cek request POST
        if ($request->isMethod('post') && $request->all()) {
            $data = $request->validate([
                'cl_nickname' => 'required',
                'cl_pwd' => 'required',
                'lan' => '',
            ]);
            $response = Http::post(TheURL::$API_LOGIN, $data);
            $dt_resp = null;
            if ($response->successful()) {
                $dt_resp = $response->json(); // balikan hasil dari API
                if ($dt_resp['rc'] == RC::SUCCESS) {
                    Session::put('dt_user', $dt_resp['data']);
                    Session::put('access_token', $dt_resp['access_token']);
                    $title = 'dashboard';
                    //				return redirect('/dashboard');
                }
            }

            return response($dt_resp);

        }

        return response(['rc' => '001', 'msg' => 'error. try again', 'user' => null, 'access_token' => null]);

    }

    public function logout(Request $request)
    {
        // dd($request->all());
        // Cek request POST
        $response = Http::post(TheURL::$API_LOGOUT);
        Session::put('dt_user', null);
        Session::put('access_token', null);

        return redirect('/login');

    }
}
