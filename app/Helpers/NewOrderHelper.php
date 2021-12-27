<?php

namespace App\Helpers;

class NewOrderHelper
{
    /**
     * Function Logic Send Order to Vendor
     ** Irvan
     ** Amazing
     ** Daily
     ** Emhapras
     */
    public static function sendOrder($request)
    {
        if (stripos($request['name'], 'Irvan') !== false) { //Irvan Kede Panel
            $connect = json_decode(
                self::connect(
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
                self::connect(
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
                    self::connect(
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
                self::connect(
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
                    self::connect(
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
                self::connect(
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
    private static function connect($post, $end_point = null)
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
