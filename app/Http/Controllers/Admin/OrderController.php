<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all()->sortByDesc("id");
        return view('admin.pages.service.order.order', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $order = Order::findOrFail($id);
        return response()->json([
            'order' => $order,
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
        // Update Order and Check Status
        $order = Order::findOrFail($id);

        // Check Status
        if ($request->status != $order->status) {
            if (stripos($request->status, 'Success') !== false || stripos($request->status, 'Completed') !== false) {
                $status = "Completed";
                // Update Date Completed
                if ($order->status != $status) {
                    $order->update([
                        'date_completed' => Carbon::now()->toDateTimeString()
                    ]);
                }
            } else if (stripos($request->status, 'Processing') !== false || stripos($request->status, 'In Progress') !== false || stripos($request->status, 'Processing') !== false) {
                $status = "Processing";
                // Update Date Processed
                if ($order->status != $status) {
                    $order->update([
                        'date_processed' => Carbon::now()->toDateTimeString()
                    ]);
                }
            } else if (stripos($request->status, 'Error') !== false || stripos($request->status, 'Canceled') !== false) {
                $status = "Canceled";
                // Update Data Canceled
                if ($order->status != $status) {
                    $new_price = 0;
                    $new_balance = $order->user->balance + ($order->price - $new_price);
                    $order->update([
                        'spend' => 0,
                        'price' => $new_price,
                        'date_completed' => Carbon::now()->toDateTimeString()
                    ]);
                    // Refund Balance
                    User::find($order->user_id)->update([
                        'balance' => $new_balance
                    ]);
                }
            } else {
                $status = "Pending";
            }

            $order->update([
                'target'    => $request->target,
                'start'    => $request->start,
                'status'    => $request->status,
                'custom_field'    => $request->custom_field,
            ]);
        } else {
            $order->update([
                'target'    => $request->target,
                'start'    => $request->start,
                'custom_field'    => $request->custom_field,
            ]);
        }

        return response()->json([
            'result' => [
                'target' => $order->target,
                'start' => $order->start,
                'status' => $order->status,
                'custom_field' => $order->custom_field,
            ],
        ]);
    }
}
