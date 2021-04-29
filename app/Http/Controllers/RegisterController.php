<?php

namespace App\Http\Controllers;

use App\Jobs\VerifycationJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' =>['required', 'min:6', 'confirmed']
        ]);
        $verificationCode = sha1(time());

        $user = new User();
        $user->verification_code = $verificationCode;
        $user->is_verified = 0;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        VerifycationJob::dispatch(['email' => $request->email, 'verification_code' => $verificationCode]);

        return response()->json(['email' => $request->email, 'password' => $request->password], 200);
    }

    public function verify(Request $request)
    {
        $user = User::where('verification_code', $request->code)->first();
        if($user){
            $user->is_verified = 1;
            $user->save();
        }

        return redirect('/login');
    }
}
