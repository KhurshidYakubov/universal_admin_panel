<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Models\ListType;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lists = Lists::orderBy('id', 'desc')->paginate(8);

        $id_filter = $request->id_filter;
        $status_filter = $request->status_filter;
        $creator_filter = $request->creator_filter;
        $modifier_filter = $request->modifier_filter;
        $title_filter = $request->title_filter;


        if ($id_filter) {
            $lists = Lists::where('id', $id_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($title_filter) {
            $lists = Lists::whereHas('listTranslation', function (Builder $query) use ($title_filter) {
                $query->where('title', 'like', '%' . $title_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($status_filter == '1' || $status_filter == '0') {
            $lists = Lists::where('status', $status_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($creator_filter) {
            $lists = Lists::whereHas('creator', function (Builder $query) use ($creator_filter) {
                $query->where('username', 'like', '%' . $creator_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($modifier_filter) {
            $lists = Lists::whereHas('updater', function (Builder $query) use ($modifier_filter) {
                $query->where('username', 'like', '%' . $modifier_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        }

        return view('admin.lists.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $list_categories = ListCategory::where('status', 1)->get();

        return view('admin.lists.create', compact('list_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Lists $lists)
    {
//        $request->validate([
//            'title' => 'required',
//        ]);
        $get_slug_element = '';
        $user = auth()->user();
        $slug_array = [
            $request->oz_title,
            $request->uz_title,
            $request->ru_title,
        ];

        foreach ($slug_array as $item) {
            if (!is_null($item)) {
                $get_slug_element = $lists->makeSlug($item);
                break;
            }
        }

        $data = [
            'slug' => $get_slug_element,
            'oz' => [
                'title' => $request->oz_title,
                'body' => $request->oz_body,
            ],
            'uz' => [
                'title' => $request->uz_title,
                'body' => $request->uz_body,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
            ],
            'anons_image' => $request->filepath,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'creator_id' => $user->id ?? 1,
        ];

        $list = Lists::create($data);
        return redirect()->route('lists.show', $list->id)->with('success', __('main.messages.create'));
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
        return view('admin.lists.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $list = ListCategory::findOrFail($id);
        $list_categories = ListCategory::where('status', 1)->get();

        return view('admin.lists.edit', compact('list', 'list_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Lists $lists): \Illuminate\Http\RedirectResponse
    {

        $user = auth()->user();

        $data = [
            'oz' => [
                'title' => $request->oz_title,
                'body' => $request->oz_body,
            ],
            'uz' => [
                'title' => $request->uz_title,
                'body' => $request->uz_body,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
            ],
            'anons_image' => $request->filepath,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'modifier_id' => $user->id ?? 1,
        ];

        $lists->update($data);
        return redirect()->route('lists.show', $lists->id)->with('success', __('main.messages.update'));

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
        return redirect()->route('lists.index')->with('warning', __('main.messages.delete'));
    }
}
