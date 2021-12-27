<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ServiceSocmed;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Service_SocmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socmeds = ServiceSocmed::all()->sortBy("name");
        return view('admin.pages.service.product.socmed', [
            'socmeds' => $socmeds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.service.product.add-socmed');
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
            'status'    => 'required|string',
            'thumbnail' => 'required|mimes:png,jpeg,svg|max:1000', // max 1MB
        ]);

        // Save image to the folder Storage
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $fileName = strtolower($request->name) . "." . $extension;
        Storage::putFileAs('public/images/socmed', $request->file('thumbnail'), $fileName);

        // Save data to the Database
        ServiceSocmed::create([
            'name' => $request->name,
            'status' => $request->status,
            'thumbnail' => $fileName,
        ]);

        return redirect()->route('socmed.index')->withSuccess("Social Media Success for Added");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socmed = ServiceSocmed::findOrFail($id);
        return view('admin.pages.service.product.add-socmed', [
            'socmed' => $socmed
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
            'status'    => 'required|string',
            'thumbnail' => 'nullable|mimes:png,jpeg,svg|max:1000', // max 1MB
        ]);

        $socmed = ServiceSocmed::findOrFail($id);
        $thumbnailName = $socmed->thumbnail;
        if ($request->thumbnail) {
            // Save image to the folder Storage
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnailName = strtolower($request->name) . "." . $extension;
            Storage::putFileAs('public/images/socmed', $request->file('thumbnail'), $thumbnailName);
        }

        // Save data to the Database
        $socmed->update([
            'name' => $request->name,
            'status' => $request->status,
            'thumbnail' => $thumbnailName,
        ]);

        return redirect()->route('socmed.index')->withSuccess("Social Media Success for Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socmed = ServiceSocmed::findOrFail($id);

        // Check image
        if (Storage::exists('public/images/socmed/' . $socmed->thumbnail)) {
            Storage::delete('public/images/socmed/' . $socmed->thumbnail);
        }

        // Delete
        $socmed->delete();

        return redirect()->route('socmed.index')->withSuccess("Social Media Success for Deleted");
    }
}
