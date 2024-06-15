<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\TestMail;
use App\Models\order;
use App\Models\product;
use App\Notifications\EmailNotification;
use Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
        $products = product::all(); // lấy dữ liệu 
        return view('home',[
            'products'=> $products   
        ]);
    }
    public function show_product(Request $request){      //truyền biến qua nên có thêm request
        $product = product::find($request->id);
        return view('product',[
            'product' => $product
        ]) ;
    }
    // them vao gio hang
    public function add_cart(Request $request){
        $product_id = $request -> product_id;
        $product_qty = $request -> product_qty;
        if(is_null(Session::get('cart')))
        {
            Session::put('cart',[
                $product_id => $product_qty
            ]);
            return redirect('/cart');
        }
        else {
            $cart = Session::get('cart');   
            if(Arr::exists($cart,$product_id)){
                $cart[$product_id] = $cart[$product_id] + $product_qty;//neu co san 1 san pham & muon mua them 1sp trung thi no cong len
                Session::put('cart',$cart);
                return redirect('/cart');
            }
            else{
                $cart[$product_id] = $product_qty; // neu chua co sp bị trùng trong giỏ hàng
                Session::put('cart',$cart);
                return redirect('/cart');
            }
        }
    }
    public function show_cart(){
        $cart = Session::get('cart');
        $product_id = array_keys($cart);
        $products = product::whereIn('id',$product_id) ->get(); // căn cứ vào trường id để lấy sản phẩm ra
        return view('cart',[
            'products' => $products
        ]);
    }

    public function delete_cart(Request $request){
        $cart = Session::get('cart');
        $product_id = $request -> id;
        unset($cart[$product_id]);
        Session::put('cart',$cart);
        return redirect('/cart');
    }

    public function update_cart(Request $request){    //cap nhat gio hang
        $cart = $request -> product_id;
        Session::put('cart',$cart);
        return redirect('/cart');
    }

    public function send_cart(OrderRequest $request){
       
        $token = Str::random(12);
        $order = new order;
        $order -> name = $request -> input('name');
        $order -> phone = $request -> input('phone');
        $order -> email = $request -> input('email');
        $order -> city = $request -> input('city');
        $order -> district = $request -> input('district');
        $order -> ward = $request -> input('ward');
        $order -> address = $request -> input('address');
        $order -> note = $request -> input('note');
        $order_detail = json_encode($request -> input('product_id'));
        $order -> order_detail = $order_detail;
        $order -> token =$token;
        $order -> save();
        Session::flush();
        $mailInfor = $order -> email;   
        $nameInfor = $order -> name;
        $Mail = Mail::to( $mailInfor) -> send(new TestMail($nameInfor));
        // Notification::send($order, new EmailNotification($order));   CHUAN
        // Lấy email từ file .env
        $yourEmail = env('MAIL_FROM_ADDRESS');
        // Gửi thông báo đơn hàng đến email của bạn
        Notification::route('mail', $yourEmail)->notify(new EmailNotification($order));
        //HOAC THAY DÒNG TRÊN THÀNH 2 DÒNG
        // $notificationOrder = (object) ['email' => $yourEmail]; Tạo một đối tượng giả để gửi thông báo
        // Notification::send($notificationOrder, new EmailNotification($order));
        return redirect('/order/confirm');
    }


    //login Admin
    public function show_login(){
        return view('admin.login');
    }
    public function check_login(Request $request){
        if(Auth::attempt(
        [
            'email' => $request -> input('email'), 'password' => $request -> input('password')
        ]
      ))
      {
        return redirect('admin');
      }
      return redirect() -> back();

    }
    // hien thi số lượng sản phẩm trong giỏ hàng lên icon giỏ hàng
    public function update_carts(Request $request){    //cap nhat gio hang
        $cart = $request -> product_id;
        Session::put('cart',$cart);
        return redirect('/cart');
    }
    
}
