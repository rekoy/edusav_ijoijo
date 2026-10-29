<?php

namespace App\Services;

use App\Constants\General;

class SessionService
{
    public function has_access()
    {
        // dd($request->all());
        // Cek request POST
        $ses_dt_user = session('dt_user');
        // error_log("ssess:".json_encode($ses_dt_user));

        if (! $ses_dt_user) {
            return General::INVALID;
        }

        return $ses_dt_user['cl_client_type'];
        if ($ses_dt_user['cl_client_type'] != General::TYPE_ADMIN) {
            return General::INVALID;
        }

        return General::VALID;
    }
}
