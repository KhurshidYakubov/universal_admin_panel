<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListCategory;
use App\Models\ListType;
use App\Models\MenuCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menu_categories = MenuCategory::orderBy('id', 'desc')->paginate(8);

        $id_filter = $request->id_filter;
        $status_filter = $request->status_filter;
        $title_filter = $request->title_filter;


        if ($id_filter) {
            $menu_categories = MenuCategory::where('id', $id_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($title_filter) {
            $menu_categories = MenuCategory::whereHas('menuCategoryTranslation', function (Builder $query) use ($title_filter) {
                $query->where('title', 'like', '%' . $title_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($status_filter == '1' || $status_filter == '0') {
            $menu_categories = MenuCategory::where('status', $status_filter)->orderBy('id', 'desc')->paginate(8);
        }

        return view('admin.menu_categories.index', compact('menu_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.menu_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, User $user, MenuCategory $menuCategory)
    {
//        $request->validate([
//            'title' => 'required',
//        ]);


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
            'status' => $request->status,
        ];

        $menu_category = MenuCategory::create($data);
        return redirect()->route('menu_categories.show', $menu_category->id)->with('success', __('main.messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $menu_category = MenuCategory::findOrFail($id);
        return view('admin.menu_categories.show', compact('menu_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $menu_category = MenuCategory::findOrFail($id);

        return view('admin.menu_categories.edit', compact('menu_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, MenuCategory $menuCategory): \Illuminate\Http\RedirectResponse
    {

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
            'status' => $request->status,
        ];

        $menuCategory->update($data);
        return redirect()->route('menu_categories.show', $menuCategory->id)->with('success', __('main.messages.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $menu_category = MenuCategory::find($id);
        $menu_category->delete();
        return redirect()->route('menu_categories.index')->with('warning', __('main.messages.delete'));
    }
}
