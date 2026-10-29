<?php

namespace App\Http\Controllers\UI;

use App\Constants\General;
use App\Constants\TheURL;
use App\Http\Controllers\Controller;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;

class WebpageController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $sessionService = new SessionService;
        $dt_content['sessionService'] = new SessionService;

        if ($sessionService->has_access() == General::INVALID) {
            $dt_content['title'] = 'home';
            $dt_content['access'] = 0;

            return view('in-page.index', compact('dt_content'));
        } else {
            $dt_content['title'] = 'home';
            error_log('HOME access 1');
            $dt_content['access'] = 1;

            return view('in-page.index-access', compact('dt_content'));
        }
    }

    public function buy()
    {
        $contents = null;
        $sessionService = new SessionService;
        $dt_content['sessionService'] = new SessionService;

        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/wallet/topup');
            //      return redirect('/registration');
        } else {
            return redirect('/dashboard');
        }
    }

    public function home()
    {
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

        $dt_content['title'] = 'home';
        $dt_content['sessionService'] = new SessionService;
        $counting = null;
        $response = Http::get(TheURL::$API_URL_DRAW_COUNTING, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $counting = $dt_resp['data'];
        }
        $dt_content['counting'] = $counting;

        $sessionService = new SessionService;
        error_log('access:'.$sessionService->has_access());
        if ($sessionService->has_access() == General::INVALID) {
            $dt_content['access'] = 0;

            return view('in-page.home', compact('dt_content'));
        } else {
            error_log('HOME access 1');
            $dt_content['access'] = 1;

            return view('in-page.home-access', compact('dt_content'));
        }

        //    return view('in-page.home', compact('dt_content'));
    }

    public function registration()
    {

        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        $dt_content['title'] = 'home';
        $dt_content['cl_nickname'] = '';
        $dt_content['cl_pwd'] = '';
        $dt_content['cl_email'] = '';

        return view('in-page.registration', compact('dt_content'));
    }

    public function registration_first(Request $request)
    {

        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        $dt_content['title'] = 'home';
        $dt_content['cl_nickname'] = '';
        $dt_content['cl_pwd'] = '';
        $dt_content['cl_email'] = '';

        if ($request->isMethod('post') && $request->all()) {
            $data = $request->validate([
                'cl_nickname' => 'required',
                'cl_pwd' => 'required',
                'cl_email' => 'required',
                'lan' => '',
            ]);

            $dt_content['cl_nickname'] = $data['cl_nickname'];
            $dt_content['cl_pwd'] = $data['cl_pwd'];
            $dt_content['cl_email'] = $data['cl_email'];
        }

        return view('in-page.registration', compact('dt_content'));
    }

    public function do_registration(Request $request)
    {
        error_log('do_registration.'.json_encode($request->all()));
        if ($request->isMethod('post') && $request->all()) {
            error_log('do_');
            /*
                 $data = $request->validate([
                 'cl_nickname' => 'required',
                 'cl_name' => 'max:255',
                 'cl_lastname' => 'max:255',
                 'cl_address' => 'max:255',
                 'cl_dni' => 'max:255',
                 'cl_dob' => 'max:255',
                 'cl_email' => 'required|max:255',
                 'cl_evsn' => 'max:255',
                 'cl_iban' => 'max:255',
                 'cl_phone' => 'max:255',
                 'cl_pwd_confirmation' => '',
                 'cl_pwd' => 'required',
                 'lang' => '',
                 ]);
             */
            $data = $request->all();

            $data['cl_name'] = (array_key_exists('cl_name', $data) ? $data['cl_name'] : '');
            $data['cl_lastname'] = (array_key_exists('cl_lastname', $data) ? $data['cl_lastname'] : '');
            $data['cl_address'] = (array_key_exists('cl_address', $data) ? $data['cl_address'] : '');
            $data['cl_dni'] = (array_key_exists('cl_dni', $data) ? $data['cl_dni'] : '');
            $data['cl_dob'] = (array_key_exists('cl_dob', $data) ? $data['cl_dob'] : '');
            $data['cl_email'] = (array_key_exists('cl_email', $data) ? $data['cl_email'] : '');
            $data['cl_evsn'] = (array_key_exists('cl_evsn', $data) ? $data['cl_evsn'] : '');
            $data['cl_iban'] = (array_key_exists('cl_iban', $data) ? $data['cl_iban'] : '');
            $data['cl_phone'] = (array_key_exists('cl_phone', $data) ? $data['cl_phone'] : '');

            $lang = (array_key_exists('lang', $data) ? $data['lang'] : 'en');

            $response = Http::asForm()->post(TheURL::$API_REGISTER, $data);
            //      $dt_resp=json_decode($response);
            // error_log("Response DT: ".json_encode($dt_resp));

            $dt_content['message'] = preg_replace('/cl*nickname/', 'Username', $response['message']);
            $dt_content['reload'] = TheURL::$WEB_HOME;

        }
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        return view('in-page.notification', compact('dt_content'));
    }

    public function forgot_pwd()
    {

        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;
        $dt_content['title'] = 'Forgot Password';
        $dt_content['cl_nickname'] = '';
        $dt_content['cl_pwd'] = '';
        $dt_content['cl_email'] = '';

        return view('in-page.forgot_pwd', compact('dt_content'));
    }

    public function do_forgot_pwd(Request $request)
    {
        if ($request->isMethod('post') && $request->all()) {
            $data = $request->validate([
                'cl_nickname' => 'max:255',
                'cl_userid' => 'max:255',
                'lang' => '',
            ]);
            $data['cl_nickname'] = (array_key_exists('cl_nickname', $data) ? $data['cl_nickname'] : '');
            $data['cl_userid'] = (array_key_exists('cl_userid', $data) ? $data['cl_userid'] : '');

            $lang = (array_key_exists('lang', $data) ? $data['lang'] : 'en');

            $response = Http::asForm()->post(TheURL::$API_FORGOT_PWD, $data);
            error_log('Response: '.$response);
            $dt_resp = json_decode($response);
            error_log('Response DT: '.json_encode($dt_resp));

            $dt_content['message'] = $response['message'];
            $dt_content['reload'] = TheURL::$WEB_HOME;

        }

        return view('in-page.notification', compact('dt_content'));
    }

    public function reset_pwd($verify_code = '', $lang = 'en')
    {

        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        $dt_content['title'] = 'Reset Password';
        $dt_content['cl_nickname'] = '';
        $dt_content['verify_code'] = $verify_code;
        $dt_content['lang'] = $lang;

        return view('in-page.reset_pwd', compact('dt_content'));
    }

    public function do_reset_pwd(Request $request)
    {
        if ($request->isMethod('post') && $request->all()) {
            $data = $request->validate([
                'cl_pwd' => 'required|max:255|confirmed',
                'cl_pwd_confirmation' => '',
                'verify_code' => 'required|max:255',
            ]);
            $data['verify_code'] = (array_key_exists('verify_code', $data) ? $data['verify_code'] : '');

            $lang = (array_key_exists('lang', $data) ? $data['lang'] : 'en');

            $response = Http::asForm()->post(TheURL::$API_RESET_PASSWORD, $data);
            error_log('Response: '.$response);
            $dt_resp = json_decode($response);
            error_log('Response DT: '.json_encode($dt_resp));

            $dt_content['message'] = $response['message'];
            $dt_content['reload'] = TheURL::$WEB_HOME;

        }

        return view('in-page.notification', compact('dt_content'));
    }

    public function verify_code($verify_code = '', $lang = 'en')
    {
        // Call the API to verify the registration
        $verifyUrl = TheURL::$API_VERIFY_REGISTER.'/'.$verify_code.'/'.$lang;
        $response = Http::get($verifyUrl);

        $dt_content['verify_code'] = $verify_code;
        $dt_content['lang'] = $lang;
        $dt_content['title'] = 'Account Verification';

        if ($response->successful()) {
            $responseBody = $response->body();

            // Check if verification was successful based on the response message
            // The API returns a plain text message from Lang::get()
            if (str_contains($responseBody, 'success') || str_contains($responseBody, 'Success')) {
                $dt_content['status'] = 'success';
                $dt_content['message'] = $responseBody;
            } else {
                $dt_content['status'] = 'error';
                $dt_content['message'] = $responseBody;
            }
        } else {
            $dt_content['status'] = 'error';
            $dt_content['message'] = Lang::get('edusav.ErrorVerifyCode');
        }

        // Get content list for the page layout
        $contents = null;
        $contentResponse = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST);
        if ($contentResponse->successful()) {
            $dt_resp = $contentResponse->json();
            $contents = $dt_resp['data']['row'] ?? null;
        }
        $dt_content['contents'] = $contents;

        return view('in-page.verification', compact('dt_content'));
    }
}
