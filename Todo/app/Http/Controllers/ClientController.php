<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\TaskGuard;

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


        if ($user) {
            $userPassword = Hash::check($password, $user->password);

            if ($userPassword) {
                echo "Logged in ";
                session(['user_id' => 1]); // Assuming $user->id is the correct user ID

                if (session()->has('user_id')) {
                    echo "User ID added to session";
                } else {
                    echo "User ID not added to session";
                }

                // You might want to redirect here after successful login
                return redirect('/api/read');
            } else {
                echo "Invalid credentials";
            }
        } else {
            echo "User not found";
        }


        // if($user){
        //     $userPassword = Hash::check ($password, $user->password);
        //     if($userPassword)
        //     {
        //         echo "logged in ";
        //         $check = session(['user_id' => 1]);
        //         // session()->put('user_id',1);
        //         if ($check){
        //             echo "user id added";
        //         }
        //         else{
        //             echo "user id not added";
        //         }
        //         // return redirect ('/api/read');
        //     }
        // }

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
