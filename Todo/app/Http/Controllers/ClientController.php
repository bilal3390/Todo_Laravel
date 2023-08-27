<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function signup (Request $request)
    {
        $user = new client();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json($user);
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Find the user by username
        $user = Client::where('username', $username)->first();

        if($user){
            $userPassword = Hash::check ($password, $user->password);
            if($userPassword)
            {
                session()->put('user_id' , 1);
                echo "logged in";
                // return redirect ('/');
            }
        }

        if(!$user || !$userPassword)
        {
            echo "invalid credentials";
        }
    }

    public function logout ()
    {
        session()->forget('user_id');
        echo "Successfully Logged Out";
    }
}
