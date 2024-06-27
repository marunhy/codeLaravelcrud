<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function showUserProfile()
    {
        $user = Auth::user();
        return view('account.my_profile', compact('user'));
    }
}
