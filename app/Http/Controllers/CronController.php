<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CronController extends Controller
{
    /**
     * Cron Check Orders per 15 Menit
     *
     */
    public function cronCheck()
    {
        $orders = Order::where([
            ['status', '!=', 'Completed'],
            ['status', '!=', 'Canceled'],
            ['status', '!=', 'Partial'],
        ])->get();

        foreach ($orders as $order) {
            $checkOrder = $this->checkOrder(
                array(
                    'name' => $order->serviceProduct->apiVendor->name,
                    'api_key' => $order->serviceProduct->apiVendor->key,
                    'url' => $order->serviceProduct->apiVendor->url,
                    'order_id' => $order->order_id,
                )
            );

            if ($checkOrder->status == TRUE) {
                $spend = isset($checkOrder->spend) ? $checkOrder->spend : $order->spend;
                $start = $checkOrder->start;
                $remain = $checkOrder->remain;

                // Check Status
                if (stripos($checkOrder->order_status, 'Success') !== false || stripos($checkOrder->order_status, 'Completed') !== false) {
                    $status = "Completed";
                    // Update Date Completed
                    if ($order->status != $status) {
                        $order->update([
                            'date_completed' => Carbon::now()->toDateTimeString()
                        ]);
                    }
                } else if (stripos($checkOrder->order_status, 'Processing') !== false || stripos($checkOrder->order_status, 'In Progress') !== false || stripos($checkOrder->order_status, 'Processing') !== false) {
                    $status = "Processing";
                    // Update Date Processed
                    if ($order->status != $status) {
                        $order->update([
                            'date_processed' => Carbon::now()->toDateTimeString()
                        ]);
                    }
                } else if (stripos($checkOrder->order_status, 'Error') !== false || stripos($checkOrder->order_status, 'Canceled') !== false) {
                    $status = "Canceled";
                    // Update Data Canceled
                    if ($order->status != $status) {
                        if ($spend == 0) {
                            $new_price = 0;
                            $new_balance = $order->user->balance + ($order->price - $new_price);
                        } else {
                            $margin = (($order->price - $order->spend) / $order->spend) * 100;
                            $new_price = ceil($spend * (($margin + 100) / 100));
                            $new_balance = $order->user->balance + ($order->price - $new_price);
                        }
                        $order->update([
                            'spend' => $spend,
                            'price' => $new_price,
                            'date_completed' => Carbon::now()->toDateTimeString()
                        ]);
                        // Refund Balance
                        User::find($order->user_id)->update([
                            'balance' => $new_balance
                        ]);
                    }
                } else if (stripos($checkOrder->order_status, 'Partial') !== false) {
                    $status = "Partial";
                    // Update Data Partial
                    if ($order->status != $status) {
                        $margin = (($order->price - $order->spend) / $order->spend) * 100;
                        if (stripos($order->serviceProduct->apiVendor->name, 'Irvan') !== false) { //Irvan Kede Panel
                            $new_price = ceil($remain * ($order->price / 1000));
                            $spend = ceil($remain * ($order->spend / 1000));
                            $new_balance = $order->user->balance + ($order->price - $new_price);
                        } else {
                            $new_price = ceil($spend * (($margin + 100) / 100));
                            $new_balance = $order->user->balance + ($order->price - $new_price);
                        }
                        $order->update([
                            'spend' => $spend,
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

                // Update Status
                if ($order->status != $status) {
                    $order->update([
                        'status' => $status,
                        'start' => $start,
                        'remain' => $remain,
                    ]);
                } else {
                    $order->update([
                        'start' => $start,
                        'remain' => $remain,
                    ]);
                }
            }
        }
        return 'ok';
    }

    /**
     * Function Logic Check Order to Vendor
     ** Irvan
     ** Amazing
     ** Daily
     ** Emhapras
     */
    private function checkOrder($request)
    {
        if (stripos($request['name'], 'Irvan') !== false) { //Irvan Kede Panel
            $connect = json_decode(
                $this->connect(
                    array(
                        // 'api_id' => 22706,
                        'api_id' => 14232,
                        'api_key' => $request['api_key'],
                        'id' => $request['order_id'],
                    ),
                    $request['url'] . 'status'
                )
            );
            // Check Success/Fail Order
            if ($connect->status == TRUE) {
                $status = $connect->data->status;
                $start = isset($connect->data->start_count) ? $connect->data->start_count : 0;
                $remain = isset($connect->data->remains) ? $connect->data->remains : 0;
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
                        'action' => 'status',
                        'order' => $request['order_id'],
                    ),
                    $request['url']
                )
            );
            // Check Success/Fail Order
            if (isset($connect)) {
                $status = $connect->status;
                $spend = ceil(($connect->charge) * 15000);
                $start = isset($connect->start_count) ? $connect->start_count : 0;
                $remain = isset($connect->remains) ? $connect->remains : 0;
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
                        'action' => 'status',
                        'order_id' => $request['order_id'],
                    ),
                    $request['url']
                )
            );
            // Check Success/Fail Order
            if ($connect->success == TRUE) {
                $status = $connect->msg->status;
                $spend = ceil($connect->msg->harga);
                $start = isset($connect->msg->jumlah_awal) ? $connect->msg->jumlah_awal : 0;
                $remain = isset($connect->msg->jumlah_kurang) ? $connect->msg->jumlah_kurang : 0;
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
                        'id' => $request['order_id'],
                    ),
                    $request['url'] . 'status'
                )
            );
            // Check Success/Fail Order
            if ($connect->result == TRUE) {
                $status = $connect->data->status;
                $spend = ceil($connect->data->price);
                $start = isset($connect->data->start_count) ? $connect->data->start_count : 0;
                $remain = isset($connect->data->remains) ? $connect->data->remains : 0;
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => $connect->data->msg
                );
            }
        }

        return (object)array(
            'status' => TRUE,
            'order_status' => $status,
            'spend' => isset($spend) ? $spend : 0,
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
