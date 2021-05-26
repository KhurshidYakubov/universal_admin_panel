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


        $news = Lists::where('category_id', 1)->where('status', 1)->latest()->take(6)->get();
        $statistics = Lists::where('category_id', 2)->where('status', 1)->latest()->take(4)->get();
        $links = Lists::where('category_id', 3)->latest()->take(10)->get();
        $team_members = Management::where('category_id', 1)->latest()->take(4)->get();

        return view('user.index', compact('top_menu_tree', 'header_tree', 'news', 'statistics', 'links', 'team_members'));
    }

    public function programs()
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $programs = Lists::where('category_id', 4)->get();

        return view('user.programs', compact('top_menu_tree', 'header_tree', 'programs'));
    }

    public function pages($slug)
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $page = Lists::where('category_id', 7 )->where('slug', $slug)->first();
        return view('user.page', compact('top_menu_tree', 'header_tree', 'page'));
    }
}
