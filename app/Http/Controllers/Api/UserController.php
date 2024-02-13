<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::guard('api')->attempt($credentials)) {
            $user = Auth::guard('api')->user();
            $jwt = JWTAuth::attempt($credentials);
            $success = true;
            $data = compact('user', 'jwt');
            
            return compact('success', 'data');
        }else{
            $success = false;
            $message = ' Credenciales incorectas';
            return compact('success', 'message');
        }
    }

    public function logout(){
        Auth::guard('api')->logout();
        $success = true;
        return compact('success');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nia' => 'required|digits:8',
            'name' => 'required',
            'type_id' => 'required|in:1,2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'nia' => $request->nia,
            'name' => $request->name,
            'type_id' => $request->type_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $jwt = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'jwt'), 201);
    }    

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($nia)
    {
        $user = User::where('nia', $nia)->firstOrFail();
        return response()->json($user);
    }
}
