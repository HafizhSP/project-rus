<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApiVendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Api_VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = ApiVendor::all();
        return view('admin.pages.service.api.api-vendor', [
            'vendors' => $vendors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.service.api.add-api-vendor');
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
            'name'    => 'required|string',
            'url'    => 'required|string',
            'key'    => 'required|string',
            'status'    => 'required|string',
        ]);

        // Save data to the Database
        ApiVendor::create([
            'name' => $request->name,
            'url' => $request->url,
            'key' => $request->key,
            'status' => $request->status,
        ]);

        return redirect()->route('vendor.index')->withSuccess("New Vendor Success for Added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = ApiVendor::findOrFail($id);
        return view('admin.pages.service.api.add-api-vendor', [
            'vendor' => $vendor
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
            'name'    => 'required|string',
            'url'    => 'required|string',
            'key'    => 'required|string',
            'status'    => 'required|string',
        ]);

        // Save data to the Database
        $vendor = ApiVendor::findOrFail($id);
        $vendor->update([
            'name' => $request->name,
            'url' => $request->url,
            'key' => $request->key,
            'status' => $request->status,
        ]);

        return redirect()->route('vendor.index')->withSuccess("Vendor Success for Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = ApiVendor::findOrFail($id);
        $vendor->delete();

        return redirect()->route('vendor.index')->withSuccess("Vendor Success for Deleted");
    }
}
