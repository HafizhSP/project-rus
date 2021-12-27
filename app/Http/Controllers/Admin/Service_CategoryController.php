<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ServiceSocmed;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Service_CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::all()->sortBy("name");
        return view('admin.pages.service.product.category', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socmeds = ServiceSocmed::all();
        return view('admin.pages.service.product.add-category', [
            'socmeds' => $socmeds
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
            'name'    => 'required|string',
            'socmed'    => 'required|string',
            'status'    => 'required|string',
        ]);

        // Save data to the Database
        ServiceCategory::create([
            'service_socmed_id' => $request->socmed,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('category.index')->withSuccess("Category Success for Added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socmeds = ServiceSocmed::all();
        $category = ServiceCategory::findOrFail($id);
        return view('admin.pages.service.product.add-category', [
            'socmeds' => $socmeds,
            'category' => $category
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
            'socmed'    => 'required|string',
            'status'    => 'required|string',
        ]);

        // Save data to the Database
        $category = ServiceCategory::findOrFail($id);
        $category->update([
            'service_socmed_id' => $request->socmed,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('category.index')->withSuccess("Category Success for Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->withSuccess("Category Success for Deleted");
    }
}
