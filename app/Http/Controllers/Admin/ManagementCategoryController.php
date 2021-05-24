<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListCategory;
use App\Models\ListType;
use App\Models\ManagementCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ManagementCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $management_categories = ManagementCategory::orderBy('id', 'desc')->paginate(8);

        $id_filter = $request->id_filter;
        $status_filter = $request->status_filter;
        $creator_filter = $request->creator_filter;
        $modifier_filter = $request->modifier_filter;
        $title_filter = $request->title_filte;


        if ($id_filter) {
            $management_categories = ManagementCategory::where('id', $id_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($title_filter) {
            $management_categories = ManagementCategory::whereHas('managementCatTranslation', function (Builder $query) use ($title_filter) {
                $query->where('title', 'like', '%' . $title_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($status_filter == '1' || $status_filter == '0') {
            $management_categories = ManagementCategory::where('status', $status_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($creator_filter) {
            $management_categories = ManagementCategory::whereHas('creator', function (Builder $query) use ($creator_filter) {
                $query->where('username', 'like', '%' . $creator_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($modifier_filter) {
            $management_categories = ManagementCategory::whereHas('updater', function (Builder $query) use ($modifier_filter) {
                $query->where('username', 'like', '%' . $modifier_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        }

        return view('admin.management_categories.index', compact('management_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.management_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, User $user, ManagementCategory $managementCategory)
    {
//        $request->validate([
//            'title' => 'required',
//        ]);
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
            'image' => $request->filepath,
            'color' => $request->color,
            'status' => $request->status,
            'creator_id' => $user->id ?? 1,
        ];

        $management_category = ManagementCategory::create($data);
        return redirect()->route('management_categories.show', $management_category->id)->with('success', __('main.messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $management_category = ManagementCategory::findOrFail($id);
        return view('admin.management_categories.show', compact('management_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $management_category = ManagementCategory::findOrFail($id);

        return view('admin.management_categories.edit', compact('management_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ManagementCategory $managementCategory): \Illuminate\Http\RedirectResponse
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
            'image' => $request->filepath,
            'color' => $request->color,
            'status' => $request->status,
            'modifier_id' => $user->id ?? 1,
        ];

        $managementCategory->update($data);
        return redirect()->route('management_categories.show', $managementCategory->id)->with('success', __('main.messages.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $management_category = ManagementCategory::find($id);
        $management_category->delete();
        return redirect()->route('management_categories.index')->with('warning', __('main.messages.delete'));
    }
}
