<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function list_order(){
        $orders = order::all();
        return view('admin.order.list',[
            'orders' => $orders
        ]);
    }
    public function details_order(Request $request){
        $order_detail = json_decode($request -> order_detail,true);                    // encode chuyen tu array sang json va decode la nguoc lai
        $product_id = array_keys($order_detail);
        $products = product::whereIn('id',$product_id) ->get();   // wherein lay 1 mang trong data ra can cu theo id
        return view('admin.order.details',[
            'products' => $products,
            'order_detail' => $order_detail
        ]); 
    }
    //test xoa
    // public function delete_order(Request $request)
    // {
    //     $order = Order::find($request->order_id);
    //     if ($order) {
    //         $order->delete();
    //         return response()->json(['success' => true]);
    //     }

    //     return response()->json(['success' => false]);
    // }
    public function delete_order(Request $request)
    {
        Order::find($request->order_id) -> delete();
        return response()->json([
            'success' => true
        ]);
    }

    
}

