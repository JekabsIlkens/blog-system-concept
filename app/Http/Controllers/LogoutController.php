<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController
{
    public function logoutUser()
    {
        Auth::logout(); 
        
        return redirect()->route('welcome');
    }
}
