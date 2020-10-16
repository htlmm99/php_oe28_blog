<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($name)
    {
        if (empty($name)) {
            $name = config('common.role.user');
        }
        $role = Role::where('name', $name)->first();
        $users = $role->users()->orderBy('username', 'asc')->paginate(config('common.paginate_default'));

        return view('admin.user', compact('users', 'name'));
    }

    public function editAdmin(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index', config('common.role.user'))->with('error', trans('app.message.fail'));
        }
        $newRole = $request->role;
        $role = Role::where('name', $newRole)->first();
        $user->update(['role_id' => $role->id]);
        if ($newRole == config('common.role.admin')) {
            return redirect()->route('admin.index', config('common.role.admin'))->with('message', trans('app.message.edit_success'));
        } else {
            return redirect()->route('admin.index', config('common.role.user'))->with('message', trans('app.message.edit_success'));
        }
    }

    public function edit()
    {
        try {
            $user = User::findOrFail(Auth()->user()->id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.profile')->with('error', trans('message.fail'));
        }

        return view('user.profile', compact('user'));
    }

    public function update(UserRequest $request)
    {
        if ($request->changePassword == config('common.user.change_pass')) {
            $request->validate([
                'oldPassword' => ['required' , 'string', 'min:8'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            ]);
        }
        try {
            $user = User::findOrFail(Auth()->user()->id);
            if ($user->email != $request->email) {
                $request->validate([
                    'email' => ['unique:users'],
                ]);
            } else {
                if ($request->changePassword != config('common.user.change_pass')) {
                    $user->update([
                        'username' => $request->username,
                        'email' => $request->email,
                        'phone' => $request->phone,
                    ]);
                } else {
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
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.profile')->with('error', trans('app.message.fail'));
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index', 'user')->with('error', trans('app.message.fail'));
        }
        $user->delete();

        return redirect()->route('admin.index', 'user')->with('message', trans('app.message.delete_success'));
    }
}
