<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ActionLogModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['rc' => '000', 'user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        $actionData = $loginData;
        $actionData['password'] = 'xxxxxxx';
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = $loginData['email'];
        $actionLogModel->action = 'LOGIN';
        $actionLogModel->request = json_encode($actionData);

        $loginData['status'] = 'ACTIVE';
        if (! auth()->attempt($loginData)) {
            $resp = response(['rc' => '101', 'msg' => 'This User does not exist, check your details']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        $resp = response(['rc' => '000', 'user' => auth()->user(), 'access_token' => $accessToken]);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;

    }

    public function logout(Request $request)
    {
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'LOGOUT';
        $actionLogModel->save();

        auth()->user()->token()->revoke();
    }
}
