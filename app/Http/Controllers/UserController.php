<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view("admin.users.users-list", [
            'users' => User::all()->sortBy("name")
        ]);
    }

    public function edit(Request $request, User $user)
    {
        return view('admin.users.users-edit', [
            "user" => $user,
            "roles" => Role::all()->sortBy("name"),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => 'required'
        ]);
        $user->syncRoles($request->input('roles'));

        return redirect()->route("users.index");
    }
}
