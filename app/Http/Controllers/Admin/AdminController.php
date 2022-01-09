<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where([
            ['role_id', '!=', 1]
        ])->get();
        return view('admin.pages.user.admin.admin', [
            'admins' => $admins,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where([
            ['id', '!=', 1],
            ['status', 1],
        ])->get();
        return view('admin.pages.user.admin.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'first_name'    => 'required|string|max:100',
            'last_name'    => 'nullable|string|max:100',
            'email'    => 'required|string|email|max:150|unique:users',
            'password'    => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/',
            'role_id'    => 'required|numeric',
            'status'    => 'required|numeric',
        ], [
            'password.regex' => 'Must contain at least One Uppercase and One Lowercase letter',
        ]);

        // Save Data
        User::create([
            'role_id'    => $request->role_id,
            'first_name'    => $request->first_name,
            'last_name'    => $request->last_name,
            'email'    => $request->email,
            'password'    => bcrypt($request->password),
            'status'    => $request->status,
        ]);

        return redirect()->route('admin.index')->withSuccess("New Admin Success for Added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        $roles = Role::all();
        if ($admin->role_id != 1) {
            return view('admin.pages.user.admin.create', [
                'admin' => $admin,
                'roles' => $roles,
            ]);
        } else {
            return redirect()->route('admin.index')->withErrors("Admin Not Found/Admin ID Wrong!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate
        $this->validate($request, [
            'first_name'    => 'required|string|max:100',
            'last_name'    => 'nullable|string|max:100',
            'email'    => 'required|string|email|max:150',
            'password'    => 'nullable|string|min:8|regex:/[a-z]/|regex:/[A-Z]/',
            'role_id'    => 'required|numeric',
            'status'    => 'required|numeric',
        ], [
            'password.regex' => 'Must contain at least One Uppercase and One Lowercase letter',
        ]);

        $admin = User::findOrFail($id);
        // Check Role Not 'Client'
        if ($admin->role_id != 1) {
            // Update Email
            $email = $admin->email;
            if ($admin->email != $request->email) {
                $this->validate($request, [
                    'email'    => 'required|string|email|max:150|unique:users',
                ]);
                $email = $request->email;
            }
            // Update Password
            if (isset($request->password)) {
                $admin->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            // Update other
            $admin->update([
                'role_id'    => $request->role_id,
                'first_name'    => $request->first_name,
                'last_name'    => $request->last_name,
                'email'    => $email,
                'status'    => $request->status,
            ]);
            return redirect()->route('admin.index')->withSuccess("Admin '$admin->first_name' Success for Updated");
        } else {
            return redirect()->route('admin.index')->withErrors("Admin Not Found/Admin ID Wrong!");
        }

        // Update Last Changes
        $admin->update([
            'updated_at'    => Carbon::now()->toDateTimeString(),
        ]);
    }
}
