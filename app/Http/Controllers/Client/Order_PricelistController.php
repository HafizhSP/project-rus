<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\ServiceSocmed;
use App\Models\ServiceProduct;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class Order_PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $socmeds = ServiceSocmed::all();
        if ($request->get('socmed')) {
            $socmed_id = $request->get('socmed');
            $categories = ServiceCategory::where('service_socmed_id', $socmed_id)->get();
            $products = ServiceProduct::whereHas('serviceCategory', function ($query) use ($socmed_id) {
                $query->where('service_socmed_id', $socmed_id);
            })->get();
        } else {
            $categories = ServiceCategory::all();
            $products = ServiceProduct::all();
        }

        return view('client.pages.service.pricelist', [
            'socmeds' => $socmeds,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
