<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Login\LoginRequest;

class LogoutController extends Controller
{
   public function __invoke()
   {
       Auth::logout();
      
       
   }
}
