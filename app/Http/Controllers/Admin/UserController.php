<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index($name)
    {
        $role = Role::where('name', $name)->first();
        $users = User::where('role_id', $role->id)->orderBy('username', 'asc')->get();
        return view('admin.user', compact('users', 'name'));
    }

    public function editAdmin(Request $request, $id)
    {
        try {
        $user = User::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index', config('common.role.user'))->with('error', trans('app.message.fail'));
        }
        $newRole = $request->role;
        $role = Role::where('name', $newRole)->first();
        $user->update(['role_id' => $role->id]);
        if ($newRole == config('common.role.admin')) {
            return redirect()->route('admin.index', config('common.role.admin'))->with('message', trans('app.message.edit_success'));
        }
        else {
            return redirect()->route('admin.index', config('common.role.user'))->with('message', trans('app.message.edit_success'));
        }
    }


    public function edit()
    {
        try {
            $user = User::findOrFail(Auth()->user()->id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('user.profile')->with('error', trans('message.fail'));
        }

        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
                'username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'phone' => ['required', 'numeric'],
            ]);
        if ($request->changePassword == config('common.user.change_pass')) {
            $validatedData = $request->validate([
                'oldPassword' => ['required' , 'string', 'min:8'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            ]);
        }
        try {
            $user = User::findOrFail(Auth()->user()->id);
            if ($user->email != $request->email) {
                $checkEmail = User::where('email', $request->email)->first();
                if ($checkEmail != null) {
                    return redirect()->route('user.profile')->error('email', trans('app.message.has_email'));
                }
            }

            if ($request->changePassword != config('common.user.change_pass'))
            {
                $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                ]);
            }
            else {
                $oldPass = $request->oldPassword;
                $checkPassword = User::where('email', $request->email)->where('password', bcrypt($oldPass))->first();
                if ($checkPassword != null) {
                    return redirect()->route('user.profile')->error('oldPassword', trans('app.message.fail'));
                }
                $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password,
                ]);
            }

            return redirect()->route('user.profile')->with('message', trans('app.message.edit_success'));
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('user.profile')->with('error', trans('app.message.fail'));
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index', 'user')->with('error', trans('app.message.fail'));
        }
        $user->delete();

        return redirect()->route('admin.index', 'user')->with('message', trans('app.message.delete_success'));
    }
}
