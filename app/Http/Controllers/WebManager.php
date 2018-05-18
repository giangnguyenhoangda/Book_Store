<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Author;
use App\Book;
use App\Customer;
use App\Admin;
use Session;
use Illuminate\Support\Facades\DB;

class WebManager extends Controller
{

	public function postSetInfo(Request $req)
	{
		Session::put('full_name', $req->full_name);
		Session::put('phone_number', $req->phone_number);
		Session::put('city', $req->city);
		Session::put('address', $req->address);
		return 1;

	}

	public function getUnsetInfo()
	{
		if(session('full_name')){
			Session::forget('full_name');
		}
		if(session('phone_number')){
			Session::forget('phone_number');
		}
		if(session('city')){
			Session::forget('city');
		}
		if(session('address')){
			Session::forget('address');
		}
		return 1;
	}

	public function getThongBao()
	{
		return view('pages.thongbao');
	}

	public function getComingSoon()
	{
		
		return view('pages.admin.coming_soon');
	}

	public function getStatisticalTotalCustomerBuy()
	{
		$list=DB::select('SELECT customer.user_id,customer.user_name,COUNT(order_details.user_id) as orderquantity,SUM(giang.quantity) as bookquantity
			FROM customer,order_details
			LEFT JOIN
			(
			SELECT ordered_book.order_id,SUM(ordered_book.quantity) as quantity
			FROM ordered_book
			GROUP BY ordered_book.order_id
			) as giang
			ON order_details.order_id=giang.order_id
			WHERE customer.user_id=order_details.user_id

			GROUP BY customer.user_id,customer.user_name');
		return view('pages.admin.statistical.total_customer_buy',['list'=>$list]);
	}

	public function getStatisticalDoanhThu()
	{
		return view('pages.admin.statistical.doanhthu');
	}

	public function getStatisticalDoanhThuThang()
	{
		return view('pages.admin.statistical.doanhthuthang');
	}

	public function postTinhDoanhThuNam(Request $req)
	{
		$arr=DB::table('order_details')
		->whereRaw('DATE_FORMAT(order_details.date_created,"%Y")='.$req->year)
		->selectRaw('DATE_FORMAT(order_details.date_created,"%Y-%m") as month,SUM(order_details.total_money) AS total_money')
		->groupBy(DB::raw('DATE_FORMAT(order_details.date_created,"%Y-%m")'))
		->get();
		$str='';
		$total=0;
		if(count($arr)>0){
			foreach ($arr as $value) {
				$str.='<tr>';
				$str.='<td>';
				$str.=$value->month;
				$str.='</td>';
				$str.='<td>';
				$str.=number_format($value->total_money, 0, ',', '.').' đ';
				$str.='</td>';
				$str.='</tr>';
				$total+=$value->total_money;
			}
		}
		$kq=array('str'=>$str,'total'=>$total);
		return $kq;
	}

	public function getStatisticalCategory()
	{
		$list=DB::table('category')->join('book','book.category_id','=','category.category_id')
		->selectRaw('category.category_id,category.category_name,COUNT(book.book_id) as quantity')
		->groupBy('category.category_id','category.category_name')
		->paginate(6);
		return view('pages.admin.statistical.category',['list'=>$list]);
	}

	public function getStatisticalSellingBook()
	{
		$listBook=Book::join('category','category.category_id','=','book.category_id')
		->join('author','author.author_id','=','book.author_id')
		->join('ordered_book','ordered_book.book_id','=','book.book_id')
		->selectRaw('book.book_id,book.book_name,book.picture,book.language,book.publish_year,book.publisher,
			category.category_name,author.name,SUM(ordered_book.quantity) AS quantitysell')
		->groupBy('book.book_id','book.book_name','book.picture','book.language','book.publish_year','book.publisher','category.category_name','author.name')
		->orderByRaw('SUM(ordered_book.quantity) DESC')
		->paginate(6);
		return view('pages.admin.statistical.selling_book',['listBook'=>$listBook]);
	}

	public function getStatisticalAuthor()
	{
		$list=DB::table('author')->join('book','book.author_id','=','author.author_id')
		->selectRaw('author.author_id,author.name,COUNT(book.book_id) as quantity')
		->groupBy('author.author_id','author.name')
		->orderBy('author.name','ASC')
		->paginate(6);
		return view('pages.admin.statistical.author',['list'=>$list]);
	}

	public function getStatisticalPublisher()
	{
		$list=Book::selectRaw('book.publisher,COUNT(book.book_id) as quantity')
		->groupBy('book.publisher')
		->orderBy('book.publisher','ASC')->paginate(6);
		return view('pages.admin.statistical.publisher',['list'=>$list]);
	}

	public function getStatisticalLanguage()
	{
		$list=Book::selectRaw('book.language,COUNT(book.book_id) as quantity')
		->groupBy('book.language')->orderBy('book.language','ASC')->paginate(12);
		return view('pages.admin.statistical.language',['list'=>$list]);
	}

	public function getLookScreen($id)
	{
		$admin=Admin::find($id);
		if(session('adminlogin')){
			Session::forget('adminlogin');
		}
		return view('pages.admin.lock_screen',['admin'=>$admin]);
	}

	public function postProfileEdit(Request $req)
	{
		echo $req->phone;
		$admin=Admin::find($req->admin_id);
		$this->validate($req,
			[
				'first_name'=>'required',
				'last_name'=>'required'
			],
			[
				'first_name.required'=>'Bạn chưa nhập tên',
				'last_name.required'=>'Bạn chưa nhập họ',
			]);
		$admin->first_name=$req->first_name;
		session('adminlogin')->first_name=$req->first_name;
		$admin->last_name=$req->last_name;
		session('adminlogin')->last_name=$req->last_name;
		$admin->address=$req->address;
		session('adminlogin')->address=$req->address;
		$admin->city=$req->city;
		session('adminlogin')->city=$req->city;
		$admin->email=$req->email;
		session('adminlogin')->email=$req->email;
		$admin->phone=$req->phone;
		session('adminlogin')->phone=$req->phone;
		$admin->permission=$req->permission;
		session('adminlogin')->permission=$req->permission;
		$admin->save();
		return redirect('profile-edit/'.$req->admin_id)->with('thongbao','Sửa thông tin thành công');

	}

	public function postPasswordEdit(Request $req)
	{
		$admin=Admin::find($req->admin_id);
		if($admin->password==$req->pass_old){
			$admin->password=$req->pass_new;
			$admin->save();
			return redirect('profile-edit/'.$req->admin_id)->with('thongbaothaydoithanhcong','Thay đổi mật khẩu thành công');
		}
		else{
			return redirect('profile-edit/'.$req->admin_id)->with('thongbaothaydoiloi','Sai mật khẩu');
		}
	}

	public function getContentProEdit($id)
	{
		$admin=Admin::find($id);
		return view('pages.admin.profile-edit',['admin'=>$admin]);
	}


	public function getProfile($id)
	{
		$admin=Admin::find($id);
		return view('pages.admin.profile',['admin'=>$admin]);
	}

	public function get404()
	{
		return view('pages.admin.404');
	}

	public function getEditOrderDetail($id)
	{
		$item=DB::table('order_details')->where('order_id',$id)->get();
		$listBook=DB::table('ordered_book')
		->join('book','book.book_id','=','ordered_book.book_id')
		->join('author','author.author_id','=','book.author_id')
		->join('category','category.category_id','=','book.category_id')
		->where('order_id',$id)
		->selectRaw('ordered_book.*,author.name,category.category_name,book.book_name,book.language,book.publish_year,book.picture,book.publisher')
		->paginate(12);
		return view('pages.admin.edit-order-detail',['item'=>$item,'listBook'=>$listBook]);
	}

	public function postEditOrderDetail(Request $req)
	{
		$order_detail=DB::table('order_details')->where('order_id',$req->order_id)->update(['status'=>$req->status,'date_received'=>date('Y-m-d H:m:s',strtotime($req->date_received))]);
		return redirect('edit-order-detail/'.$req->order_id)->with('thongbao','Cập nhật thành công');
	}

	public function getDeleteOrder($id)
	{
		DB::table('ordered_book')->where('order_id',$id)->delete();
		DB::table('order_details')->where('order_id',$id)->delete();
		return redirect('list-order-detail')->with('thongbao','Xóa thành công');
	}


	public function getListOrderDetail()
	{
		$list=DB::table('order_details')->join('customer','customer.user_id','=','order_details.user_id')
		->selectRaw('order_details.*,customer.user_name,customer.last_name,customer.first_name')
		->orderBy('order_details.order_id','ASC')
		->get();
		return view('pages.admin.list-order-book',['list'=>$list]);
	}

	public function getAdminLogin()
	{
		return view('pages.admin.admin-login');
	}

	public function postAdminLogin(Request $req)
	{
		$user_name=$req->user_name;
		$password=$req->password;
		$check=Admin::where('user_name',$user_name)->where('password',$password)->get();
		if(count($check)>0){
			Session::put('adminlogin',$check[0]);
			return redirect('admin');
		}
		else{
			return redirect('admin-login')->with('thongbao','Sai user_name hoặc password');
		}
	}

	public function postAdminLoginFromLockScreen(Request $req)
	{
		$user_name=$req->user_name;
		$password=$req->password;
		$check=Admin::where('user_name',$user_name)->where('password',$password)->get();
		if(count($check)>0){
			Session::put('adminlogin',$check[0]);
			return redirect('admin');
		}
		else{
			Session::forget('adminlogin');
			return redirect('look-screen/'.$req->admin_id)->with('thongbao','Sai mật khẩu');
		}
	}

	public function getCheckUserName($id)
	{
		$customer=Customer::where('user_name',$id)->get();
		if(count($customer)>0){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function postSendReview(Request $req)
	{
		$result = DB::table('book_review')->insert(['book_id'=>$req->book_id,'user_id'=>$req->customer_id,'rating'=>$req->rating,'reviews'=>$req->review,'review_date'=>NOW()]);
		if($result){
			$reviews = DB::table('book_review')
			->where('book_review.book_id',$req->book_id)
			->join('customer','book_review.user_id', '=', 'customer.user_id')
			->select('customer.first_name','customer.last_name','book_review.*')
			->get()->toArray();
			$str='<table id="book_reviews" class="table table-bordered">';
      //review
			foreach ($reviews as $review) {
				$str.='<tr>';
				$str.='<td class="col-sm-2">';
				$str.='<span>'.$review -> first_name.'</span>';
				$str.='<span>'.$review -> last_name.'</span>';
				$str.='<br>';
				$str.='<span>'.$review -> review_date.'</span>';
				$str.='</td>';
				$str.='<td class="col-sm-10">';
				for($i=0; $i < $review->rating; $i++){
					$str.='<span class="fa fa-star" style="color: orange;"></span>';
				}
				for($j=5; $j > $review->rating; $j--){
					$str.='<span class="fa fa-star"></span>';
				}
				$str.='<br>';
				$str.=$review ->reviews;
				$str.='</td>';
				$str.='</tr>';
			}
			$str.='</table>';
      //end review

      // edit

			$review_info1=DB::table('book_review')->selectRaw('COUNT(book_review.user_id) AS quantity,AVG(book_review.rating) As medium')->where('book_id',$req->book_id)->get();
			$temp=DB::table('book_review')->where('book_id',$req->book_id)->selectRaw('book_review.rating,COUNT(book_review.user_id)*100/(SELECT COUNT(*) FROM book_review WHERE book_review.book_id='.$req->book_id.') AS percent')->groupby('book_review.rating')->get();
			$review_info2=array();

			foreach ($temp as $value) {
				$review_info2[$value->rating]=$value->percent;
			}
			$str1='';
			for ($i = 1; $i < 6; $i++) {
				try{
					if(array_key_exists($i,$review_info2)){
						$str1.='<div id="'.$i.'-star">';
						$str1.='        <div class="col-sm-2">';
						$str1.='          <span>'.$i.' </span><span class="fa fa-star checked" style="color: orange;"></span>';
						$str1.='        </div>';
						$str1.='        <div class="col-sm-10">';
						$str1.='          <div class="progress">';
						$str1.='              <div class="progress-bar progress-bar-success" 
						role="progressbar" aria-valuenow="40"
						aria-valuemin="0" aria-valuemax="100" style="width:'.$review_info2[$i].'%">'.
						$review_info2[$i].'%';
						$str1.='              </div>';
						$str1.='          </div>';
						$str1.='        </div>';
						$str1.='     </div>';
					}else{
						$str1.='<div id="'.$i.'-star">';
						$str1.='        <div class="col-sm-2">';
						$str1.='          <span>'.$i.' </span><span class="fa fa-star checked" style="color: orange;"></span>';
						$str1.='        </div>';
						$str1.='        <div class="col-sm-10">';
						$str1.='          <div class="progress">';
						$str1.='              <div class="progress-bar progress-bar-success" 
						role="progressbar" aria-valuenow="40"
						aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%';
						$str1.='              </div>';
						$str1.='          </div>';
						$str1.='        </div>';
						$str1.='     </div>';
					}
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}


      // end edit


			$review_info3 = DB::table('book_review')->selectRaw('COUNT(book_review.user_id) AS quantity,AVG(book_review.rating) As medium')->where('book_id',$req->book_id)->get();
			$str3='';
			foreach ($review_info3 as $value) {
				$str3.='<p>Đánh giá trung bình</p>';
				$str3.='<h1>'.$value->medium.'/5</h1>';
				$str3.='<p><span>('. $value->quantity .') nhận xét</span></p>';
			}
			$listEdit=array('str'=>$str,'str1'=>$str1,'str3'=>$str3);

			return $listEdit;
		}
		else{
			return 0;
		}
	}

	public function getBookDetail($id)
	{
		$books = DB::table('book')
		->join('author','book.author_id', '=' ,'author.author_id')
		->where('book_id',$id)
		->get();
		$reviews = DB::table('book_review')
		->where('book_review.book_id',$id)
		->join('customer','book_review.user_id', '=', 'customer.user_id')
		->select('customer.first_name','customer.last_name','book_review.*')
		->get()->toArray();
		$review_info1=DB::table('book_review')->selectRaw('COUNT(book_review.user_id) AS quantity,AVG(book_review.rating) As medium')->where('book_id',$id)->get();
		$temp=DB::table('book_review')->where('book_id',$id)->selectRaw('book_review.rating,COUNT(book_review.user_id)*100/(SELECT COUNT(*) FROM book_review WHERE book_review.book_id='.$id.') AS percent')->groupby('book_review.rating')->get();
		$review_info2=array();

		foreach ($temp as $value) {
			$review_info2[$value->rating]=$value->percent;
		}
		return view('pages.book_detail',
			[
				'books'=>$books,
				'reviews' => $reviews,
				'review_info2'=>$review_info2,
				'review_info1'=>$review_info1
			]);
	}

	public function postCheckLogin(Request $req)
	{
		$check=Customer::whereRaw('user_name=? and password=?',[$req->username,$req->password])->get();
		if(sizeof($check)!=0){
			Session::put('UserLogin', $check[0]);
			return redirect('/home');
		}
		else{
			return redirect('/login')->with('thongbao','Sai UserName hoặc Password');
		}
	}

	public function getLogin()
	{
		return view('pages.login');
	}

	public function getLogout()
	{
		//Session::forget('UserLogin');
		Session::flush();
		return redirect('/home');
	}

	public function getAdminLogout()
	{
		Session::forget('adminlogin');
		return redirect('admin-login');
	}

	public function getBookByAuthor($id)
	{
		$listBook=Book::where('author_id',$id)->paginate(12);
		$author=Author::find($id);
		return view('pages.loai_san_pham',['listBook'=>$listBook,'title'=>'Sách của '.$author->name]);
	}

	public function postSearchBook(Request $req)
	{
    //var_dump($req->search_content);
		$search_type=$req->search_type;
		if ($search_type==1) {

			// hoàng giang
			// $listBook=Book::join('category','category.category_id','=','book.category_id')
			// ->join('author','author.author_id','=','book.author_id')
			// ->whereRaw('book.book_name like CONCAT("%",?,"%") or book.publisher like CONCAT("%",?,"%") or author.name like CONCAT("%",?,"%") or category.category_name like CONCAT("%",?,"%")',[$req->search_content,$req->search_content,$req->search_content,$req->search_content])
			// ->get();

			// vân anh
			$listBook=DB::table('book')
			->join('author','book.author_id','=','author.author_id')
			->join('category','book.category_id','=','category.category_id')
			->where('book.book_name','like','%'.$req->search_content.'%')
			->orWhere('book.publisher','like','%'.$req->search_content.'%')
			->orWhere('author.name','like','%'.$req->search_content.'%')
			->orWhere('category.category_name','like','%'.$req->search_content.'%')
			->get();

      // $listBook=Book::join('category','category.category_id','=','book.category_id')
      // ->join('author','author.author_id','=','book.author_id')
      // ->whereRaw('book_name like CONCAT("%",?,"%")',[$req->search_content])
      // ->get();

      // $listBook=DB::select('
      //   SELECT * FROM book,category,author WHERE book.category_id=category.category_id AND book.author_id=author.author_id AND (book.book_name like "%?%" or book.publisher like "%?%" or author.name like "%?%" or category.category_name like "%?%")
      // ',[$req->search_content,$req->search_content,$req->search_content,$req->search_content]);

		} else if ($search_type==2) {

			$listBook=Book::where('book_name','LIKE','%'.$req->search_content.'%')->get();

      // $listBook=Book::whereRaw('book_name like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		} else if ($search_type==3) {

			$listBook=Book::join('author','book.author_id','=','author.author_id')->where('name','LIKE','%'.$req->search_content.'%')->get();

      // $listBook=Book::join('author','book.author_id','=','author.author_id')
      // ->whereRaw('author.author_name like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		} else if ($search_type==4) {

			$listBook=DB::table('book')->join('category','category.category_id','=','book.category_id')->
			where('category.category_name','LIKE','%'.$req->search_content.'%')->get();

      // $listBook=DB::table('book')->join('category','category.category_id','=','book.category_id')->
      // whereRaw('category.category_name like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		} else {

			$listBook=Book::where('publisher','LIKE','%'.$req->search_content.'%')->get();

      // $listBook=Book::whereRaw('publisher like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		}

    // $listBook=Book::where('book_name','LIKE','%'.$req->search_content.'%')->get();

		return $listBook;
	}


	public function postSearchBook_1(Request $req)
	{
    //var_dump($req->search_content);
		// echo 'Done';
		$search_type=$req->search_type;
		// echo $req->search_type;
		// echo $req->search_content;
		if ($search_type==1) {

			// hoàng giang
			// $listBook=Book::join('category','category.category_id','=','book.category_id')
			// ->join('author','author.author_id','=','book.author_id')
			// ->whereRaw('book.book_name like CONCAT("%",?,"%") or book.publisher like CONCAT("%",?,"%") or author.name like CONCAT("%",?,"%") or category.category_name like CONCAT("%",?,"%")',[$req->search_content,$req->search_content,$req->search_content,$req->search_content])
			// ->get();

			// vân anh
			$listBook=DB::table('book')
			->join('author','book.author_id','=','author.author_id')
			->join('category','book.category_id','=','category.category_id')
			->where('book.book_name','like','%'.$req->search_content.'%')
			->orWhere('book.publisher','like','%'.$req->search_content.'%')
			->orWhere('author.name','like','%'.$req->search_content.'%')
			->orWhere('category.category_name','like','%'.$req->search_content.'%')
			->paginate(12);

      // $listBook=Book::join('category','category.category_id','=','book.category_id')
      // ->join('author','author.author_id','=','book.author_id')
      // ->whereRaw('book_name like CONCAT("%",?,"%")',[$req->search_content])
      // ->get();

      // $listBook=DB::select('
      //   SELECT * FROM book,category,author WHERE book.category_id=category.category_id AND book.author_id=author.author_id AND (book.book_name like "%?%" or book.publisher like "%?%" or author.name like "%?%" or category.category_name like "%?%")
      // ',[$req->search_content,$req->search_content,$req->search_content,$req->search_content]);

		} else if ($search_type==2) {

			$listBook=Book::where('book_name','LIKE','%'.$req->search_content.'%')->paginate(12);

      // $listBook=Book::whereRaw('book_name like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		} else if ($search_type==3) {

			$listBook=Book::join('author','book.author_id','=','author.author_id')->where('name','LIKE','%'.$req->search_content.'%')->paginate(12);

      // $listBook=Book::join('author','book.author_id','=','author.author_id')
      // ->whereRaw('author.author_name like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		} else if ($search_type==4) {

			$listBook=DB::table('book')->join('category','category.category_id','=','book.category_id')->
			where('category.category_name','LIKE','%'.$req->search_content.'%')->paginate(12);

      // $listBook=DB::table('book')->join('category','category.category_id','=','book.category_id')->
      // whereRaw('category.category_name like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		} else {

			$listBook=Book::where('publisher','LIKE','%'.$req->search_content.'%')->paginate(12);

      // $listBook=Book::whereRaw('publisher like CONCAT("%", CONVERT(?, BINARY), "%")',[$req->search_content])->get();

		}

    // $listBook=Book::where('book_name','LIKE','%'.$req->search_content.'%')->get();

		return view('pages.result_search',['listBook'=>$listBook,'title'=>'Kết quả tìm kiếm của '.$req->search_content]);
	}

	public function getAdmin()
	{
		$w=DB::select('SELECT WEEKOFYEAR(NOW()) as week');
		$numberw=$w[0]->week;
		$countOrder=DB::table('order_details')->selectRaw('COUNT(*) as count')->get();
		$countBook=Book::all()->count();
		$countCustomer=Customer::all()->count();
		$countCategory=category::all()->count();
		$t=DB::select(DB::raw('SELECT WEEKDAY(DATE(order_details.date_created)) AS day_of_week,DAYNAME(order_details.date_created) As Name,
			(SUM(order_details.total_money)*100/
			(
			SELECT SUM(order_details.total_money) FROM order_details
			WHERE DATE(order_details.date_created)
			IN (
			SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) AS day
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 1 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 2 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 3 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 4 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 5 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 6 DAY
			)
			AND order_details.status=1
			)
			) as percent FROM order_details 
			WHERE DATE(order_details.date_created)
			IN (
			SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) AS day
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 1 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 2 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 3 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 4 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 5 DAY
			UNION SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) + INTERVAL 6 DAY
			)
			AND order_details.status=1
			GROUP BY WEEKDAY(DATE(order_details.date_created))'));
		//var_dump($t);
		$arr=array('Monday'=>0,'Tuesday'=>0,'Wednesday'=>0,'Thursday'=>0,'Friday'=>0,'Saturday'=>0,'Sunday'=>0);
		foreach ($t as $value) {
			if (array_key_exists($value->Name,$arr)) {
				$arr[$value->Name]=$value->percent;
			}
		}
		//var_dump($arr);

		$dayTotal=DB::table('order_details')->selectRaw('DAYNAME(CURRENT_DATE) as Name,SUM(order_details.total_money) as total_money')
		->whereRaw('DATE(order_details.date_created)=CURRENT_DATE and status=1')->get();
		// $monthTotal=DB::table('order_details')->selectRaw('MONTHNAME(CURRENT_DATE) as Name,DAYOFMONTH(CURRENT_DATE) as dayofmonth,SUM(order_details.total_money) as total_money')
		// ->whereRaw('MONTH(order_details.date_received)=MONTH(CURRENT_DATE) AND order_details.status=1')
		// ->get();

		$monthTotal=DB::select('SELECT 
			MONTHNAME(CURRENT_DATE) as Name,
			DAYOFMONTH(CURRENT_DATE) as dayofmonth,
			SUM(order_details.total_money) as total_money,
			SUM(order_details.total_money)*100/
			(
			SELECT SUM(order_details.total_money) FROM order_details WHERE YEAR(order_details.date_created)=YEAR(CURRENT_DATE) AND order_details.status=1
			) as percent
			FROM order_details WHERE MONTH(order_details.date_created)=MONTH(CURRENT_DATE) AND order_details.status=1');
		$_10order=DB::table('order_details')->join('customer','customer.user_id','=','order_details.user_id')
		->selectRaw('order_details.*,customer.first_name,customer.last_name')
		->orderBy('order_details.date_created', 'desc')
		->take(10)->get();
		// echo '<pre>';
		// var_dump($_10order);
		// echo '</pre>';
		// echo count($_10order);
		return view('pages.admin.homeadmin',['countBook'=>$countBook,'countCategory'=>$countCategory,'countCustomer'=>$countCustomer,'t'=>$arr,'numberw'=>$numberw,'countOrder'=>$countOrder,'dayTotal'=>$dayTotal,'monthTotal'=>$monthTotal,'_10order'=>$_10order]);
	}

	public function getListCategory()
	{
		$list = category::paginate(12);
		return view('pages.admin.listCategory',['list'=>$list]);
	}

	public function getListCustomer()
	{
		$list = Customer::paginate(12);
		return view('pages.admin.listCustomer',['list'=>$list]);
	}

	public function getListAdmin()
	{
		$list = Admin::paginate(12);
		return view('pages.admin.listAdmin',['list'=>$list]);
	}

	public function getAddCategory()
	{
		return view('pages.admin.addCategory');
	}

	public function getAddCustomer()
	{
		return view('pages.admin.addCustomer');
	}

	public function getAddAdmin()
	{
		return view('pages.admin.addAdmin');
	}

	public function postAddCategory(Request $req)
	{
		$this->validate($req, 
			[
				'txtCateName' => 'required|unique:category,category_name'
			], 
			[
				'txtCateName.required'=>'Bạn chưa nhập thể loại',
				'txtCateName.unique'=>'Thể loại đã tồn tại'
			]);
		$cate = new category;
		$cate->category_name=$req->txtCateName;
		$cate->save();
		return redirect('admin/add-category')->with('thongbao','Thêm thành công');
	}

	public function getEditCategory($id)
	{
		$category=category::where('category_id',$id)->get();
		return view('pages.admin.editCategory',['category'=>$category]);
	}
	public function postEditCategory(Request $req)
	{
		$id=$req->id;
		$category=category::where('category_id',$id)->first();
		$this->validate($req, 
			[
				'txtCateName' => 'required|unique:category,category_name'
			], 
			[
				'txtCateName.requried'=>'Bạn chưa nhập thể loại',
				'txtCateName.unique'=>'Thể loại đã tồn tại'
			]);
		$category->category_name=$req->txtCateName;
		$category->save();
		return redirect('admin/edit-category/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getRemoveCategory($id)
	{
		$category=category::find($id);
		$category->delete();
		return redirect('/admin/list-category')->with('thongbao','Xoá thành công');
	}

	public function getListAuthor()
	{
		$list = Author::paginate(12);
		return view('pages.admin.listAuthor',['listAuthor'=>$list]);
	}

	public function getAddAuthor()
	{
		return view('pages.admin.addAuthor');
	}


	public function postAddCustomer(Request $req)
	{
		//echo $req->user_name;
		$customer=new Customer();
		$this->validate($req,
			[
				'user_name'=>'required|unique:customer,user_name',
				'password'=>'required',
				'first_name'=>'required',
				'last_name'=>'required'
			]
			,
			[
				'user_name.required'=>'Chưa nhập user_name',
				'user_name.unique'=>'User Name đã tồn tại',
				'password.required'=>'Chưa nhập password',
				'first_name.required'=>'Chưa nhập first_name',
				'last_name.required'=>'Chưa nhập last_name'
			]);
		$customer->user_name=$req->user_name;
		$customer->password=$req->password;
		$customer->first_name=$req->first_name;
		$customer->last_name=$req->last_name;
		$customer->address=$req->address;
		$customer->city=$req->city;
		$customer->email=$req->email;
		$customer->phone=$req->phone;
		$customer->save();
		return redirect('/admin/add-customer')->with('thongbao','Thêm khách hàng thành công');

	}

	public function postAddAdmin(Request $req)
	{
		//echo $req->user_name;
		$admin=new Admin();
		$this->validate($req,
			[
				'user_name'=>'required|unique:customer,user_name',
				'password'=>'required',
				'first_name'=>'required',
				'last_name'=>'required'
			]
			,
			[
				'user_name.required'=>'Chưa nhập user_name',
				'user_name.unique'=>'User Name đã tồn tại',
				'password.required'=>'Chưa nhập password',
				'first_name.required'=>'Chưa nhập first_name',
				'last_name.required'=>'Chưa nhập last_name'
			]);
		$admin->user_name=$req->user_name;
		$admin->password=$req->password;
		$admin->first_name=$req->first_name;
		$admin->last_name=$req->last_name;
		$admin->address=$req->address;
		$admin->city=$req->city;
		$admin->email=$req->email;
		$admin->phone=$req->phone;
		$admin->permission=$req->permission;
		$admin->save();
		
		return redirect('/admin/add-admin')->with('thongbao','Thêm admin thành công');

	}

	public function postAddAuthor(Request $req)
	{
		$author=new Author;
		$this->validate($req,
			[
				'author_name'=>'required'
			],
			[
				'author_name.required'=>'Bạn chưa nhập tên tác giả'
			]);
		$author->name=$req->author_name;
		if($req->author_describe==null){
			$author->author_describe="";
		}
		else{
			$author->author_describe=$req->author_describe;
		}

		if($req->hasFile('author_picture')){
			$file = $req->author_picture;
			$this->validate($req,
				[
					'author_picture'=>'image|mimes:jpeg,png,jpg,gif,svg'
				],
				[
					'author_picture.image'=>'File bạn vừa chọn không phải ảnh',
					'author_picture.mimes'=>'Chỉ hỗ trợ ảnh đuôi:jpeg,png,jpg,gif,svg',
				]);
			$filename=time().'-'.$file->getClientOriginalName();
			$file->move('images',$filename);  
			$author->author_image='images/'.$filename; 
		}
		else{
			$author->author_image="";
		}
		$author->save();

		return redirect('/admin/add-author')->with('thongbao','Thêm tác giả thành công');
	}

	public function postEditCustomer(Request $req)
	{
		$customer=Customer::find($req->user_id);

		$this->validate($req,
			[
				'password'=>'required',
				'first_name'=>'required',
				'last_name'=>'required'
			]
			,
			[
				'password.required'=>'Chưa nhập password',
				'first_name.required'=>'Chưa nhập first_name',
				'last_name.required'=>'Chưa nhập last_name'
			]);
		$customer->password=$req->password;
		$customer->first_name=$req->first_name;
		$customer->last_name=$req->last_name;
		if ($req->address==null) {
			$customer->address='';
		} else {
			$customer->address=$req->address;
		}

		if ($req->city==null) {
			$customer->city='';
		} else {
			$customer->city=$req->city;
		}

		if ($req->email==null) {
			$customer->email='';
		} else {
			$customer->email=$req->email;
		}
		
		if ($req->phone==null) {
			$customer->phone='';
		} else {
			$customer->phone=$req->phone;
		}
		$customer->save();
		
		return redirect('/admin/edit-customer/'.$req->user_id)->with('thongbao','Sửa thông tin khách hàng thành công');
	}

	public function postEditAdmin(Request $req)
	{
		$admin=Admin::find($req->admin_id);

		$this->validate($req,
			[
				'password'=>'required',
				'first_name'=>'required',
				'last_name'=>'required'
			]
			,
			[
				'password.required'=>'Chưa nhập password',
				'first_name.required'=>'Chưa nhập first_name',
				'last_name.required'=>'Chưa nhập last_name'
			]);
		$admin->password=$req->password;
		$admin->first_name=$req->first_name;
		$admin->last_name=$req->last_name;
		if ($req->address==null) {
			$admin->address='';
		} else {
			$admin->address=$req->address;
		}

		if ($req->city==null) {
			$admin->city='';
		} else {
			$admin->city=$req->city;
		}

		if ($req->email==null) {
			$admin->email='';
		} else {
			$admin->email=$req->email;
		}
		
		if ($req->phone==null) {
			$admin->phone='';
		} else {
			$admin->phone=$req->phone;
		}
		$admin->save();
		
		return redirect('/admin/edit-admin/'.$req->admin_id)->with('thongbao','Sửa thông tin admin thành công');
	}

	public function getEditAuthor($id)
	{
		$author=Author::where('author_id',$id)->first();
		return view('pages.admin.editAuthor',['author'=>$author]);
	}

	public function getEditCustomer($id)
	{
		$customer=Customer::where('user_id',$id)->first();
		return view('pages.admin.editCustomer',['customer'=>$customer]);
	}

	public function getEditAdmin($id)
	{
		$admin=Admin::where('admin_id',$id)->first();
		return view('pages.admin.editAdmin',['admin'=>$admin]);
	}

	public function postEditAuthor(Request $req)
	{
		$author=Author::find($req->author_id);
		$author->name=$req->author_name;
		if($req->author_describe!=null){
			$author->author_describe=$req->author_describe;
		}
		else{
			$author->author_describe="";
		}

		if($req->hasFile('author_image')){
			$file = $req->author_image;
			$this->validate($req,
				[
					'author_image'=>'image|mimes:jpeg,png,jpg,gif,svg'
				],
				[
					'author_image.image'=>'File bạn vừa chọn không phải ảnh',
					'author_image.mimes'=>'Chỉ hỗ trợ ảnh đuôi:jpeg,png,jpg,gif,svg',
				]);
			$filename=time().'-'.$file->getClientOriginalName();
			$file->move('images',$filename);  
			$author->author_image='images/'.$filename; 
		}
		$author->save();
		return redirect('/admin/edit-author/'.$req->author_id)->with('thongbao','Sửa tác giả thành công');
	}

	public function getRemoveAuthor($id)
	{
		$author=Author::find($id);
		$author->delete();
		return redirect('/admin/list-author')->with('thongbao','Xoá thành công');
	}

	public function getRemoveCustomer($id)
	{
		$customer=Customer::find($id);
		$customer->delete();
		return redirect('/admin/list-customer')->with('thongbao','Xoá thành công');
	}

	public function getRemoveAdmin($id)
	{
		$admin=Admin::find($id);
		$admin->delete();
		return redirect('/admin/list-admin')->with('thongbao','Xoá thành công');
	}

	public function getListBook()
	{
		$listBook=Book::paginate(12);
		return view('pages.admin.listBook',['listBook'=>$listBook]);
	}

	public function getAddBook()
	{
		$listCategory=category::all();
		$listAuthor=Author::all();
		return view('pages.admin.addBook',['listCategory'=>$listCategory,'listAuthor'=>$listAuthor]);
	}

	public function postAddBook(Request $req)
	{
		$this->validate($req,
			[
				'book_name'=>'required',
				'publish_year'=>'min:0',
				'price'=>'min:0',
				'quantity'=>'min:0'
			]
			,
			[
				'book_name.required'=>'Bạn chưa nhập tên sách',
				'publish_year.min'=>'Năm xuất bản không thể âm',
				'price.min'=>'Giá sách không thể âm',
				'quantity.min'=>'Số lượng không thể âm'
			]);
		$book=new Book;
		$book->category_id=$req->category;
		$book->author_id=$req->author;
		$book->book_name=$req->book_name;
		if($req->ISBN==null){
			$book->ISBN="";
		}
		else{
			$book->ISBN=$req->ISBN;
		}
		if($req->language==null){
			$book->language="";
		}
		else{
			$book->language=$req->language;
		}
		if($req->publish_year==null){
			$book->publish_year=0;
		}
		else{
			$book->publish_year=$req->publish_year;
		}

		if($req->publisher==null){
			$book->publisher="";
		}
		else{
			$book->publisher=$req->publisher;
		}
		if($req->abstract==null){
			$book->abstract="";
		}else{
			$book->abstract=$req->abstract;
		}
		if($req->price==null){
			$book->price=0;
		}else{
			$book->price=$req->price;
		}
		if($req->rating==null){
			$book->rating=0;
		}else{
			$book->rating=$req->rating;
		}
		if($req->quantity==null){
			$book->quantity=0;
		}else{
			$book->quantity=$req->quantity;
		}

		if($req->hasFile('picture')){
			$file = $req->picture;
			$this->validate($req,
				[
					'picture'=>'image|mimes:jpeg,png,jpg,gif,svg'
				],
				[
					'picture.image'=>'File bạn vừa chọn không phải ảnh',
					'picture.mimes'=>'Chỉ hỗ trợ ảnh đuôi:jpeg,png,jpg,gif,svg',
				]);
			$filename=time().'-'.$file->getClientOriginalName();
			$file->move('images',$filename);  
			$book->picture='images/'.$filename; 
		}
		else{
			$book->picture="";
		}
		$book->save();
		return redirect('/admin/add-book')->with('thongbao','Thêm sách thành công');
	}

	public function getDeleteReview($book_id,$user_id,$review_date)
	{
		DB::table('book_review')->where('book_id',$book_id)
		->where('user_id',$user_id)
		->where('review_date',$review_date)
		->delete();
		return redirect('/admin/edit-book/'.$book_id)->with('thongbaoxoa','Xóa bình luận thành công');
	}

	public function getEditBook($id)
	{
		$book=Book::find($id);
		$listAuthor=Author::all();
		$listCategory=category::all();
		$listReview=DB::table('book_review')
		->join('customer','customer.user_id','=','book_review.user_id')
		->where('book_id','=',$id)
		->orderBy('review_date','DESC')
		->get();

		return view('pages.admin.editBook',['book'=>$book,'listAuthor'=>$listAuthor,'listCategory'=>$listCategory,'listReview'=>$listReview]);
	}

	public function postEditBook(Request $req)
	{
		$this->validate($req,
			[
				'book_name'=>'required',
				'publish_year'=>'min:0',
				'price'=>'min:0',
				'quantity'=>'min:0'
			]
			,
			[
				'book_name.required'=>'Bạn chưa nhập tên sách',
				'publish_year.min'=>'Năm xuất bản không thể âm',
				'price.min'=>'Giá sách không thể âm',
				'quantity.min'=>'Số lượng không thể âm'
			]);
		$book=Book::find($req->book_id);
		$book->category_id=$req->category;
		$book->author_id=$req->author;
		$book->book_name=$req->book_name;
		if($req->ISBN==null){
			$book->ISBN="";
		}
		else{
			$book->ISBN=$req->ISBN;
		}
		if($req->language==null){
			$book->language="";
		}
		else{
			$book->language=$req->language;
		}
		if($req->publish_year==null){
			$book->publish_year=0;
		}
		else{
			$book->publish_year=$req->publish_year;
		}
		if($req->publisher==null){
			$book->publisher="";
		}
		else{
			$book->publisher=$req->publisher;
		}
		if($req->abstract==null){
			$book->abstract="";
		}else{
			$book->abstract=$req->abstract;
		}
		if($req->price==null){
			$book->price=0;
		}else{
			$book->price=$req->price;
		}
		if($req->rating==null){
			$book->rating=0;
		}else{
			$book->rating=$req->rating;
		}
		if($req->quantity==null){
			$book->quantity=0;
		}else{
			$book->quantity=$req->quantity;
		}

		if($req->hasFile('picture')){
			$file = $req->picture;
			$this->validate($req,
				[
					'picture'=>'image|mimes:jpeg,png,jpg,gif,svg'
				],
				[
					'picture.image'=>'File bạn vừa chọn không phải ảnh',
					'picture.mimes'=>'Chỉ hỗ trợ ảnh đuôi:jpeg,png,jpg,gif,svg',
				]);
			$filename=time().'-'.$file->getClientOriginalName();
			$file->move('images',$filename);  
			$book->picture='images/'.$filename; 
		}
		$book->save();
		return redirect('/admin/edit-book/'.$book->book_id)->with('thongbao','Sửa sách thành công');
	}

	public function getRemoveBook($id)
	{
		$book=Book::find($id);
		$book->delete();
		return redirect('/admin/list-book')->with('thongbao','Xoá thành công');
	}
	public function getNext3Book($book_id)
	{
		// $listBook=Book::where('category_id','1')->skip($book_id)->take(3)->get();
		$listBook=DB::table('ordered_book')
		->join('book','book.book_id','=','ordered_book.book_id')
		->selectRaw('ordered_book.book_id,book.*, SUM(ordered_book.quantity) as total')
		->groupBy('ordered_book.book_id','book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity')
		->orderByRaw('SUM(ordered_book.quantity) DESC')
		->skip(($book_id +1)*3 )
		->take(3)
		->get();
		$arr=array('listBook'=>$listBook,'trangSachBanChay'=>$book_id+1);
		return $arr;
	}

	public function getNextTabVanHoc($book_id)
	{
		$listBook=Book::where('category_id','1')->skip(($book_id+1)*4)->take(4)->get();
		$arr=array('listBook'=>$listBook,'trangSachVanHoc'=>$book_id+1);
		return $arr;
	}

	public function getPrevTabVanHoc($book_id)
	{
		$listBook=Book::where('category_id','1')->skip(($book_id-1)*4)->take(4)->get();
		$arr=array('listBook'=>$listBook,'trangSachVanHoc'=>$book_id-1);
		return $arr;
	}

	public function getPrev3Book($book_id)
	{
		// $listBook=Book::where('category_id','1')->skip($book_id)->take(3)->get();
		$listBook=DB::table('ordered_book')
		->join('book','book.book_id','=','ordered_book.book_id')
		->selectRaw('ordered_book.book_id,book.*, SUM(ordered_book.quantity) as total')
		->groupBy('ordered_book.book_id','book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity')
		->orderByRaw('SUM(ordered_book.quantity) DESC')
		->skip(($book_id-1)*3)
		->take(3)
		->get();
		$arr=array('listBook'=>$listBook,'trangSachBanChay'=>$book_id-1);
		return $arr;

	}

	public function getSachBanChay()
	{
		$listBook=DB::table('ordered_book')
		->join('book','book.book_id','=','ordered_book.book_id')
		->selectRaw('ordered_book.book_id,book.*, SUM(ordered_book.quantity) as total')
		->groupBy('ordered_book.book_id','book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity')
		->orderByRaw('SUM(ordered_book.quantity) DESC')
		->paginate(12);
		return view('pages.result_search',['title'=>'SÁCH BÁN CHẠY','listBook'=>$listBook]);
	}

	public function getSachDanhGiaCao()
	{
		$listBook=DB::table('book_review')
		->join('book','book.book_id','=','book_review.book_id')
		->selectRaw('book_review.book_id,book.*,SUM(book_review.rating)*5/(COUNT(book_review.rating)*5) as 
			percent')
		->groupBy('book_review.book_id','book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity')
		->orderByRaw('SUM(book_review.rating)*5/(COUNT(book_review.rating)*5) DESC')
		->paginate(12);
		return view('pages.result_search',['title'=>'SÁCH ĐƯỢC YÊU THÍCH','listBook'=>$listBook]);
	}

	public function getBXHSachRatingCao()
	{
		$listBook=DB::table('book_review')
		->join('book','book.book_id','=','book_review.book_id')
		->join('author','author.author_id','=','book.author_id')
		->join('category','category.category_id','=','book.category_id')
		->selectRaw('book_review.book_id,book.*,author.name,category.category_name,SUM(book_review.rating)*5/(COUNT(book_review.rating)*5) as 
			percent')
		->groupBy('book_review.book_id','book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity','author.name','category.category_name')
		->orderByRaw('SUM(book_review.rating)*5/(COUNT(book_review.rating)*5) DESC')
		->paginate(12);
		return view('pages.admin.statistical.bxh_sach_rating_cao',['title'=>'SÁCH ĐƯỢC YÊU THÍCH','listBook'=>$listBook]);
	}

	public function getSachBinhLuanNhieu()
	{
		$listBook=DB::table('book_review')->join('book','book.book_id','=','book_review.book_id')
		->selectRaw('book.*,COUNT(book_review.reviews) as quantity')
		->groupBy('book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity')
		->orderByRaw('COUNT(book_review.reviews) DESC')
		->paginate(12);
		return view('pages.result_search',['title'=>'SÁCH XEM NHIỀU','listBook'=>$listBook]);
	}

	public function tinhDoanhThuTrongKhoangThoiGian(Request $req)
	{
		// echo $req->time1;
		// echo $req->time2;
		$result=DB::table('order_details')->selectRaw('DATE(order_details.date_created) as date_created ,SUM(order_details.total_money) as total_money')
		->where('order_details.status','=','1')
		->whereRaw('DATE(order_details.date_created) BETWEEN "'.$req->time1.'" AND "'.$req->time2.'"')
		->groupBy(DB::raw('DATE(order_details.date_created)'))->get();
		$str='';
		$total=0;
		if(count($result)>0){
			foreach ($result as $value) {
				$str.='<tr>';
				$str.='<td>';
				$str.=$value->date_created;
				$str.='</td>';
				$str.='<td>';
				$str.=number_format($value->total_money, 0, ',', '.').' đ';
				$str.='</td>';
				$str.='</tr>';
				$total+=$value->total_money;
			}
		}
		$kq=array('str'=>$str,'total'=>$total);
		return $kq;
	}

	public function postDatHang(Request $req)
	{
		
		$customer=Session::get('UserLogin');
		$full_name=$customer->first_name.' '.$customer->last_name;
		if(session('full_name')){
			$full_name=Session::get('full_name');
		}
		$phone_number=$customer->phone_number;
		if(session('phone_number')){
			$phone_number=Session::get('phone_number');
		}
		$city=$customer->city;
		if(session('city')){
			$city=Session::get('city');
		}
		$address=$customer->address;
		if(session('address')){
			$address=Session::get('address');
		}

		$cart=Session::get('cart');

		if ($req->is_pay_by_money=='false') {

			DB::table('credit_card')->insert(
				[
					'credit_card_number'=>$req->card_number,
					'credit_cart_name'=>$req->bill_to_name,
					'expire_date'=>$req->card_expiry_date,
					'card_type'=>$req->card_type,
					'user_id'=>(Session::get('UserLogin'))->user_id,
				]
			);

			DB::table('order_details')->insert(
				[
					'user_id'=>(Session::get('UserLogin'))->user_id,
					'receiver_name'=>$full_name,
					'address'=>$address,
					'city'=>$city,
					'date_created'=>date(NOW()),
					'method_payment'=>1,
					'status'=>0,
					'total_money'=>$cart->totalPrice
				]
			);
		} else {
			DB::table('order_details')->insert(
				[
					'user_id'=>(Session::get('UserLogin'))->user_id,
					'receiver_name'=>$full_name,
					'address'=>$address,
					'city'=>$city,
					'date_created'=>date(NOW()),
					'method_payment'=>0,
					'status'=>0,
					'total_money'=>$cart->totalPrice
				]
			);

		}

		$listBook=$cart->items;

		$last_order_details=DB::table('order_details')->select('order_id')->orderBy('order_id','DESC')
		->first();

		foreach ($listBook as $book) {
			DB::table('ordered_book')->insert(
				[
					'order_id'=>$last_order_details->order_id,
					'book_id'=>$book['item']->book_id,
					'quantity'=>$book['qty'],
					'price'=>$book['price'],
				]
			);
		}

		$this->getUnsetInfo();
		Session::put('cart', null);

		Session::flash('dat_hang_thanh_cong','Bạn đã yêu cầu đặt hàng. Đơn hàng của bạn đang được duyệt.Xem chi tiết trong thông tin tài khoản.Cám ơn bạn đã đặt hàng.');
		return 'Done';
		
	}

	public function get_check_exist_credit_card($credit_card_number)
	{
		$credit_card=DB::table('credit_card')->where('credit_card_number',$credit_card_number)->get();
		if(count($credit_card)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
}
