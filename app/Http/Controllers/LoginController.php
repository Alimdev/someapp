<?php

namespace App\Http\Controllers;

use App\Events\AuthorizationLogEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->is_verified == 1){
                event(new AuthorizationLogEvent(Auth::user()->name));

                return response(Auth::user(), 200);
            }
        }

        abort(401);
    }

    public function logout()
    {
        Auth::logout();
        return response(null, 200);
    }
}
