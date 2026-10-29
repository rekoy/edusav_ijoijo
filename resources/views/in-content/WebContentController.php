<?php

namespace App\Http\Controllers\UI;

use App\Constants\General;
use App\Constants\RC;
use App\Constants\TheURL;
use App\Http\Controllers\Controller;
use App\Services\SessionService;
use Illuminate\Support\Facades\Http;

class WebContentController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function content_detail($lco_id)
    {
        $sessionService = new SessionService;

        $content['lco_title'] = '';
        $content['lco_content'] = '';
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_DETAIL.'/'.$lco_id, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $content = $dt_resp['data'];
        }
        error_log("CON $lco_id:".json_encode($content));

        $dt_content['content'] = $content;

        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        $dt_content['title'] = 'All Media';

        if ($sessionService->has_access() == General::INVALID) {
            return view('in-content.content_detail_logged_out', compact('dt_content'));
        }

        return view('in-content.content_detail', compact('dt_content'));
    }

    public function dashboard()
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

        return view('in-content.dashboard', compact('dt_content'));
    }

    public function content_video()
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
        $dt_content['title'] = 'All Media';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['get_wallet_balance'] = TheURL::$API_WALLET_GET_WALLET_BALANCE;
        $dt_content['url']['wallet_list_trx'] = TheURL::$API_WALLET_LIST_TRX;

        return view('in-content.content_video', compact('dt_content'));
    }

    public function content_article()
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
        $dt_content['title'] = 'Article Content';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['get_wallet_balance'] = TheURL::$API_WALLET_GET_WALLET_BALANCE;
        $dt_content['url']['wallet_list_trx'] = TheURL::$API_WALLET_LIST_TRX;

        return view('in-content.content_article', compact('dt_content'));
    }

    public function content_ebook()
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
        $dt_content['title'] = 'Ebook Content';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['get_wallet_balance'] = TheURL::$API_WALLET_GET_WALLET_BALANCE;
        $dt_content['url']['wallet_list_trx'] = TheURL::$API_WALLET_LIST_TRX;

        return view('in-content.content_ebook', compact('dt_content'));
    }

    public function content_voucher()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        $access_token = session('access_token');
        $dt_content['dt_user'] = $dt_user;
        $dt_content['title'] = 'Dashboard';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['get_wallet_balance'] = TheURL::$API_WALLET_GET_WALLET_BALANCE;
        $dt_content['url']['wallet_list_trx'] = TheURL::$API_WALLET_LIST_TRX;

        return view('in-content.content_voucher', compact('dt_content'));

    }

    public function content()
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

        return view('in-content.content', compact('dt_content'));
    }

    public function content_history()
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

        return view('in-content.content_history', compact('dt_content'));
    }

    public function investInfo()
    {
        $title = 'Invest Info';
        $dt_content['dt_user'] = $dt_user;
        $dt_content['title'] = 'Dashboard';
        $dt_content['access_token'] = session('access_token');
        $dt_content['url']['get_wallet_balance'] = TheURL::$API_WALLET_GET_WALLET_BALANCE;
        $dt_content['url']['wallet_list_trx'] = TheURL::$API_WALLET_LIST_TRX;

        return view('in-content.invest_info', compact('dt_content'));
    }

    public function video_access($clv_key)
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        $title = 'access content';
        $data['clv_key'] = $clv_key;

        $dt_content['title'] = $title;
        $dt_content['clv_key'] = $clv_key;
        $dt_content['access_token'] = session('access_token');
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_CHECK_VIDEO_KEY, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $dt_content['url'] = TheURL::$WEB_PLAY_VIDEO.'/'.$clv_key.'/'.session('access_token');

                return view('in-content.video_access', compact('dt_content'));
            }
        }

        return view('in-content.video_access_no', compact('dt_content'));
    }

    public function play_video2($clv_key, $access_token)
    {

        /*
                $sessionService=new SessionService();
                if ($sessionService->has_access() == General::INVALID){
                    return redirect('/login');
                }
                if ($sessionService->has_access() == General::TYPE_ADMIN){
                    return redirect(TheURL::$BASE_ADMIN);
                }
        */
        $data['clv_key'] = $clv_key;
        if ($access_token == session('access_token')) {
            $response = Http::withToken($access_token)->post(TheURL::$API_CHECK_VIDEO_KEY, $data);
            if ($response->successful()) {
                $dt_resp = $response->json(); // balikan hasil dari API
                if ($dt_resp['rc'] == RC::SUCCESS) {
                    $title = 'Invest Info';
                    $dt_content['title'] = $title;
                    $file = $dt_resp['data']['file'];
                    error_log('File:'.json_encode($dt_resp));
                    $path = storage_path('app/public/edusav/'.$file);

                    error_log("path:$path");
                    if (! file_exists($path)) {
                        abort(404);
                    }

                    /*						return response()->stream(function () use ($path) {
                                                $stream = fopen($path, 'rb');
                                                fpassthru($stream);
                                                fclose($stream);
                                            }, 200, [
                                                'Content-Type' => 'video/mp4',
                                                'Content-Disposition' => 'inline; filename="video.mp4"',
                                                'Accept-Ranges' => 'bytes',
                                            ]);
                    */

                    $mime = mime_content_type($path); // biasanya video/mp4
                    $size = filesize($path);
                    $start = 0;
                    $end = $size - 1;

                    if (isset($_SERVER['HTTP_RANGE'])) {
                        preg_match('/bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches);
                        $start = intval($matches[1]);
                        if (! empty($matches[2])) {
                            $end = intval($matches[2]);
                        }
                    }

                    $length = $end - $start + 1;

                    $headers = [
                        'Content-Type' => $mime,
                        'Content-Length' => $length,
                        'Accept-Ranges' => 'bytes',
                        'Content-Range' => "bytes $start-$end/$size",
                    ];

                    return response()->stream(function () use ($path, $start, $length) {
                        $stream = fopen($path, 'rb');
                        fseek($stream, $start);
                        echo fread($stream, $length);
                        fclose($stream);
                    }, 206, $headers); // 206 Partial Content untuk streaming

                }
            }
        }
        //   	return "";
    }

    public function play_video_android($clv_key, $access_token)
    {
        $data['clv_key'] = $clv_key;
        $response = Http::withToken($access_token)->post(TheURL::$API_CHECK_VIDEO_KEY, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $title = 'Invest Info';
                $dt_content['title'] = $title;
                $file = $dt_resp['data']['file'];
                error_log('File:'.json_encode($dt_resp));
                $path = storage_path('app/public/edusav/'.$file);

                error_log("path:$path");
                if (! file_exists($path)) {
                    abort(404);
                }
                /*
                     return response()->stream(function () use ($path) {
                     $stream = fopen($path, 'rb');
                     fpassthru($stream);
                     fclose($stream);
                     }, 200, [
                     'Content-Type' => 'video/mp4',
                     'Content-Disposition' => 'inline; filename="video.mp4"',
                     'Accept-Ranges' => 'bytes',
                     ]);
                 */

                $mime = mime_content_type($path); // biasanya video/mp4
                $size = filesize($path);
                $start = 0;
                $end = $size - 1;

                if (isset($_SERVER['HTTP_RANGE'])) {
                    preg_match('/bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches);
                    $start = intval($matches[1]);
                    if (! empty($matches[2])) {
                        $end = intval($matches[2]);
                    }
                }

                $length = $end - $start + 1;

                $headers = [
                    'Content-Type' => $mime,
                    'Content-Length' => $length,
                    'Accept-Ranges' => 'bytes',
                    'Content-Range' => "bytes $start-$end/$size",
                ];

                return response()->stream(function () use ($path, $start, $length) {
                    $stream = fopen($path, 'rb');
                    fseek($stream, $start);
                    echo fread($stream, $length);
                    fclose($stream);
                }, 206, $headers); // 206 Partial Content untuk streaming

            }
        }
        //    return "";
    }
}
