<?php

namespace App\Http\Controllers\UI;

use App\Constants\General;
use App\Constants\RC;
use App\Constants\TheURL;
use App\Http\Controllers\Controller;
use App\Services\SessionService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WebContentController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function content_detail($lco_id)
    {
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

        error_log('dt_content:'.json_encode($dt_content));
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return view('in-content.content_detail_logged_out', compact('dt_content'));
        }

        return view('in-content.content_detail', compact('dt_content'));
    }

    public function content_summary()
    {
        $content['lco_title'] = '';
        $content['lco_content'] = '';
        $response = Http::get(TheURL::$API_URL_CONTENT_SUMMARY.'/', null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $content = $dt_resp['data'];
        }
        error_log('content_summary:'.json_encode($content));

        $dt_content['summary'] = $content;

        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        $dt_content['title'] = 'All Media';

        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return view('in-content.content_detail_logged_out', compact('dt_content'));
        }

        return view('in-content.content_summary', compact('dt_content'));
    }

    public function profile()
    {
        $data = [];
        $content = null;
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_CLIENT_DETAIL, $data);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $content = $dt_resp['data'];
            }
        }

        error_log('CON :'.json_encode($content));

        $dt_content['dt_user'] = $content;

        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

        $dt_content['title'] = 'All Media';

        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            return view('in-content.content_detail_logged_out', compact('dt_content'));
        }

        return view('in-content.profile', compact('dt_content'));
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
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

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
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }

        $dt_content['contents'] = $contents;

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
        $counting = null;
        $response = Http::get(TheURL::$API_URL_DRAW_COUNTING, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $counting = $dt_resp['data'];
        }
        $dt_content['counting'] = $counting;
        $contents = null;
        $response = Http::get(TheURL::$API_URL_WEB_CONTENT_LIST, null);
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            $contents = $dt_resp['data']['row'];
        }
        $dt_content['contents'] = $contents;

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
            $dt_resp = $response->json();
            error_log('resp:'.json_encode($dt_resp));			// balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $dt_content['data'] = $dt_resp['data'];
                if ($dt_content['data']['size'] > 400000000000) {
                    $dt_content['url'] = TheURL::$BASE_MEMBER.'/assets/edusav/'.$dt_content['data']['file'];
                } else {
                    $dt_content['url'] = TheURL::$WEB_PLAY_VIDEO.'/'.$clv_key.'/'.session('access_token');
                }

                return view('in-content.video_access', compact('dt_content'));
            }
        }

        return view('in-content.video_access_no', compact('dt_content'));
    }

    public function content_access($clv_key)
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
        $response = Http::withToken(session('access_token'))->post(TheURL::$API_CHECK_VOUCHER_KEY, $data);
        if ($response->successful()) {
            $dt_resp = $response->json();
            error_log('resp:'.json_encode($dt_resp));     // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $dt_content['data'] = $dt_resp['data'];
                $dt_content['url'] = TheURL::$WEB_ACCESS_CONTENT.'/'.$clv_key.'/'.session('access_token');

                return view('in-content.content_access', compact('dt_content'));
            }
        }

        return view('in-content.video_access_no', compact('dt_content'));
    }

    public function video_access_stream($clv_key)
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
            $dt_resp = $response->json();
            error_log('resp:'.json_encode($dt_resp));     // balikan hasil dari API
            if ($dt_resp['rc'] == RC::SUCCESS) {
                $dt_content['data'] = $dt_resp['data'];
                $dt_content['url'] = TheURL::$WEB_PLAY_VIDEO_ANDROID.'/'.$clv_key.'/'.session('access_token');

                return view('in-content.video_access_stream', compact('dt_content'));
            }
        }

        return view('in-content.video_access_no', compact('dt_content'));
    }

    public function stream($path)
    {
        $size = filesize($path);

        $start = 0;
        $end = $size - 1;

        if (isset($_SERVER['HTTP_RANGE'])) {
            [$unit, $range] = explode('=', $_SERVER['HTTP_RANGE'], 2);
            [$rangeStart, $rangeEnd] = explode('-', $range);
            $start = intval($rangeStart);
            $end = $rangeEnd ? intval($rangeEnd) : $end;
        }

        $length = $end - $start + 1;

        while (ob_get_level()) {
            ob_end_clean();
        }
        header_remove();

        header('Content-Type: video/mp4');
        header('Accept-Ranges: bytes');
        header("Content-Length: $length");
        header("Content-Range: bytes $start-$end/$size");
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');

        $fp = fopen($path, 'rb');
        fseek($fp, $start);

        $buffer = 1024 * 102400; // 1MB
        $sent = 0;

        while (! feof($fp) && $sent < $length) {
            $read = min($buffer, $length - $sent);
            $data = fread($fp, $read);
            if ($data === false) {
                break;
            }

            echo $data;
            flush();
            $sent += strlen($data);
        }

        fclose($fp);
        exit;
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
                    $size = filesize($path);
                    $start = 0;
                    $length = $size;
                    $end = $size - 1;
                    $mime = File::mimeType($path);
                    error_log("MIME $mime");
                    if (strtolower($mime) == 'video/mp4') {
                        error_log('masuk video');

                        /*
                            $filePath = $path;
                            $fileSize = filesize($filePath);
                              $contentType = 'video/mp4'; // Or dynamically determine


                                if (isset($_SERVER['HTTP_RANGE'])) {
                            $range =  $_SERVER['HTTP_RANGE'];//$request->header('Range');
                                }
                            $start = 0;
                            $end = $fileSize - 1;
                            $statusCode = 200;
                            $headers = [
                                'Content-Type' => $contentType,
                                'Accept-Ranges' => 'bytes',
                            ];

                            if (isset($range)) {
                                $matches = [];
                           if (preg_match('/bytes=(\d+)-(\d*)/', $range, $matches)) {
                                $start = (int) $matches[1];
                                $end = ($matches[2] !== '') ? (int) $matches[2] : ($fileSize - 1);
                            }

                                $length = $end - $start + 1;
                                $statusCode = 206;
                                $headers['Content-Length'] = $length;
                                $headers['Content-Range'] = 'bytes ' . $start . '-' . $end . '/' . $fileSize;
                            } else {
                                $headers['Content-Length'] = $fileSize;
                            }

                            return new StreamedResponse(function () use ($filePath, $start, $end) {
                                $file = fopen($filePath, 'rb');
                                fseek($file, $start);

                        //        $bufferSize = 4096; // Adjust buffer size as needed
                            $bufferSize = 8192; // Lebih besar sedikit

                               $bytesRemaining = $end - $start + 1;

                                while ($bytesRemaining > 0 && !feof($file)) {
                                    $bytesToRead = min($bufferSize, $bytesRemaining);
                                    echo fread($file, $bytesToRead);
                                    ob_flush();
                                    flush();
                                    $bytesRemaining -= $bytesToRead;
                                }
                                fclose($file);
                            }, $statusCode, $headers);
                        */

                        //						$this->stream($path);
                        if (isset($_SERVER['HTTP_RANGE'])) {
                            // contoh: "Range: bytes=1000-"
                            [$unit, $range] = explode('=', $_SERVER['HTTP_RANGE'], 2);
                            [$rangeStart, $rangeEnd] = explode('-', $range);
                            $start = intval($rangeStart);
                            $end = $rangeEnd ? intval($rangeEnd) : ($size - 1);
                            $length = $end - $start + 1;
                        } else {
                            $start = 0;
                            $end = $size - 1;
                            $length = $size;
                        }

                        $contentLength = $length; // salin dulu, biar tidak berubah

                        error_log('ragne:'.$_SERVER['HTTP_RANGE']."  start = $start - end = $end - length=$length");

                        ini_set('implicit_flush', '1');

                        while (ob_get_level()) {
                            ob_end_clean();
                        }

                        ini_set('output_buffering', 'off');
                        ini_set('zlib.output_compression', '0');
                        set_time_limit(0);

                        if ($size < 20000000) {
                            return response()->stream(function () use ($path, $start, $length) {
                                $stream = fopen($path, 'rb');
                                fseek($stream, $start);
                                $buffer = 1024 * 8;
                                $sent = 0;
                                while ($length > 0 && ! feof($stream)) {
                                    $read = ($length > $buffer) ? $buffer : $length;
                                    $data = fread($stream, $read);
                                    $actualRead = strlen($data); // pastikan jumlah byte sebenarnya
                                    if ($actualRead === 0) {
                                        break;
                                    }
                                    echo $data;

                                    // if (function_exists('ob_flush')) ob_flush();
                                    flush();
                                    // ob_flush();

                                    //    $length -= $read;
                                    $length -= $actualRead;
                                    $sent += $actualRead;
                                }
                                error_log("streamed_bytes=$sent / expected=".($end - $start + 1));

                                error_log("start = $start - end = $end - length=$length");

                                fclose($stream);
                            }, ($start > 0 ? 206 : 200), [
                                'Content-Type' => File::mimeType($path),
                                'Content-Length' => $end - $start + 1,               // ✅ harus persis jumlah byte dikirim
                                'Content-Range' => "bytes $start-$end/$size", // ✅ konsisten
                                'Accept-Ranges' => 'bytes',
                                'Cache-Control' => 'no-cache',
                                'Connection' => 'keep-alive',
                                'Content-Disposition' => 'inline; filename="vide.mp4"',
                            ]);

                        } else {
                            return response()->stream(function () use ($path) {
                                $stream = fopen($path, 'rb');
                                fpassthru($stream);
                                fclose($stream);
                            }, 200, [
                                'Content-Type' => 'video/mp4',
                                'Content-Disposition' => 'inline; filename="video.mp4"',
                                'Accept-Ranges' => 'bytes',
                            ]);
                        }

                        /*
                             if (isset($_SERVER['HTTP_RANGE'])) {
                             preg_match('/bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches);
                             $start = intval($matches[1]);
                             $end = !empty($matches[2]) ? intval($matches[2]) : ($start + 1024 * 1024 - 1); // misal 1MB
                             $end = ($end >= $size) ? $size - 1 : $end;
                             $length = $end - $start + 1;
                             } else {
                             $start = 0;
                             $end = min($size - 1, 1024 * 1024 - 1); // hanya kirim 1MB pertama
                             $length = $end - $start + 1;
                             }

                             return response()->stream(function () use ($path, $start, $length) {
                             $stream = fopen($path, 'rb');
                             fseek($stream, $start);
                             $buffer = 8192;
                             while (!feof($stream) && $length > 0) {
                             $read = ($length > $buffer) ? $buffer : $length;
                             echo fread($stream, $read);
                             flush();
                             $length -= $read;
                             }
                             fclose($stream);
                             }, 206, [
                             'Content-Type' => 'video/mp4',
                             'Content-Length' => $length,
                             'Content-Range' => "bytes $start-$end/$size",
                             'Accept-Ranges' => 'bytes',
                             ]);
                         */
                        /*
                             return response()->stream(function () use ($path, $start, $length) {
                             $stream = fopen($path, 'rb');
                             fseek($stream, $start);
                             $buffer = 1024 * 8;

                             while ($length > 0 && !feof($stream)) {
                             $read = ($length > $buffer) ? $buffer : $length;
                             echo fread($stream, $read);
                             flush();
                             $length -= $read;
                             }
                             fclose($stream);
                             }, ($start > 0 ? 206 : 200), [
                             'Content-Type' => File::mimeType($path),
                             'Content-Length' => $length,
                             'Content-Range' => "bytes $start-$end/$size",
                             'Accept-Ranges' => 'bytes',
                             'Content-Disposition' => 'inline; filename="'.$file.'"',
                             ]);
                         */
                    } else {
                        return response()->stream(function () use ($path, $start, $length) {
                            $stream = fopen($path, 'rb');
                            fseek($stream, $start);
                            $buffer = 1024 * 8;

                            while ($length > 0 && ! feof($stream)) {
                                $read = ($length > $buffer) ? $buffer : $length;
                                echo fread($stream, $read);
                                flush();
                                $length -= $read;
                            }
                            fclose($stream);
                        }, ($start > 0 ? 206 : 200), [
                            'Content-Type' => File::mimeType($path),
                            'Content-Length' => $length,
                            'Content-Range' => "bytes $start-$end/$size",
                            'Accept-Ranges' => 'bytes',
                            'Content-Disposition' => 'inline; filename="'.$file.'"',
                        ]);

                    }

                }
            }
        }
        //   	return "";
    }

    // Previous code: returning endless buffering on the browser for certain videos.

    /*public function play_video_android($clv_key,$access_token) {
        $data['clv_key']=$clv_key;
        error_log("token:".json_encode($access_token));
        $response = Http::withToken($access_token)->post(TheURL::$API_CHECK_VIDEO_KEY, $data);
        error_log("ress:".json_encode($response));
        if ($response->successful()) {
            $dt_resp = $response->json(); // balikan hasil dari API
            error_log("dt_resp:".json_encode($dt_resp));
            if ($dt_resp['rc'] == RC::SUCCESS){
                $title = "Invest Info";
                $dt_content['title']= $title;
                $file=$dt_resp['data']['file'];
                error_log("File:".json_encode($dt_resp));
                $path = storage_path('app/public/edusav/' . $file);

                error_log("path:$path");
                if (!file_exists($path)) {
                    abort(404);
                }
                //
                //	 return response()->stream(function () use ($path) {
                //	 $stream = fopen($path, 'rb');
                //	 fpassthru($stream);
                //	 fclose($stream);
                //	 }, 200, [
                //	 'Content-Type' => 'video/mp4',
                //	 'Content-Disposition' => 'inline; filename="video.mp4"',
                //	 'Accept-Ranges' => 'bytes',
                //	 ]);
                //

                error_log("play_android mime sblm mime");
                $mime = mime_content_type($path); // biasanya video/mp4
                error_log("play_android mime stlh: $mime");
                $size = filesize($path);
                $start = 0;
                $end = $size - 1;
                error_log("play_android mime: $mime");

                if (isset($_SERVER['HTTP_RANGE'])) {
                    preg_match('/bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches);
                    $start = intval($matches[1]);
                    if (!empty($matches[2])) {
                        $end = intval($matches[2]);
                    }
                }

                $length = $end - $start + 1;

                if (strtolower($mime) == "video/mp4"){
                    $headers = [
                        'Content-Type' => $mime,
                        'Content-Length' => $length,
                        'Accept-Ranges' => 'bytes',
                        'Content-Range' => "bytes $start-$end/$size",
                    ];

                    if ($size<20000000){
                    return response()->stream(function () use ($path, $start, $length) {
                            $stream = fopen($path, 'rb');
                            fseek($stream, $start);
                            echo fread($stream, $length);
                            fclose($stream);
                            }, 206, $headers); // 206 Partial Content untuk streaming

            }else{
           return response()->stream(function () use ($path) {
           $stream = fopen($path, 'rb');
           fpassthru($stream);
           fclose($stream);
           }, 200, [
           'Content-Type' => 'video/mp4',
           'Content-Disposition' => 'inline; filename="video.mp4"',
           'Accept-Ranges' => 'bytes',
           'Content-Length' => $size,
           ]);
         }

                }else{
                    return response()->stream(function () use ($path, $start, $length) {
                            $stream = fopen($path, 'rb');
                            fseek($stream, $start);
                            $buffer = 1024 * 8;

                            while ($length > 0 && !feof($stream)) {
                            $read = ($length > $buffer) ? $buffer : $length;
                            echo fread($stream, $read);
                            flush();
                            $length -= $read;
                            }
                            fclose($stream);
                            }, ($start > 0 ? 206 : 200), [
                            'Content-Type' => File::mimeType($path),
                            'Content-Length' => $length,
                            'Content-Range' => "bytes $start-$end/$size",
                            'Accept-Ranges' => 'bytes',
                            'Content-Disposition' => 'inline; filename="'.$file.'"',
                            ]);

                }

            }
        }
        //    return "";
    }*/

    public function play_video_android($clv_key, $access_token)
    {
        $data['clv_key'] = $clv_key;
        error_log('token:'.json_encode($access_token));

        $response = Http::withToken($access_token)->post(TheURL::$API_CHECK_VIDEO_KEY, $data);
        error_log('ress:'.json_encode($response));

        if (! $response->successful()) {
            abort(403, 'Access token validation failed.');
        }

        $dt_resp = $response->json();
        error_log('dt_resp:'.json_encode($dt_resp));

        if ($dt_resp['rc'] != RC::SUCCESS) {
            abort(403, 'Video access denied or key invalid.');
        }

        $file = $dt_resp['data']['file'];
        $path = storage_path('app/public/edusav/'.$file);

        if (! file_exists($path)) {
            abort(404, 'Video file not found on server.');
        }

        $size = filesize($path);
        $mime = mime_content_type($path);

        $start = 0;
        $end = $size - 1;
        $statusCode = 200;

        if (isset($_SERVER['HTTP_RANGE'])) {
            preg_match('/bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches);
            $start = intval($matches[1]);

            if (! empty($matches[2])) {
                $end = intval($matches[2]);
            }

            $statusCode = 206;
        }

        $length = $end - $start + 1;

        $headers = [
            'Content-Type' => $mime,
            'Accept-Ranges' => 'bytes',
            'Content-Disposition' => 'inline; filename="'.$file.'"',
        ];

        if ($statusCode === 206) {
            $headers['Content-Length'] = $length;
            $headers['Content-Range'] = "bytes $start-$end/$size";
        } else {
            $headers['Content-Length'] = $size;
        }

        return response()->stream(function () use ($path, $start, $length) {
            $stream = fopen($path, 'rb');

            if ($stream === false) {
                return;
            }

            fseek($stream, $start);
            echo fread($stream, $length);

            fclose($stream);
        }, $statusCode, $headers);
    }

    public function content_voucher_web($clv_key, $access_token)
    {
        $data['clv_key'] = $clv_key;
        error_log('token:'.json_encode($access_token));

        if (session('access_token') != $access_token) {
            abort(403, 'Access token validation failed.');
        }

        $response = Http::withToken($access_token)->post(TheURL::$API_CHECK_VOUCHER_KEY, $data);
        error_log('ress:'.json_encode($response));

        if (! $response->successful()) {
            abort(403, 'Access token validation failed.');
        }

        $dt_resp = $response->json();
        error_log('dt_resp:'.json_encode($dt_resp));

        if ($dt_resp['rc'] != RC::SUCCESS) {
            abort(403, 'Video access denied or key invalid.');
        }

        $file = $dt_resp['data']['file'];
        $path = storage_path('app/public/edusav/barcodes/'.$file);

        if (! file_exists($path)) {
            abort(404, 'Video file not found on server.');
        }

        $size = filesize($path);
        $mime = mime_content_type($path);

        $start = 0;
        $end = $size - 1;
        $statusCode = 200;

        if (isset($_SERVER['HTTP_RANGE'])) {
            preg_match('/bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches);
            $start = intval($matches[1]);

            if (! empty($matches[2])) {
                $end = intval($matches[2]);
            }

            $statusCode = 206;
        }

        $length = $end - $start + 1;

        $headers = [
            'Content-Type' => $mime,
            'Accept-Ranges' => 'bytes',
            'Content-Disposition' => 'inline; filename="'.$file.'"',
        ];

        if ($statusCode === 206) {
            $headers['Content-Length'] = $length;
            $headers['Content-Range'] = "bytes $start-$end/$size";
        } else {
            $headers['Content-Length'] = $size;
        }

        return response()->stream(function () use ($path, $start, $length) {
            $stream = fopen($path, 'rb');

            if ($stream === false) {
                return;
            }

            fseek($stream, $start);
            echo fread($stream, $length);

            fclose($stream);
        }, $statusCode, $headers);
    }

    public function content_voucher_android($clv_key, $access_token)
    {
        $data['clv_key'] = $clv_key;
        error_log('token:'.json_encode($access_token));

        $response = Http::withToken($access_token)->post(TheURL::$API_CHECK_VOUCHER_KEY, $data);
        error_log('ress:'.json_encode($response));

        if (! $response->successful()) {
            abort(403, 'Access token validation failed.');
        }

        $dt_resp = $response->json();
        error_log('dt_resp:'.json_encode($dt_resp));

        if ($dt_resp['rc'] != RC::SUCCESS) {
            abort(403, 'Video access denied or key invalid.');
        }

        $file = $dt_resp['data']['file'];
        $path = storage_path('app/public/edusav/barcodes/'.$file);

        if (! file_exists($path)) {
            abort(404, 'Video file not found on server.');
        }

        $size = filesize($path);
        $mime = mime_content_type($path);

        $start = 0;
        $end = $size - 1;
        $statusCode = 200;

        if (isset($_SERVER['HTTP_RANGE'])) {
            preg_match('/bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches);
            $start = intval($matches[1]);

            if (! empty($matches[2])) {
                $end = intval($matches[2]);
            }

            $statusCode = 206;
        }

        $length = $end - $start + 1;

        $headers = [
            'Content-Type' => $mime,
            'Accept-Ranges' => 'bytes',
            'Content-Disposition' => 'inline; filename="'.$file.'"',
        ];

        if ($statusCode === 206) {
            $headers['Content-Length'] = $length;
            $headers['Content-Range'] = "bytes $start-$end/$size";
        } else {
            $headers['Content-Length'] = $size;
        }

        return response()->stream(function () use ($path, $start, $length) {
            $stream = fopen($path, 'rb');

            if ($stream === false) {
                return;
            }

            fseek($stream, $start);
            echo fread($stream, $length);

            fclose($stream);
        }, $statusCode, $headers);
    }
}
