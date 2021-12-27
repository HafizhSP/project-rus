<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApiVendor;
use Illuminate\Http\Request;
use App\Models\ServiceProduct;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class Service_ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ServiceProduct::all()->sortBy("id");
        return view('admin.pages.service.product.product', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Check request from List Api Product
        $product = null;
        if (count($request->all()) != 0) {
            $product = $request;
        }

        $categories = ServiceCategory::all();
        $vendors = ApiVendor::all();
        return view('admin.pages.service.product.add-product', [
            'categories' => $categories,
            'vendors' => $vendors,
            'product' => $product,
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
            'category'    => 'required|numeric',
            'status'    => 'required|numeric',
            'vendor'    => 'required|numeric',
            'api_id'    => 'required|numeric',
            'min'    => 'required|numeric',
            'max'    => 'required|numeric',
            'column_status'    => 'required|numeric',
            'hbeli'    => 'required|numeric',
            'hjual'    => 'required|numeric',
            'desc'    => 'required|string',
        ]);


        // Save data to the Database
        ServiceProduct::create([
            'service_category_id'    => $request->category,
            'api_vendor_id'    => $request->vendor,
            'api_id'    => $request->api_id,
            'name'    => $request->name,
            'min'    => $request->min,
            'max'    => $request->max,
            'hbeli'    => $request->hbeli,
            'hjual'    => $request->hjual,
            'status' => $request->status,
            'desc'    => $request->desc,
            'column_status'    => $request->column_status,
        ]);

        return redirect()->route('list.index')->withSuccess("New Product Success for Added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = ServiceCategory::all();
        $vendors = ApiVendor::all();
        $product = ServiceProduct::findOrFail($id);
        return view('admin.pages.service.product.add-product', [
            'categories' => $categories,
            'vendors' => $vendors,
            'product' => $product,
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
            'category'    => 'required|numeric',
            'status'    => 'required|numeric',
            'vendor'    => 'required|numeric',
            'api_id'    => 'required|numeric',
            'min'    => 'required|numeric',
            'max'    => 'required|numeric',
            'column_status'    => 'required|numeric',
            'hbeli'    => 'required|numeric',
            'hjual'    => 'required|numeric',
            'desc'    => 'required|string',
        ]);


        // Save data to the Database
        $product = ServiceProduct::findOrFail($id);
        $product->update([
            'service_category_id'    => $request->category,
            'api_vendor_id'    => $request->vendor,
            'api_id'    => $request->api_id,
            'name'    => $request->name,
            'min'    => $request->min,
            'max'    => $request->max,
            'hbeli'    => $request->hbeli,
            'hjual'    => $request->hjual,
            'status' => $request->status,
            'desc'    => $request->desc,
            'column_status'    => $request->column_status,
        ]);

        return redirect()->route('list.index')->withSuccess("Product Success for Added");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ServiceProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('list.index')->withSuccess("Product Success for Added");
    }
}
