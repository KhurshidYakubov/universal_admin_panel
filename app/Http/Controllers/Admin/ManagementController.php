<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use App\Models\ManagementCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $managements = Management::orderBy('id', 'desc')->paginate(8);

        $id_filter = $request->id_filter;
        $status_filter = $request->status_filter;
        $creator_filter = $request->creator_filter;
        $modifier_filter = $request->modifier_filter;
        $title_filter = $request->title_filte;


        if ($id_filter) {
            $managements = Management::where('id', $id_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($title_filter) {
            $managements = Management::whereHas('managementTranslation', function (Builder $query) use ($title_filter) {
                $query->where('title', 'like', '%' . $title_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($status_filter == '1' || $status_filter == '0') {
            $managements = Management::where('status', $status_filter)->orderBy('id', 'desc')->paginate(8);
        } elseif ($creator_filter) {
            $managements = Management::whereHas('creator', function (Builder $query) use ($creator_filter) {
                $query->where('username', 'like', '%' . $creator_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        } elseif ($modifier_filter) {
            $managements = Management::whereHas('updater', function (Builder $query) use ($modifier_filter) {
                $query->where('username', 'like', '%' . $modifier_filter . '%');
            })->orderBy('id', 'desc')->paginate(8);
        }

        return view('admin.managements.index', compact('managements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $management_categories = ManagementCategory::where('status', 1)->get();
        return view('admin.managements.create', compact('management_categories'));
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
                'leader' => $request->oz_leader,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'leader' => $request->ru_leader,
            ],
            'en' => [
                'title' => $request->en_title,
                'leader' => $request->en_leader,
            ],
            'leader_image' => $request->filepath,
            'phone' => $request->telegram,
            'email' => $request->linkedin,
            'fax' => $request->facebook,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'creator_id' => $user->id ?? 1,
        ];

        $management = Management::create($data);
        return redirect()->route('managements.show', $management->id)->with('success', __('main.messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $management = Management::findOrFail($id);
        return view('admin.managements.show', compact('management'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $management = Management::findOrFail($id);
        $management_categories = ManagementCategory::where('status', 1)->get();

        return view('admin.managements.edit', compact('management', 'management_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Management $management): \Illuminate\Http\RedirectResponse
    {

        $user = auth()->user();

        $data = [
            'oz' => [
                'title' => $request->oz_title,
                'leader' => $request->oz_leader,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'leader' => $request->ru_leader,
            ],
            'en' => [
                'title' => $request->en_title,
                'leader' => $request->en_leader,
            ],
            'leader_image' => $request->filepath,
            'phone' => $request->telegram,
            'email' => $request->linkedin,
            'fax' => $request->facebook,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'modifier_id' => $user->id ?? 1,
        ];

        $management->update($data);
        return redirect()->route('managements.show', $management->id)->with('success', __('main.messages.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $management = Management::find($id);
        $management->delete();
        return redirect()->route('managements.index')->with('warning', __('main.messages.delete'));
    }
}
