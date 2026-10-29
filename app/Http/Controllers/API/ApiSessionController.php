<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiSessionController extends Controller
{
    public function setSession(Request $request)
    {
        session(['token' => $request->token]);

        return response()->json(['message' => 'Session set']);
    }
}
