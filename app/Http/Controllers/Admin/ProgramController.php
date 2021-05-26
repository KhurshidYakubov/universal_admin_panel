<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Models\ListType;
use App\Models\Management;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lists = Lists::where('category_id', 4)->orderBy('id', 'desc')->paginate(8);
//        $lists = ListType::with('testRelation')->where('id', 3);


        $id_filter = $request->id_filter;
        $status_filter = $request->status_filter;
        $creator_filter = $request->creator_filter;
        $modifier_filter = $request->modifier_filter;
        $title_filter = $request->title_filter;


        if ($id_filter) {
            $lists = Lists::where('id', $id_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($title_filter) {
            $lists = Lists::whereHas('listTranslation', function (Builder $query) use ($title_filter) {
                $query->where('category_id', 4)->where('title', 'like', '%' . $title_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($status_filter == '1' || $status_filter == '0') {
            $lists = Lists::where('category_id', 4)->where('status', $status_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($creator_filter) {
            $lists = Lists::whereHas('creator', function (Builder $query) use ($creator_filter) {
                $query->where('category_id', 4)->where('username', 'like', '%' . $creator_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($modifier_filter) {
            $lists = Lists::whereHas('updater', function (Builder $query) use ($modifier_filter) {
                $query->where('category_id', 4)->where('username', 'like', '%' . $modifier_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        }

        return view('admin.programs.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $leaders = Management::where('category_id', 1)->where('status', 1)->get();
        $list_categories = ListCategory::where('type_id', 4)->where('status', 1)->get();

        return view('admin.programs.create', compact('list_categories', 'leaders'));
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
            $request->ru_title,
            $request->en_title,
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
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
            ],
            'en' => [
                'title' => $request->en_title,
                'body' => $request->en_body,
            ],
            'anons_image' => $request->filepath,
            'leaders' => $request->leaders,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'creator_id' => $user->id ?? 1,
        ];
//            dd($data);
        $list = Lists::create($data);
        return redirect()->route('programs.show', $list->id)->with('success', __('main.messages.create'));
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
        return view('admin.programs.show', compact('list'));
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
        $list_categories = ListCategory::where('id', 4)->where('status', 1)->get();

        return view('admin.programs.edit', compact('list', 'list_categories'));
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
        $list = Lists::findOrFail($id);
        $user = auth()->user();

        $data = [
            'oz' => [
                'title' => $request->oz_title,
                'body' => $request->oz_body,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
            ],
            'en' => [
                'title' => $request->en_title,
                'body' => $request->en_body,
            ],
            'anons_image' => $request->filepath,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'modifier_id' => $user->id ?? 1,
        ];


        $list->update($data);
        return redirect()->route('programs.show', $list->id)->with('success', __('main.messages.update'));
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
        return redirect()->route('programs.index')->with('warning', __('main.messages.delete'));
    }
}
