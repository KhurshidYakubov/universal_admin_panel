<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','desc')->paginate(8);
        $id_filter = $request->id_filter;
        $username_filter = $request->username_filter;
        $name_filter = $request->name_filter;
        $email_filter = $request->email_filter;

        if ($id_filter) {
            $users = User::orderBy('id','desc')->where('id', $id_filter)->paginate(8);
        } elseif ($username_filter) {
            $users = User::orderBy('id','desc')->where('username', $username_filter)->paginate(8);
        } elseif ($name_filter) {
            $users = User::orderBy('id','desc')->where('first_name', $name_filter)->paginate(8);
        } elseif ($email_filter) {
            $users = User::orderBy('id','desc')->where('email', $email_filter)->paginate(8);
        }
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'username' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $data = [
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ];

        $user = User::create($data);
        return redirect()->route('users.show', $user->id)->with('success', __('main.messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'email',
        ]);

        $data = [
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ];

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', __('main.messages.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('warning', __('main.messages.delete'));
    }
}
