<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resellers = User::where([
            ['role_id', 1]
        ])->get();
        return view('admin.pages.user.reseller.reseller', [
            'resellers' => $resellers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.user.reseller.create-reseller');
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
            'balance'    => 'required|numeric|min:0',
            'reseller_type'    => 'required|numeric',
            'status'    => 'required|numeric',
        ], [
            'password.regex' => 'Must contain at least One Uppercase and One Lowercase letter',
        ]);

        // Save Data
        User::create([
            'role_id'    => 1,
            'first_name'    => $request->first_name,
            'last_name'    => $request->last_name,
            'email'    => $request->email,
            'password'    => bcrypt($request->password),
            'balance'    => $request->balance,
            'status'    => $request->status,
            // 'reseller_type'    => $request->reseller_type,
        ]);

        return redirect()->route('reseller.index')->withSuccess("New Reseller Success for Added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reseller = User::findOrFail($id);
        if ($reseller->role_id == 1) {
            return view('admin.pages.user.reseller.create-reseller', [
                'reseller' => $reseller
            ]);
        } else {
            return redirect()->route('reseller.index')->withErrors("Reseller Not Found/Reseller ID Wrong!");
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
            'balance'    => 'required|numeric|min:0',
            'reseller_type'    => 'required|numeric',
            'status'    => 'required|numeric',
        ], [
            'password.regex' => 'Must contain at least One Uppercase and One Lowercase letter',
        ]);

        $reseller = User::findOrFail($id);
        // Check Role 'Client'
        if ($reseller->role_id == 1) {
            // Update Email
            $email = $reseller->email;
            if ($reseller->email != $request->email) {
                $this->validate($request, [
                    'email'    => 'required|string|email|max:150|unique:users',
                ]);
                $email = $request->email;
            }
            // Update Password
            if (isset($request->password)) {
                $reseller->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            // Update other
            $reseller->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $email,
                'balance' => $request->balance,
                'status'    => $request->status,
                // 'reseller_type' => $request->reseller_type,
            ]);
            return redirect()->route('reseller.index')->withSuccess("Reseller '$reseller->first_name' Success for Updated");
        } else {
            return redirect()->route('reseller.index')->withErrors("Reseller Not Found/Reseller ID Wrong!");
        }
    }


    /**
     * Update Role ID in storage.
     * Make User as Admin
     *
     */
    public function admin($id)
    {
        $reseller = User::findOrFail($id);
        if ($reseller->role_id == 1) {
            $reseller->update([
                'balance' => 0,
                'role_id'    => 3,
            ]);
            return redirect()->route('admin.index')->withSuccess("User '$reseller->first_name' Success for Updated as Admin");
        } else {
            return redirect()->route('reseller.index')->withErrors("Reseller Not Found/Reseller ID Wrong!");
        }
    }
}
