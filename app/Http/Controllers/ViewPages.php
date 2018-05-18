<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\category;
use App\Book;
use App\Cart;
use App\Customer;
use  App\order_details;
use  App\ordered_book;
use Illuminate\Support\Facades\DB;

class ViewPages extends Controller
{   
    public function getAddToCart(Request $request, $book_id){
        // echo "string";
        $book = Book::find($book_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($book, $book->book_id);
        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function getCart(){
        if(Session::has('cart')){
            $cart = Session::get('cart');
            return view('pages.carts', ['cart'=>$cart, 'items'=>$cart->items]);
        }
        $cart = null;
        return view('pages.carts', ['cart'=>$cart]);

    }

    public function removeAllCart(Request $request){
        $request->session()->put('cart', null);
        return redirect()->route('cart');
    }

    public function updateCart(Request $request){
        $action = $request->get('action');
        $id = $request->get('id');
        if(Session::has('cart')){
            $cart = Session::get('cart');
            if($action == 'removeBook'){
                $cart->remove($id);
            } else if($action == 'increaseQty'){
                $cart->increase($id);
            } else if($action == 'decreaseQty'){
                $cart->decrease($id);
            }
            return 'ok';
        }
    }

    public function homepage()
    {
        // $listBook=Book::where('category_id',1)->skip(0)->take(3)->get();
        $listBook=DB::table('ordered_book')
        ->join('book','book.book_id','=','ordered_book.book_id')
        ->selectRaw('ordered_book.book_id,book.*, SUM(ordered_book.quantity) as total')
        ->groupBy('ordered_book.book_id','book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity')
        ->orderByRaw('SUM(ordered_book.quantity) DESC')
        ->skip(0)
        ->take(3)
        ->get();
        $listVanHoc=Book::where('category_id',1)->skip(0)->take(4)->get();
        $listGiaoDuc=Book::where('category_id',2)->skip(0)->take(4)->get();
        $listThieuNhi=Book::where('category_id',5)->skip(0)->take(4)->get();
        $listTeen=Book::where('category_id',6)->skip(0)->take(4)->get();
        return view('pages.home',['listBook'=>$listBook,'listVanHoc'=>$listVanHoc,'listGiaoDuc'=>$listGiaoDuc,'listThieuNhi'=>$listThieuNhi,'listTeen'=>$listTeen]);
    }


    public function getContentCheckOut()
    {
        return view('pages.check_out');
    }

    public function getBuyBook()
    {
        if(Session::has('cart')){
            $cart=Session::get('cart');
            if($cart->items==null || count($cart->items)==0){
                return redirect('thong-bao')->with('nhac_nho','Giỏ Hàng Đang Trống. Bạn Hãy Thêm Hàng Vào Giỏ');
            }
            else{
                if (session('UserLogin')) {
                    return view('pages.buyBook');
                }
                else{
                    return view('pages.login');
                }
            }
        }
        else{
            return redirect('thong-bao')->with('nhac_nho','Giỏ Hàng Đang Trống. Bạn Hãy Thêm Hàng Vào Giỏ');
        }
        
    }

    public function getContentPayment()
    {
        return view('pages.payment');
    }


    public function getLoaiSanPham($id)
    {
        $category=category::find($id);
        $listBook=Book::where('category_id',$id)->paginate(12);
        return view('pages.loai_san_pham',['listBook'=>$listBook,'title'=>$category->category_name]);
    }

    public function postUpdateInformation(Request $req)
    {
        $customer=Customer::find(Session('UserLogin')->user_id);
        $customer->user_name=$req->username;
        $customer->phone=$req->phone;
        $customer->email=$req->email;
        $customer->address=$req->address;
        $customer->save();
        $req->session()->put('UserLogin',$customer);
        return redirect('/user_information')->with('thongbao','Cập nhật thông tin thành công');
    }
    public function postChangePassword(Request $req)
    {
        $customer = Customer::find(Session('UserLogin')->user_id);
        if($customer->password== $req->currentpassword)
        {
            $customer->password = $req->newpassword;
            $customer->save();
            $req->session()->put('UserLogin',$customer);
            return redirect('/user_information')->with('passwordcorrect','Đổi mật khẩu thành công');
        }
        else
        {
            return redirect('/user_information')->with('passwordincorrect','Mật khẩu sai!');
        }
    }
    public function listOrder()
    {
        $listorder = DB::table('order_details')
        //    ->join('ordered_book','order_details.order_id','=','ordered_book.order_id')
        ->where('order_details.user_id','=',Session('UserLogin')->user_id)->orderBy('order_details.date_created','ASC')
        ->paginate(5);
        return view('pages.order_history',['listorder'=>$listorder]);
    }
    public function getOrderDetail($id)
    {
        $detail = DB::table('ordered_book')
        ->join('book','ordered_book.book_id','=','book.book_id')
        ->where('order_id',$id)
        ->select('ordered_book.quantity','ordered_book.price','book.book_name')
        ->get();
        return view('pages.order_history_detail',['detail'=>$detail]);
    }
}
