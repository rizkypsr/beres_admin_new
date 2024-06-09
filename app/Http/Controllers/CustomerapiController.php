<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerapiController extends Controller
{
    public function index(Request $request)
    {

        $customer = Customer::where('id_customer', $request->id_customer)->where('customer_is_delete', 0)->first();
        if ($customer->customer_is_delete == 1) {
            return response()->json([
                'status' => false,
                'msg' => 'User Belum Terdaftar',

            ]);
        }
        if ($customer == null) {
            return response()->json([
                'status' => false,
                'msg' => 'User Not Found',
                'data' => null,
            ]);
        }
        if (! Hash::check($request->pin_customer, $customer->pin_customer, [])) {
            return response()->json([
                'status' => false,
                'msg' => 'password wrong',
                'data' => null,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'msg' => 'login successfully',
            'data' => $customer,
        ]);
    }

    public function customerget($id)
    {

        $customerget = Customer::where('id_customer', $id)->where('customer_is_delete', 0)->first();
        if ($customerget->customer_is_delete == 1) {
            return response()->json([
                'status' => false,
                'msg' => 'User belum terdaftar',
                'data' => null,
            ]);
        }
        if ($customerget == null) {
            return response()->json([
                'status' => false,
                'msg' => 'User Not Found',
                'data' => null,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'msg' => 'data customer',
            'data' => $customerget,
        ]);
    }
}
