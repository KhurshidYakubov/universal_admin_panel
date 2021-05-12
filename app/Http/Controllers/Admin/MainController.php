<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function adminLogin(){
        $user = auth()->user();
        return view('admin.login', compact('user'));
    }

    public function adminIndex(){
        return view('admin.index');
    }
}


