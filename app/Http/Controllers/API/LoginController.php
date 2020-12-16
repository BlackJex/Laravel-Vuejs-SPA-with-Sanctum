<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Login\LoginRequest;

class LoginController extends Controller
{
   public function __invoke(LoginRequest $request)
   {
       if(Auth::attempt($request->only('email', 'password')))
       {
           return response()->json([
               'message' => 'autenticato',
               'user' => Auth::user()
           ], 200);
       }
       else 
       {
        return response()->json([
            'error' => 'Credenziali errate'
        ]);
       }
       
   }
}
