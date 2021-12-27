<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\ApiVendor;
use Illuminate\Http\Request;
use App\Models\ServiceProduct;
use App\Helpers\NewOrderHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * General API Method
     * Need Data 'Action'
     * 
     * @return \Illuminate\Http\Response
     */
    public function api(Request $request)
    {
        // Check User API Key
        $user = User::where('api_key', $request->api_key)->first();
        if (isset($user)) {
            // Check Action
            if ($request->action == "profile") {
                $result = $this->profile($request);
            } else if ($request->action == "services") {
                $result = $this->services($request);
            } else if ($request->action == "create") {
                $result = $this->create($request);
            } else if ($request->action == "status") {
                $result = $this->status($request);
            } else {
                return response()->json([
                    'status' => false,
                    'data' => 'Action Salah!',
                ]);
            }

            return $result;
        } else {
            return response()->json([
                'status' => false,
                'data' => 'API Key Salah!',
            ]);
        }
    }

    /**
     * Show Profile Information.
     * (api_key)
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $user = User::where('api_key', $request->api_key)->first();
        if (isset($user)) {
            return [
                'status' => true,
                'data' => [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'balance' => $user->balance,
                ],
            ];
        } else {
            return response()->json([
                'status' => false,
                'data' => 'API Key Salah!',
            ]);
        }
    }

    /**
     * Show All Services Information.
     * (api_key)
     * @return \Illuminate\Http\Response
     */
    public function services(Request $request)
    {
        $user = User::where('api_key', $request->api_key)->first();

        if (isset($user)) {
            $products = ServiceProduct::all();
            $services = array();
            foreach ($products as $product) {
                $services[] = [
                    'id' => $product->id,
                    'category' => $product->serviceCategory->name,
                    'name' => $product->name,
                    'price' => $product->hjual,
                    'min' => $product->min,
                    'max' => $product->max,
                    'desc' => $product->desc,
                ];
            }
            return response()->json([
                'status' => true,
                'data' => $services,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'API Key Salah!',
            ]);
        }
    }

    /**
     * Create New Order.
     * (api_key, api_id, target, quantity)
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Check API User
        $user = User::where('api_key', $request->api_key)->first();
        if (isset($user)) {
            // Check In Progress Order
            $order = DB::table('orders')->where([
                ['status', '!=', 'Completed'],
                ['status', '!=', 'Partial'],
                ['status', '!=', 'Cancel'],
                ['user_id', '==', $user->id],
                ['service_product_id', '==', $request->api_id],
                ['target', 'LIKE', '%' . $request->target . '%'],
            ])->select('id', 'target', 'status')->first();
            if (!isset($order)) {
                // Check Product ID
                $detailProduct = DB::table('service_products')->where([
                    ['id', '=', $request->api_id],
                    ['status', '=', '1'],
                ])->select('id', 'api_vendor_id', 'api_id', 'max', 'hjual')->first();
                if (isset($detailProduct)) {
                    // Check Max Quantity
                    if ($detailProduct->max >= $request->quantity) {
                        // Check Balance
                        $price = $request->quantity * ($detailProduct->hjual / 1000); //Price from Quantity
                        if ($user->balance >= $price) {
                            $vendor = ApiVendor::findOrFail($detailProduct->api_vendor_id);
                            $name = $vendor->name;
                            $sendOrder = NewOrderHelper::sendOrder(
                                array(
                                    'name' => $name,
                                    'api_key' => $vendor->key,
                                    'api_id' => $detailProduct->api_id,
                                    'target' => $request->target,
                                    'quantity' => $request->quantity,
                                    'url' => $vendor->url,
                                )
                            );

                            // Check Status SendOrder
                            if ($sendOrder->status == TRUE) {
                                // Save data to the Database
                                $new_order = Order::create([
                                    'service_product_id'    => $request->api_id,
                                    'user_id'    => $user->id,
                                    'order_id'    => $sendOrder->order_id,
                                    'target'    => $request->target,
                                    'amount'    => $request->quantity,
                                    'price'    => $price,
                                    'spend'    => $sendOrder->spend,
                                    'status'    => "Pending",
                                    'start'    => $sendOrder->start,
                                    'remain'    => $sendOrder->remain,
                                    'date_added' => Carbon::now()->toDateTimeString(),
                                ]);

                                // Update Balance
                                $user->update([
                                    'balance' => $user->balance - $price
                                ]);

                                // Succes Return
                                return response()->json([
                                    'status' => true,
                                    'data' => [
                                        'id' => $new_order->id,
                                        'price' => $price,
                                        'start' => $sendOrder->start,
                                    ],
                                ]);
                            } else {
                                $data = $sendOrder->message;
                            }
                        } else {
                            $data = 'Saldo tidak mencukupi. Mohon lakukan topup saldo!';
                        }
                    } else {
                        $data = 'Jumlah pesanan melewati batas Maksimal. Mohon cek ulang pesanan anda!';
                    }
                } else {
                    $data = 'ID Layanan Salah/Tidak ditemukan';
                }
            } else {
                $data = 'Target masih dalam progress. Mohon untuk menunggu!';
            }
        } else {
            $data = 'API Key Salah!';
        }
        // Fail Return
        return response()->json([
            'status' => false,
            'data' => $data,
        ]);
    }

    /**
     * Create New Order.
     * (api_key, order_id)
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        // Check User
        $user = User::where('api_key', $request->api_key)->first();
        if (isset($user)) {
            // Check Order
            $order = DB::table('orders')->where([
                ['id', $request->order_id],
                ['user_id', $user->id]
            ])->select('id', 'target', 'status', 'price', 'start', 'remain')->first();
            if (isset($order)) {
                return response()->json([
                    'status' => true,
                    'data' => [
                        'id' => $order->id,
                        'target' => $order->target,
                        'status' => $order->status,
                        'price' => $order->price,
                        'start' => $order->start,
                        'remains' => $order->remain,
                    ],
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'data' => 'Order ID salah/Tidak ditemukan!',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'data' => 'API Key Salah!',
            ]);
        }
    }
}
