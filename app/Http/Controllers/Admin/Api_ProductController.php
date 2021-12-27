<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApiVendor;
use Illuminate\Http\Request;
use App\Models\ServiceProduct;
use App\Http\Controllers\Controller;

class Api_ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = ApiVendor::all();
        return view('admin.pages.service.api.api-product', [
            'vendors' => $vendors
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendors = ApiVendor::all();
        $vendor = ApiVendor::findOrFail($id);

        // Check Vendor Panel
        $vendor_id = $vendor->id;
        $name = $vendor->name;
        $getServices = $this->getServices(
            array(
                'name' => $name,
                'api_key' => $vendor->key,
                'url' => $vendor->url,
            )
        );

        // Check Status getServices
        if ($getServices->status == TRUE) {
            return view('admin.pages.service.api.api-product', [
                'vendors' => $vendors,
                'vendor_name' => $name,
                'vendor_id' => $vendor_id,
                'result' => $getServices->data
            ]);
        } else {
            return redirect()->back()->withErrors($getServices->message);
        }
    }

    /**
     * Function Logic Get Services from Vendor
     ** Irvan
     ** Amazing
     ** Daily
     ** Emhapras
     */
    private function getServices($request)
    {
        $services = $exist_product = array();
        if (stripos($request['name'], 'Irvan') !== false) { //Irvan Panel
            // Get list service
            $request = json_decode(
                $this->connect(
                    array(
                        // 'api_id' => 22706,
                        'api_id' => 14232,
                        'api_key' => $request['api_key']
                    ),
                    $request['url'] . 'services'
                )
            );
            // Check Success/Fail Order
            if ($request->status == TRUE) {
                $services = $request->data;
                // Check existing product
                $i = 0;
                foreach ($services as $service) {
                    $check = ServiceProduct::select('id', 'name', 'hjual', 'min', 'max')
                        ->where(function ($query) {
                            $query->whereHas('apiVendor', function ($query) {
                                $query->where('name', 'LIKE', '%Irvan%');
                            });
                        })->where('api_id', $service->id)->first();
                    if ($check) {
                        $exist_product[] = (object) array_merge(
                            (array)$services[$i],
                            [
                                'prod_id' => $check->id,
                                'prod_name' => $check->name,
                                'hjual' => $check->hjual,
                                'prod_min' => $check->min,
                                'prod_max' => $check->max,
                            ]
                        );
                        unset($services[$i]);
                    }
                    $i++;
                }
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => $request->data . " (Irvan Panel)"
                );
            }
        } else if (stripos($request['name'], 'Amazing') !== false) { //Amazing Panel
            // Get list service
            $request = json_decode(
                $this->connect(
                    array(
                        'key' => $request['api_key'],
                        'action' => 'services',
                    ),
                    $request['url']
                )
            );
            // Check Success/Fail Order
            if (isset($request)) {
                $services = $request;
                // Check existing product
                $i = 0;
                foreach ($services as $service) {
                    $check = ServiceProduct::select('id', 'name', 'hjual', 'min', 'max')
                        ->where(function ($query) {
                            $query->whereHas('apiVendor', function ($query) {
                                $query->where('name', 'LIKE', '%Amazing%');
                            });
                        })->where('api_id', $service->service)->first();
                    if ($check) {
                        $exist_product[] = (object) array_merge(
                            (array)$services[$i],
                            [
                                'prod_id' => $check->id,
                                'prod_name' => $check->name,
                                'hjual' => $check->hjual,
                                'prod_min' => $check->min,
                                'prod_max' => $check->max,
                            ]
                        );
                        unset($services[$i]);
                    }
                    $i++;
                }
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => "Terjadi kesalahan API. Mohon refresh halaman ini! (Amazing Panel)"
                );
            }
        } else if (stripos($request['name'], 'Daily') !== false) { //Daily Panel
            // Get list service
            $request = json_decode(
                $this->connect(
                    array(
                        'pin' => 776622,
                        'api_key' => $request['api_key'],
                        'action' => 'services'
                    ),
                    $request['url']
                )
            );
            // Check Success/Fail Order
            if ($request->success == TRUE) {
                $services = $request->msg;
                // Check existing product
                $i = 0;
                foreach ($services as $service) {
                    $check = ServiceProduct::select('id', 'name', 'hjual', 'min', 'max')
                        ->where(function ($query) {
                            $query->whereHas('apiVendor', function ($query) {
                                $query->where('name', 'LIKE', '%Daily%');
                            });
                        })->where('api_id', $service->id)->first();
                    if ($check) {
                        $exist_product[] = (object) array_merge(
                            (array)$services[$i],
                            [
                                'prod_id' => $check->id,
                                'prod_name' => $check->name,
                                'hjual' => $check->hjual,
                                'prod_min' => $check->min,
                                'prod_max' => $check->max,
                            ]
                        );
                        unset($services[$i]);
                    }
                    $i++;
                }
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => $request->msg->error . " (Daily Panel)"
                );
            }
        } else if (stripos($request['name'], 'Emhapras') !== false) { //Emhapras Panel
            // Get list service
            $request = json_decode(
                $this->connect(
                    array(
                        'secret_key' => 776622,
                        'api_key' => $request['api_key'],
                    ),
                    $request['url'] . 'services'
                )
            );
            // Check Success/Fail Order
            if ($request->result == TRUE) {
                $services = $request->data;
                // Check existing product
                $i = 0;
                foreach ($services as $service) {
                    $check = ServiceProduct::select('id', 'name', 'hjual', 'min', 'max')
                        ->where(function ($query) {
                            $query->whereHas('apiVendor', function ($query) {
                                $query->where('name', 'LIKE', '%Emhapras%');
                            });
                        })->where('api_id', $service->id)->first();
                    if ($check) {
                        $exist_product[] = (object) array_merge(
                            (array)$services[$i],
                            [
                                'prod_id' => $check->id,
                                'prod_name' => $check->name,
                                'hjual' => $check->hjual,
                                'prod_min' => $check->min,
                                'prod_max' => $check->max,
                            ]
                        );
                        unset($services[$i]);
                    }
                    $i++;
                }
            } else {
                return (object)array(
                    'status' => FALSE,
                    'message' => $request->data->msg . " (Emhapras Panel)"
                );
            }
        }
        return (object) [
            'status' => TRUE,
            'data' => array_merge($exist_product, $services)
        ];
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
