<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\category;
use App\Author;
use App\Admin;
use App\Customer;


class ExportFile extends Controller
{

	public function getExport($name,$a,$list,$is_obj)
	{
		$arrCharacters=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

		$spreadsheet=new Spreadsheet;
		$sheet=$spreadsheet->getActiveSheet();
		// $a mảng danh sách các cột
		// $list là mảng các dòng cần ghi
		for ($i = 0; $i < count($a) ; $i++) {
			$sheet->setCellValue($arrCharacters[$i].'1',$a[$i]);
		}
		$row=2;
		if ($is_obj) {
			foreach ($list as $value) {
				$value=(array)$value;
				for ($i = 0; $i < count($a) ; $i++) {
					$sheet->setCellValue($arrCharacters[$i].$row,$value[$a[$i]]);
				}
				$row++;
			}
		}else{
			foreach ($list as $value) {
				for ($i = 0; $i < count($a) ; $i++) {
					$sheet->setCellValue($arrCharacters[$i].$row,$value[$a[$i]]);
				}
				$row++;
			}
		}
		$writer=new Xlsx($spreadsheet);
		$writer->save('export\\'.$name.' '.date('d-m-Y H-i-s',time()).'.xlsx');
		echo 'Done';
	}

	public function getExportDoanhThu($name,$a,$list,$is_obj)
	{
		$arrCharacters=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

		$spreadsheet=new Spreadsheet;
		$sheet=$spreadsheet->getActiveSheet();
		// $a mảng danh sách các cột
		// $list là mảng các dòng cần ghi
		for ($i = 0; $i < count($a) ; $i++) {
			$sheet->setCellValue($arrCharacters[$i].'1',$a[$i]);
		}
		$row=2;
		$total=0;
		if ($is_obj) {
			foreach ($list as $value) {
				$value=(array)$value;
				for ($i = 0; $i < count($a) ; $i++) {
					$sheet->setCellValue($arrCharacters[$i].$row,$value[$a[$i]]);
				}
				$total+=$value['total_money'];
				$row++;
			}
			$sheet->setCellValue('A'.$row,'Tổng:');
			$sheet->setCellValue($arrCharacters[count($a)-1].$row,$total.' VND');
		}else{
			foreach ($list as $value) {
				for ($i = 0; $i < count($a) ; $i++) {
					$sheet->setCellValue($arrCharacters[$i].$row,$value[$a[$i]]);
				}
				$row++;
			}
		}
		
		$writer=new Xlsx($spreadsheet);
		$writer->save('export\\'.$name.' '.date('d-m-Y H-i-s',time()).'.xlsx');
		echo $total;
		echo 'Done';
	}

	public function getExportListBook()
	{
		$listBook=Book::all()->toArray();
		$this->getExport('listBook',array('book_id','category_id','author_id','book_name','ISBN','language','publish_year','publisher','abstract','price','picture','rating','quantity'),$listBook,false);
		return 1;
	}

	public function getExportListCategory()
	{
		$list=category::all();
		$this->getExport('listCategory',array('category_id','category_name'),$list,false);
		return 1;
	}

	public function getExportListAuthor()
	{
		$list=Author::all();
		$this->getExport('listAuthor',array('author_id','name','author_image','author_describe'),$list,false);
		return 1;
	}

	public function getExportListCustomer()
	{
		$list=Customer::all();
		$this->getExport('listCustomer',array('user_id','user_name','password','first_name','last_name','address','city','email','phone'),$list,false);
		return 1;
	}

	public function getExportListAdmin()
	{
		$list=Admin::all();
		$this->getExport('listAdmin',array('admin_id','user_name','password','first_name','last_name','address','city','email','phone','permission'),$list,false);
		return 1;
	}

	public function getExportListOrderDetail()
	{
		$list=DB::table('order_details')->get()->toArray();
		$this->getExport('listOrderDetails',array('order_id','user_id','receiver_name','address','city','date_created','method_payment','status','date_received','total_money'),$list,true);
		return 1;
	}

	public function getExportListOrderBookByOrderID($id)
	{
		$list=DB::table('ordered_book')->join('book','ordered_book.book_id','=','book.book_id')
		->where('order_id',$id)
		->selectRaw('ordered_book.*,book.book_name,book.category_id,book.author_id,book.ISBN,book.language,book.publish_year,book.publisher,book.picture,book.rating')
		->get()->toArray();
		$this->getExport('listOrderDetails-'.$id,array('order_id','book_id','book_name','category_id','author_id','ISBN','language','publish_year','publisher','picture','rating','price','quantity'),$list,true);
		return 1;
	}

	public function getExportThongKeTacGia()
	{
		$list=DB::table('author')->join('book','book.author_id','=','author.author_id')
		->selectRaw('author.author_id,author.name,COUNT(book.book_id) as quantity')
		->groupBy('author.author_id','author.name')
		->orderBy('author.name','ASC')
		->get();
		$this->getExport('thongkesachtheotacgia',array('author_id','name','quantity'),$list,true);
		return 1;
	}

	public function getExportThongKeTheLoai()
	{
		$list=DB::table('category')->join('book','book.category_id','=','category.category_id')
		->selectRaw('category.category_id,category.category_name,COUNT(book.book_id) as quantity')
		->groupBy('category.category_id','category.category_name')
		->get();
		$this->getExport('thongkesachtheotheloai',array('category_id','category_name','quantity'),$list,true);
		return 1;
	}

	public function getExportThongKeNhaXuatBan()
	{
		$list=Book::selectRaw('book.publisher,COUNT(book.book_id) as quantity')
		->groupBy('book.publisher')
		->orderBy('book.publisher','ASC')
		->get();
		$this->getExport('thongkesachtheonhaxuatban',array('publisher','quantity'),$list,false);
		return 1;
		
	}

	public function getExportThongKeNgonNgu()
	{
		$list=Book::selectRaw('book.language,COUNT(book.book_id) as quantity')
		->groupBy('book.language')->orderBy('book.language','ASC')
		->get();
		$this->getExport('thongkesachtheongonngu',array('language','quantity'),$list,false);
		return 1;
		
	}

	public function getExportThongKeMuaHangCuaKhachHang()
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
		$this->getExport('thongkedonhangtheokhachhang',array('user_id','user_name','orderquantity','bookquantity'),$list,true);
		return 1;
		
	}

	public function postExportThongKeDoanhThuNgayThang(Request $req)
	{
		$list=DB::table('order_details')->selectRaw('DATE(order_details.date_created) as date_created ,SUM(order_details.total_money) as total_money')
		->where('order_details.status','!=','-1')
		->whereRaw('DATE(order_details.date_created) BETWEEN "'.$req->time1.'" AND "'.$req->time2.'"')
		->groupBy(DB::raw('DATE(order_details.date_created)'))->get();
		$this->getExportDoanhThu('thongkedoanhthungaythang',array('date_created','total_money'),$list,true);
		return 1;
	}

	public function postExportThongKeDoanhThuNam(Request $req)
	{
		$list=DB::table('order_details')
		->whereRaw('DATE_FORMAT(order_details.date_created,"%Y")='.$req->year)
		->selectRaw('DATE_FORMAT(order_details.date_created,"%Y-%m") as month,SUM(order_details.total_money) AS total_money')
		->groupBy(DB::raw('DATE_FORMAT(order_details.date_created,"%Y-%m")'))
		->get();
		$this->getExportDoanhThu('thongkedoanhthunam',array('month','total_money'),$list,true);
		return 1;
	}

	public function getThongKeSachBanChay()
	{
		$list=Book::join('category','category.category_id','=','book.category_id')
		->join('author','author.author_id','=','book.author_id')
		->join('ordered_book','ordered_book.book_id','=','book.book_id')
		->selectRaw('book.book_id,book.book_name,book.picture,book.language,book.publish_year,book.publisher,
			category.category_name,author.name,SUM(ordered_book.quantity) AS quantitysell')
		->groupBy('book.book_id','book.book_name','book.picture','book.language','book.publish_year','book.publisher','category.category_name','author.name')
		->orderByRaw('SUM(ordered_book.quantity) DESC')
		->get();
		$this->getExport('BXH Sach ',array('book_id','book_name','picture','language','publish_year','publisher','category_name','name','quantitysell'),$list,false);
		return 1;
	}

	public function getExportBXHSachRatingCao()
	{
		$list=DB::table('book_review')
		->join('book','book.book_id','=','book_review.book_id')
		->join('author','author.author_id','=','book.author_id')
		->join('category','category.category_id','=','book.category_id')
		->selectRaw('book_review.book_id,book.*,author.name,category.category_name,SUM(book_review.rating)*5/(COUNT(book_review.rating)*5) as 
			percent')
		->groupBy('book_review.book_id','book.book_id','book.category_id','book.author_id','book.book_name','book.ISBN','book.language','book.publish_year','book.publisher','book.abstract','book.price','book.picture','book.rating','book.quantity','author.name','category.category_name')
		->orderByRaw('SUM(book_review.rating)*5/(COUNT(book_review.rating)*5) DESC')
		->get();
		$this->getExport('BXH Sach Rating ',array('book_id','book_name','picture','language','publish_year','publisher','category_name','name','percent'),$list,true);
		return 1;
	}
}
