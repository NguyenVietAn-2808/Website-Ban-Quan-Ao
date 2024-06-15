<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function add_product(){
        return view('admin.product.add',[
            'title' => 'Thêm Sản Phẩm'
        ]);
    }
    public function insert_product(Request $request) {
        $product = new product();
        $product -> name = $request -> input('name');
        $product -> material = $request -> input('material');
        $product -> price_nomal = $request -> input('price_nomal');
        $product -> price_sale = $request -> input('price_sale');
        $product -> description = $request -> input('description');
        $product -> content = $request -> input('content');
        $product -> image = $request -> input('image');
        $product_images = implode('*',$request -> input('images'));
        $product -> images = $product_images;
        $product ->save();
        return redirect() -> back();
    }
    public function list_product(){
        $product = DB::table('products')->paginate(6); // hien thi phan trang (tạo sau)
        // $product = product::all(); //hien thi tat ca san pham trong danh sach sp
        return view('admin.product.list',[
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $product
        ]);
    }
    public function delete_product(Request $request){
        product::find($request -> product_id)->delete();
        return response()->json([
            'sucess' =>true
        ]);
    }
    public function edit_product(Request $request){
        $product = product::find( $request -> id );
        return view('admin.product.edit',[
            'title' => 'Sửa Sản Phẩm',
            'product' => $product
        ]);
    }
    public function update_product(Request $request){
        $product = product::find( $request -> id );
        $product -> name = $request -> input('name');
        $product -> material = $request -> input('material');
        $product -> price_nomal = $request -> input('price_nomal');
        $product -> price_sale = $request -> input('price_sale');
        $product -> description = $request -> input('description');
        $product -> content = $request -> input('content');
        $product -> image = $request -> input('image');
        $product_images = implode('*',$request -> input('images'));
        $product -> images = $product_images;
        $product ->save();
        return redirect('/admin/product/list');
    }

    //tim kiem sp
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

        return view('search', compact('products'));
    }
   
}
