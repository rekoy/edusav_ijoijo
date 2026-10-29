<?php

namespace App\Http\Controllers\UI;

use App\Constants\General;
use App\Constants\TheURL;
use App\Http\Controllers\Controller;
use App\Services\SessionService;

class JsController extends Controller
{
    public function edusav_all()
    {
        $sessionService = new SessionService;
        if ($sessionService->has_access() == General::INVALID) {
            //			return redirect('/login');
        }
        if ($sessionService->has_access() == General::TYPE_ADMIN) {
            //			return redirect(TheURL::$BASE_ADMIN);
        }

        $dt_user = session('dt_user');
        $dt_content['dt_user'] = $dt_user;
        $dt_content['access_token'] = session('access_token');

        return view('js/edusav_all', compact('dt_content'));
    }
}
