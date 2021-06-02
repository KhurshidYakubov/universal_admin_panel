<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListCategory;
use App\Models\ListType;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_filter = $request->id_filter;
        $type_filter = $request->type_filter;
        $name_filter = $request->name_filter;
        $menus = Menu::with('submenus')->paginate(8);
        $main_menu = Menu::all()->where('parent_id', null);

        if ($id_filter) {
            $menus = Menu::all()->where('id', $id_filter);
        } elseif ($type_filter) {
            $menus = Menu::all()->where('parent_id', $type_filter);
        } elseif ($name_filter) {
            $menus = Menu::whereHas('menuTranslation', function (Builder $query) use ($name_filter) {
                $query->where('name', 'like', '%' . $name_filter . '%');
            })->get();
        }

        return view('admin.menus.index', compact('main_menu', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $main_menu = Menu::all()->where('parent_id', null);
        $menu_categories = MenuCategory::where('status', 1)->get();

        return view('admin.menus.create', compact('main_menu', 'menu_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'category_id' => 'required',
            'link_type' => 'required',
            'status' => 'required',
        ]);

        $user = auth()->user();

        $data = [
            'oz' => [
                'title' => $request->oz_title,
            ],
            'uz' => [
                'title' => $request->uz_title,
            ],
            'ru' => [
                'title' => $request->ru_title,
            ],
            'category_id' => $request->category_id,
            'parent_id' => $request->parent_id,
//            'image' => $request->image,
            'link' => $request->link,
            'link_type' => $request->link_type,
            'order' => $request->order,
            'status' => $request->status,
            'creator_id' => $user->id ?? 1,
        ];

        $menu = Menu::create($data);
        return redirect()->route('menus.show', $menu->id)->with('success', __('main.messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $main_menu = Menu::all()->where('parent_id', null);
        $menu_categories = MenuCategory::where('status', 1)->get();
        $menu = Menu::findOrFail($id);

        return view('admin.menus.edit', compact('menu', 'main_menu', 'menu_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Menu $menu): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'category_id' => 'required',
            'link_type' => 'required',
            'status' => 'required',
        ]);

        $user = auth()->user();

        $data = [
            'oz' => [
                'title' => $request->oz_title,
            ],
            'uz' => [
                'title' => $request->uz_title,
            ],
            'ru' => [
                'title' => $request->ru_title,
            ],
            'category_id' => $request->category_id,
            'parent_id' => $request->parent_id,
//            'image' => $request->image,
            'link' => $request->link,
            'link_type' => $request->link_type,
            'order' => $request->order,
            'status' => $request->status,
            'modifier_id' => $user->id ?? 1,
        ];

        $menu->update($data);
        return redirect()->route('menus.show', $menu->id)->with('success', __('main.messages.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menus.index')->with('warning', __('main.messages.delete'));
    }
}
