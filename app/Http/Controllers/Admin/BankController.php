<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('admin.pages.billing.bank.bank', [
            'banks' => $banks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.billing.bank.add-bank');
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
            'type'    => 'required|string',
            'name'    => 'required|string',
            'slug'    => 'required|string',
            'atasnama'    => 'required|string',
            'no_rek'    => 'required|numeric',
            'username'    => 'required|string',
            'password'    => 'required|string|min:5',
            'linkapi'    => 'required|url',
            'status'    => 'required|string',
            'thumbnail' => 'required|mimes:png,jpeg,svg|max:1000', // max 1MB
        ]);

        // Save image to the folder Storage
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $fileName = strtolower($request->name) . "." . $extension;
        Storage::putFileAs('public/images/bank', $request->file('thumbnail'), $fileName);

        // Password
        $encrypted_password = Crypt::encryptString($request->password);

        // Save data to the Database
        Bank::create([
            'type'    => $request->type,
            'name'    => $request->name,
            'slug'    => $request->slug,
            'an'    => $request->atasnama,
            'thumbnail' => $fileName,
            'username'    => $request->username,
            'password'    => $encrypted_password,
            'no_rek'    => $request->no_rek,
            'url'    => $request->linkapi,
            'status'    => $request->status,
        ]);

        return redirect()->route('bank.index')->withSuccess("New Bank Success for Added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('admin.pages.billing.bank.add-bank', [
            'bank' => $bank
        ]);
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
            'type'    => 'required|string',
            'name'    => 'required|string',
            'slug'    => 'required|string',
            'atasnama'    => 'required|string',
            'no_rek'    => 'required|numeric',
            'username'    => 'required|string',
            'password'    => 'nullable|string|min:5',
            'linkapi'    => 'required|url',
            'status'    => 'required|string',
            'thumbnail' => 'nullable|mimes:png,jpeg,svg|max:1000', // max 1MB
        ]);

        $bank = Bank::findOrFail($id);
        $thumbnailName = $bank->thumbnail;
        if ($request->thumbnail) {
            // Save image to the folder Storage
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnailName = strtolower($request->name) . "." . $extension;
            Storage::putFileAs('public/images/bank', $request->file('thumbnail'), $thumbnailName);
        }

        $encrypted_password = $bank->password;
        if ($request->password) {
            // Password
            $encrypted_password = Crypt::encryptString($request->password);
        }

        // Save data to the Database
        $bank->update([
            'type'    => $request->type,
            'name'    => $request->name,
            'slug'    => $request->slug,
            'an'    => $request->atasnama,
            'thumbnail' => $thumbnailName,
            'username'    => $request->username,
            'password'    => $encrypted_password,
            'no_rek'    => $request->no_rek,
            'url'    => $request->linkapi,
            'status'    => $request->status,
        ]);

        return redirect()->route('bank.index')->withSuccess("Bank Success for Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);

        // Check image
        if (Storage::exists('public/images/bank/' . $bank->thumbnail)) {
            Storage::delete('public/images/bank/' . $bank->thumbnail);
        }

        // Delete
        $bank->delete();

        return redirect()->route('bank.index')->withSuccess("Bank Success for Deleted");
    }
}
