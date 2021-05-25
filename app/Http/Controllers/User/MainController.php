<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lists;
use App\Models\Management;
use App\Models\Menu;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $news = Lists::where('category_id', 1 )->where('status', 1 )->get();
        $statistics = Lists::where('category_id', 2 )->where('status', 1 )->get();
        $links = Lists::where('category_id', 3 )->get();
        $team_members = Management::where('category_id',1 )->get();

        return view('user.index', compact('top_menu_tree', 'header_tree', 'news', 'statistics', 'links', 'team_members'));
    }
}
