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

        $page = Lists::where('category_id', 7)->where('slug', $slug)->first();
        return view('user.page', compact('top_menu_tree', 'header_tree', 'page'));
    }

    public function newsList()
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $news = Lists::where('category_id', 1)->where('status', 1)->orderBy('id', 'desc')->paginate(12);

        return view('user.news_list', compact('top_menu_tree', 'header_tree', 'news'));
    }


    public function newsItem($id)
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $news_item = Lists::findOrFail($id);

        return view('user.news_item', compact('top_menu_tree', 'header_tree', 'news_item'));
    }


    public function teamList()
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $team_members = Management::where('category_id', 1)->where('status', 1)->orderBy('id', 'desc')->paginate(12);

        return view('user.team_list', compact('top_menu_tree', 'header_tree', 'team_members'));
    }

    public function programsList()
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $programs = Lists::where('category_id', 4)->where('status', 1)->orderBy('id', 'desc')->paginate(12);

        return view('user.programs_list', compact('top_menu_tree', 'header_tree', 'programs'));
    }

    public function programsItem($id)
    {
        $top_menu = Menu::where('category_id', 1)->where('status', 1)->get();
        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        $header = Menu::where('category_id', 2)->where('status', 1)->get();
        $header_tree = Menu::buildTree($header->toArray());

        $program = Lists::findOrFail($id);

        return view('user.programs_item', compact('top_menu_tree', 'header_tree', 'program'));
    }


}
