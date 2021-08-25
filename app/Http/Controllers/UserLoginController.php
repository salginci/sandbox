<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class UserLoginController extends Controller
{
    public function userLoginDetails(Request $request) {
        
        $user_email = DB::table('users')->where('id', 0)->first();
        $user_pass = DB::table('users')->where('id', 0)->first();
        if($user_email->email == $request->userDetails['email'] && Hash::check($request->userDetails['password'], $user_pass->password)) {
            return response()->json(['success' => true, 'token' => 'token'], 200);
        }
    }
}
