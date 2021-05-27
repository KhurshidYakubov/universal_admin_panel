<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lists = Lists::where('category_id', 3)->orderBy('id', 'desc')->paginate(8);

        $id_filter = $request->id_filter;
        $status_filter = $request->status_filter;
        $creator_filter = $request->creator_filter;
        $modifier_filter = $request->modifier_filter;
        $title_filter = $request->title_filter;


        if ($id_filter) {
            $lists = Lists::where('id', $id_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($title_filter) {
            $lists = Lists::whereHas('listTranslation', function (Builder $query) use ($title_filter) {
                $query->where('category_id', 3)->where('title', 'like', '%' . $title_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($status_filter == '1' || $status_filter == '0') {
            $lists = Lists::where('category_id', 3)->where('status', $status_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($creator_filter) {
            $lists = Lists::whereHas('creator', function (Builder $query) use ($creator_filter) {
                $query->where('category_id', 3)->where('username', 'like', '%' . $creator_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($modifier_filter) {
            $lists = Lists::whereHas('updater', function (Builder $query) use ($modifier_filter) {
                $query->where('category_id', 3)->where('username', 'like', '%' . $modifier_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        }

        return view('admin.links.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $list_categories = ListCategory::where('type_id', 2)->where('status', 1)->get();

        return view('admin.links.create', compact('list_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Lists $lists)
    {
        $request->validate([
            'category_id' => 'required',
            'link' => 'required',
            'link_type' => 'required',
//            'anons_image' => 'required|mimes:jpg,jpeg,png'
        ]);


        $data = [
            'category_id' => $request->category_id,
            'link' => $request->link,
            'anons_image' => $request->filepath,
            'link_type' => $request->link_type,
            'creator_id' => $user->id ?? 1,
        ];

        $list = Lists::create($data);
        return redirect()->route('links.show', $list->id)->with('success', __('main.messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $list = Lists::findOrFail($id);
        return view('admin.links.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $list = Lists::findOrFail($id);
        $list_categories = ListCategory::where('type_id', 2)->where('status', 1)->get();
        $selectedCategory = ListCategory::first()->type_id;

        return view('admin.links.edit', compact('list', 'list_categories', 'selectedCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Lists $lists, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'category_id' => 'required',
            'link' => 'required',
            'link_type' => 'required',
//            'anons_image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $list = Lists::findOrFail($id);
        $user = auth()->user();

        $data = [
            'category_id' => $request->category_id,
            'link' => $request->link,
            'anons_image' => $request->filepath,
            'link_type' => $request->link_type,
            'modifier_id' => $user->id ?? 1,
        ];


        $list->update($data);
        return redirect()->route('links.show', $list->id)->with('success', __('main.messages.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $list = Lists::find($id);
        $list->delete();
        return redirect()->route('links.index')->with('warning', __('main.messages.delete'));
    }
}
