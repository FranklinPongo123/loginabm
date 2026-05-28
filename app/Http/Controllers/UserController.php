<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }
}