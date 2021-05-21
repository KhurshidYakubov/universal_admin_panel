<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListType;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ListTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_types = ListType::orderBy('id', 'desc')->paginate(8);

        $id_filter = $request->id_filter;
        $status_filter = $request->status_filter;
        $creator_filter = $request->creator_filter;
        $modifier_filter = $request->modifier_filter;
        $title_filter = $request->title_filter;


        if ($id_filter) {
            $list_types = ListType::where('id', $id_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($title_filter) {
            $list_types = ListType::whereHas('listTypeTranslation', function (Builder $query) use ($title_filter) {
                $query->where('title', 'like', '%' . $title_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($status_filter == '1' || $status_filter == '0') {
            $list_types = ListType::where('status', $status_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($creator_filter) {
            $list_types = ListType::whereHas('creator', function (Builder $query) use ($creator_filter) {
                $query->where('username', 'like', '%' . $creator_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($modifier_filter) {
            $list_types = ListType::whereHas('updater', function (Builder $query) use ($modifier_filter) {
                $query->where('username', 'like', '%' . $modifier_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        }

        return view('admin.list_types.index', compact('list_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.list_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, User $user, ListType $listType)
    {
        $request->validate([
            'oz_title' => 'required',
            'en_title' => 'required',
            'ru_title' => 'required',
        ]);
        $get_slug_element = '';
        $user = auth()->user();
        $slug_array = [
            $request->oz_title,
            $request->ru_title,
            $request->en_title,
        ];


        foreach ($slug_array as $item) {
            if (!is_null($item)) {
                $get_slug_element = $listType->makeSlug($item);
                break;
            }
        }

        $data = [
            'slug' => $get_slug_element,
            'oz' => [
                'title' => $request->oz_title,
            ],
            'ru' => [
                'title' => $request->ru_title,
            ],
            'en' => [
                'title' => $request->en_title,
            ],
            'status' => $request->status,
            'creator_id' => $user->id ?? 1,
        ];

        $list_type = ListType::create($data);
        return redirect()->route('list_types.show', $list_type->id)->with('success', __('main.messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_type = ListType::findOrFail($id);
        return view('admin.list_types.show', compact('list_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $list_type = ListType::findOrFail($id);
        return view('admin.list_types.edit', compact('list_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ListType $listType): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        $data = [
            'oz' => [
                'title' => $request->oz_title,
            ],
            'ru' => [
                'title' => $request->ru_title,
            ],
            'en' => [
                'title' => $request->en_title,
            ],
            'status' => $request->status,
            'modifier_id' => $user->id ?? 1,
        ];

        $listType->update($data);
        return redirect()->route('list_types.show', $listType->id)->with('success', __('main.messages.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $list_type = ListType::find($id);
        $list_type->delete();
        return redirect()->route('list_types.index')->with('warning', __('main.messages.delete'));
    }
}
