<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\RegisterRequest;


class RegisterController extends Controller
{
   
    public function __invoke(RegisterRequest $request, User $user)
    {
        $user->create($request->merge([
            'password' => Hash::make($request->password)
        ])->all());

        return response()->json([
            'message' => 'User created succesfully'
        ]);
    }

    
}
