<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lists;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function adminLogin(){
        $user = auth()->user();
        return view('admin.login', compact('user'));
    }

    public function adminIndex(){

        $programs = Lists::where('category_id', 4)->where('status', 1)->count();
        $vacancies = Lists::where('category_id', 5)->where('status', 1)->count();
        $news = Lists::where('category_id', 1)->where('status', 1)->count();
        $pages = Lists::where('category_id', 7)->count();

        return view('admin.index', compact('programs', 'vacancies', 'news', 'pages'));
    }
}


