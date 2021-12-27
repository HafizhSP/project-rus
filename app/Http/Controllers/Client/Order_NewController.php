<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Order;
use App\Models\ApiVendor;
use Illuminate\Http\Request;
use App\Models\ServiceSocmed;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Order_NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socmeds = ServiceSocmed::all();
        return view('client.pages.service.new', [
            'socmeds' => $socmeds
        ]);
    }

    /**
     * Dropdown Category
     * On Click Socmed
     *
     * @return \Illuminate\Http\Response
     */
    public function dropdown_category(Request $request)
    {
        // Query select name + id category
        $listCategories = DB::table('service_categories')->where([
            ['status', '=', '1'],
            ['service_socmed_id', '=', $request->socmed_id],
        ])->orderBy('name', 'asc')->get();

        return response()->json([
            'listCategories' => $listCategories
        ]);
    }

    /**
     * Dropdown Product
     * On Click Category
     *
     * @return \Illuminate\Http\Response
     */
    public function dropdown_product(Request $request)
    {
        // Query select id and nilai category based on id sosmed selected
        $listProducts = DB::table('service_products')->where([
            ['status', '=', '1'],
            ['service_category_id', '=', $request->category_id],
        ])->select('id', 'name')->orderBy('name', 'asc')->get();


        return response()->json([
            'listProducts' => $listProducts,
        ]);
    }

    /**
     * Show Product Detail
     * On Select Product
     *
     * @return \Illuminate\Http\Response
     */
    public function show_product(Request $request)
    {
        // Query select id and nilai category based on id sosmed selected
        $detailProducts = DB::table('service_products')->where([
            ['id', '=', $request->product_id],
            ['status', '=', '1'],
        ])->first();


        return response()->json([
            'detailProducts' => $detailProducts,
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
            'socmed'    => 'required|numeric',
            'category'    => 'required|numeric',
            'product'    => 'required|numeric',
            'target'    => 'required|string',
            'amount'    => 'required|numeric|min:1|not_in:0',
        ]);

        // Check Exist Order
        $order = DB::table('orders')->where([
            ['status', '!=', 'Completed'],
            ['status', '!=', 'Partial'],
            ['status', '!=', 'Cancel'],
            ['service_product_id', '==', $request->product],
            ['target', 'LIKE', '%' . $request->target . '%'],
        ])->select('id', 'target', 'status')->first();
        if (!isset($order)) {
            // Check Product
            $detailProduct = DB::table('service_products')->where([
                ['id', '=', $request->product],
                ['status', '=', '1'],
            ])->select('id', 'api_vendor_id', 'api_id', 'max', 'hjual')->first();
            if (isset($detailProduct)) {
                // Check Max Amount
                if ($detailProduct->max >= $request->amount) {
                    // Check Balance
                    $user =  User::findOrFail(Auth::user()->id);
                    $price = $request->amount * ($detailProduct->hjual / 1000); //Price from Amount
                    if ($user->balance >= $price) {
                        $vendor = ApiVendor::findOrFail($detailProduct->api_vendor_id);
                        $name = $vendor->name;
                        $sendOrder = $this->sendOrder(
                            array(
                                'name' => $name,
                                'api_key' => $vendor->key,
                                'api_id' => $detailProduct->api_id,
                                'target' => $request->target,
                                'quantity' => $request->amount,
                                'url' => $vendor->url,
                            )
                        );

                        // Check Status SendOrder
                        if ($sendOrder->status == TRUE) {
                            // Save data to the Database
                            Order::create([
                                'service_product_id'    => $request->product,
                                'user_id'    => Auth::user()->id,
                                'order_id'    => $sendOrder->order_id,
                                'target'    => $request->target,
                                'amount'    => $request->amount,
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

                            return redirect()->route('order.index')->withSuccess("New Order Success for Added");
                        } else {
                            return redirect()->route('order.index')->withErrors($sendOrder->message);
                        }
                    } else {
                        return redirect()->route('order.index')->withErrors("Saldo tidak mencukup. Mohon lakukan topup saldo!");
                    }
                } else {
                    return redirect()->route('order.index')->withErrors("Jumlah pesanan melewati batas Maksimal. Mohon cek ulang pesanan anda!");
                }
            } else {
                return redirect()->route('order.index')->withErrors("Produk tidak ditemukan. Mohon refresh halaman ini!");
            }
        } else {
            return redirect()->route('order.index')->withErrors("Target masih dalam progress. Mohon untuk menunggu!");
        }
    }

    /**
     * Function Logic Send Order to Vendor
     ** Irvan
     ** Amazing
     ** Daily
     ** Emhapras
     */
    private function sendOrder($request)
    {
        if (stripos($request['name'], 'Irvan') !== false) { //Irvan Kede Panel
            $connect = json_decode(
                $this->connect(
                    array(
                        // 'api_id' => 22706,
                        'api_id' => 14232,
                        'api_key' => $request['api_key'],
                        'service' => $request['api_id'],
                        'target' => $request['target'],
                        'quantity' => $request['quantity'],
                    ),
                    $request['url'] . 'order'
                )
            );
            // Check Success/Fail Order
            if ($connect->status == TRUE) {
                $order_id = $connect->data->id;
                $spend = ceil($connect->data->price);
                $start = $remain = 0;
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => $connect->data
                );
            }
        } else if (stripos($request['name'], 'Amazing') !== false) { //Amazing Panel
            $connect = json_decode(
                $this->connect(
                    array(
                        'key' => $request['api_key'],
                        'action' => 'add',
                        'service' => $request['api_id'],
                        'link' => $request['target'],
                        'quantity' => $request['quantity'],
                    ),
                    $request['url']
                )
            );
            // Check Success/Fail Order
            if (isset($connect)) {
                $order_id = $connect->order;
                $start = $remain = $spend = 0;

                // Check Price
                $check = json_decode(
                    $this->connect(
                        array(
                            'key' => $request['api_key'],
                            'action' => 'status',
                            'order' => $order_id,
                        ),
                        $request['url']
                    )
                );
                if (isset($check)) {
                    $spend = ceil(($check->charge) * 15000);
                    $start = isset($check->start_count) ? $check->start_count : 0;
                    $remain = isset($check->remains) ? $check->remains : 0;
                }
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => "Terjadi kesalahan API. Mohon refresh halaman ini! (2)"
                );
            }
        } else if (stripos($request['name'], 'Daily') !== false) { //Daily Panel
            $connect = json_decode(
                $this->connect(
                    array(
                        'pin' => 776622,
                        'api_key' => $request['api_key'],
                        'action' => 'order',
                        'service' => $request['api_id'],
                        'target' => $request['target'],
                        'quantity' => $request['quantity'],
                    ),
                    $request['url']
                )
            );
            // Check Success/Fail Order
            if ($connect->success == TRUE) {
                $order_id = $connect->msg->order_id;
                $start = $remain = $spend = 0;

                // Check Price
                $check = json_decode(
                    $this->connect(
                        array(
                            'pin' => 776622,
                            'api_key' => $request['api_key'],
                            'action' => 'status',
                            'order_id' => $order_id,
                        ),
                        $request['url']
                    )
                );
                if ($check->success == TRUE) {
                    $spend = ceil($check->msg->harga);
                    $start = isset($check->msg->jumlah_awal) ? $check->msg->jumlah_awal : 0;
                    $remain = isset($check->msg->jumlah_kurang) ? $check->msg->jumlah_kurang : 0;
                }
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => $connect->msg->error
                );
            }
        } else if (stripos($request['name'], 'Emhapras') !== false) { //Emhapras Panel
            $connect = json_decode(
                $this->connect(
                    array(
                        'secret_key' => 776622,
                        'api_key' => $request['api_key'],
                        'service' => $request['api_id'],
                        'target' => $request['target'],
                        'quantity' => $request['quantity'],
                    ),
                    $request['url'] . 'order'
                )
            );
            // Check Success/Fail Order
            if ($connect->result == TRUE) {
                $order_id = $connect->data->id;
                $spend = ceil($connect->data->price);
                $start = $remain = 0;
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => $connect->data->msg
                );
            }
        }

        return (object)array(
            'status' => TRUE,
            'order_id' => $order_id,
            'spend' => $spend,
            'start' => $start,
            'remain' => $remain,
        );
    }

    /**
     * Function to connect API Server
     *
     */
    private function connect($post, $end_point = null)
    {
        $_post = array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name . '=' . urlencode($value);
            }
        }
        $ch = curl_init($end_point);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }
}
