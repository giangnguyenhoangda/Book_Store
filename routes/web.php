<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// START EXPORT FILE EXCEL =======================================================================

Route::get('export/listbook','ExportFile@getExportListBook')->name('getExportListBook');

Route::get('export/listcustomer','ExportFile@getExportListCustomer')->name('getExportListCustomer');

Route::get('export/listadmin','ExportFile@getExportListAdmin')->name('getExportListAdmin');

Route::get('export/listcategory','ExportFile@getExportListCategory')->name('getExportListCategory');

Route::get('export/listauthor','ExportFile@getExportListAuthor')->name('getExportListAuthor');

Route::get('export/list-order-details','ExportFile@getExportListOrderDetail')->name('getExportListOrderDetail');

Route::get('export/list-order-book/{id}','ExportFile@getExportListOrderBookByOrderID')->name('getExportListOrderBookByOrderID');

Route::get('export/thong-ke/tacgia','ExportFile@getExportThongKeTacGia')->name('getExportThongKeTacGia');

Route::get('export/thong-ke/theloai','ExportFile@getExportThongKeTheLoai')->name('getExportThongKeTheLoai');

Route::get('export/thong-ke/nhaxuatban','ExportFile@getExportThongKeNhaXuatBan')->name('getExportThongKeNhaXuatBan');

Route::get('export/thong-ke/ngonngu','ExportFile@getExportThongKeNgonNgu')->name('getExportThongKeNgonNgu');

Route::get('export/thong-ke/donhangtheokhachhang','ExportFile@getExportThongKeMuaHangCuaKhachHang')->name('getExportThongKeMuaHangCuaKhachHang');

Route::post('export/thong-ke/doanhthuthangngay','ExportFile@postExportThongKeDoanhThuNgayThang')->name('postExportThongKeDoanhThuNgayThang');

Route::post('export/thong-ke/doanhthunam','ExportFile@postExportThongKeDoanhThuNam')->name('postExportThongKeDoanhThuNam');

Route::get('export/thong-ke/bxhsach','ExportFile@getThongKeSachBanChay')->name('getThongKeSachBanChay');

Route::get('export/thong-ke/bxhsachrating','ExportFile@getExportBXHSachRatingCao')->name('getExportBXHSachRatingCao');

// END EXPORT FILE EXCEL =========================================================================

Route::get('sach-ban-chay','WebManager@getSachBanChay')->name('getSachBanChay');

Route::get('bxh-sach-rating','WebManager@getBXHSachRatingCao')->name('getBXHSachRatingCao');

Route::get('sach-danh-gia-cao','WebManager@getSachDanhGiaCao')->name('getSachDanhGiaCao');

Route::get('sach-xem-nhieu','WebManager@getSachBinhLuanNhieu')->name('getSachXemNhieu');

Route::get('admin/delete/review/{book_id}/{user_id}/{review_date}','WebManager@getDeleteReview')->name('getDeleteReview')->middleware('adminlogin');

Route::post('statistical/doanhthunam','WebManager@postTinhDoanhThuNam')->name('postTinhDoanhThuNam')->middleware('adminlogin');

Route::get('statistical/category','WebManager@getStatisticalCategory')->name('getStatisticalCategory')->middleware('adminlogin');

Route::get('statistical/doanhthu','WebManager@getStatisticalDoanhThu')->name('getStatisticalDoanhThu')->middleware('adminlogin');

Route::get('statistical/doanhthuthang','WebManager@getStatisticalDoanhThuThang')->name('getStatisticalDoanhThuThang')->middleware('adminlogin');

Route::get('statistical/total-customer-buy','WebManager@getStatisticalTotalCustomerBuy')->name('getStatisticalTotalCustomerBuy')->middleware('adminlogin');

Route::get('statistical/sellingbook','WebManager@getStatisticalSellingBook')->name('getStatisticalSellingBook')->middleware('adminlogin');

Route::get('statistical/author','WebManager@getStatisticalAuthor')->name('getStatisticalAuthor')->middleware('adminlogin');

Route::get('statistical/publisher','WebManager@getStatisticalPublisher')->name('getStatisticalPublisher')->middleware('adminlogin');

Route::get('statistical/language','WebManager@getStatisticalLanguage')->name('getStatisticalLanguage')->middleware('adminlogin');

Route::get('coming-soon','WebManager@getComingSoon')->name('getComingSoon');

Route::get('look-screen/{id}','WebManager@getLookScreen')->name('getLookScreen');

Route::post('passwordedit','WebManager@postPasswordEdit')->name('postPasswordEdit')->middleware('adminlogin');

Route::get('profile-edit/{id}','WebManager@getContentProEdit')->name('getContentProEdit')->middleware('adminlogin');

Route::post('profile-edit','WebManager@postProfileEdit')->name('postProfileEdit')->middleware('adminlogin');

Route::get('profile/{id}','WebManager@getProfile')->name('getProfile')->middleware('adminlogin');

Route::get('list-order-detail','WebManager@getListOrderDetail')->name('getListOrderDetail')->middleware('adminlogin');

Route::get('delete-order/{id}','WebManager@getDeleteOrder')->name('getDeleteOrder')->middleware('adminlogin');

Route::get('edit-order-detail/{id}','WebManager@getEditOrderDetail')->name('getEditOrderDetail')->middleware('adminlogin');

Route::post('edit-order-detail','WebManager@postEditOrderDetail')->name('postEditOrderDetail')->middleware('adminlogin');

Route::get('admin-login','WebManager@getAdminLogin')->name('getAdminLogin');

Route::get('admin-logout','WebManager@getAdminLogout')->name('getAdminLogout');

Route::post('admin-login','WebManager@postAdminLogin')->name('postAdminLogin');

Route::post('admin-login-from-lockscreen','WebManager@postAdminLoginFromLockScreen')->name('postAdminLoginFromLockScreen');

Route::get('check-username/{id}','WebManager@getCheckUserName')->name('getCheckUserName');

Route::post('send_review','WebManager@postSendReview')->name('postSendReview');

Route::get('getCategoryAndCount', 'WebManager@getCategoryAndCount')->name('getCategoryAndCount');

Route::get('getBookByAuthor/{id}','WebManager@getBookByAuthor')->name('getBookByAuthor');

Route::get('/home', 'ViewPages@homepage')->name('home');

Route::get('/', 'ViewPages@homepage')->name('home');

Route::post('check-login','WebManager@postCheckLogin')->name('postCheckLogin');

Route::post('search','WebManager@postSearchBook')->name('postSearchBook');
Route::post('search-book','WebManager@postSearchBook_1')->name('postSearchBook_1');

Route::get('login', 'WebManager@getLogin')->name('getLogin');

Route::get('logout', 'WebManager@getLogout')->name('getLogout');

Route::get('/register', function () {
	return view('pages.register');
})->name('register');

Route::get('/user_information',function(){
	return view('pages.user_information');
})->name('user_information');

Route::post('/user_information/updateinfo','ViewPages@postUpdateInformation')->name('postUpdateInformation');

Route::post('/user_information/changepassword','ViewPages@postChangePassword')->name('postChangePassword');

Route::get('/order_history','ViewPages@listOrder')-> name('order_history');

Route::get('/order_history/{id}','ViewPages@getOrderDetail')->name('getOrderDetail');

Route::post('/home','RegisterController@addCustomer')->name('addCustomer');

Route::get('/result-search', 'ViewPages@getResultSearch')->name('result-search');
// ============================ Cart ===================
Route::get('/cart', ['as'=>'cart','uses'=>'ViewPages@getCart']);

Route::get('add-to-cart/{id}', [
	'as' => 'book.addToCart',
	'uses' => 'ViewPages@getAddToCart'
]);

Route::get('remove-all-cart', [
	'as'=>'removeAllCart',
	'uses'=>'ViewPages@removeAllCart'
]);

Route::get('updateCart', [
	'as'=>'updateCart',
	'uses'=>'ViewPages@updateCart'
]);


// ===================== end cart======================

Route::get('/book_detail/{id}','WebManager@getBookDetail')->name('getBookDetail');

Route::get('404','WebManager@get404'
)->name('get404');

Route::get('/home', 'ViewPages@homepage')->name('home');


Route::get('/admin','WebManager@getAdmin')->name('getAdmin')->middleware('adminlogin');

Route::get('/admin/list-customer','WebManager@getListCustomer')->name('getListCustomer')->middleware('adminlogin');

Route::get('/admin/list-admin','WebManager@getListAdmin')->name('getListAdmin')->middleware('adminlogin');

Route::post('/admin/add-customer','WebManager@postAddCustomer')->name('postAddCustomer')->middleware('adminlogin');

Route::post('/admin/add-admin','WebManager@postAddAdmin')->name('postAddAdmin')->middleware('adminlogin');

Route::get('/admin/add-customer','WebManager@getAddCustomer')->name('getAddCustomer')->middleware('adminlogin');

Route::get('/admin/add-admin','WebManager@getAddAdmin')->name('getAddAdmin')->middleware('adminlogin');

Route::get('/admin/list-category','WebManager@getListCategory')->name('getListCategory')->middleware('adminlogin');

Route::get('/admin/add-category','WebManager@getAddCategory')->name('getAddCategory')->middleware('adminlogin');

Route::get('admin/list-author','WebManager@getListAuthor')->name('getListAuthor')->middleware('adminlogin');

Route::get('admin/add-author','WebManager@getAddAuthor')->name('getAddAuthor')->middleware('adminlogin');

Route::get('/admin/list-book','WebManager@getListBook')->name('getListBook')->middleware('adminlogin');

Route::get('/admin/add-book','WebManager@getAddBook')->name('getAddBook')->middleware('adminlogin');

Route::get('/admin/edit-category/{id}','WebManager@getEditCategory')->name('getEditCategory')->middleware('adminlogin');

Route::post('/admin/add-category','WebManager@postAddCategory')->name('postAddCategory')->middleware('adminlogin');

Route::post('/admin/edit-category','WebManager@postEditCategory')->name('postEditCategory')->middleware('adminlogin');

Route::get('/admin/remove-category/{id}','WebManager@getRemoveCategory')->name('getRemoveCategory')->middleware('adminlogin');

Route::post('admin/add-author','WebManager@postAddAuthor')->name('postAddAuthor')->middleware('adminlogin');

Route::get('admin/edit-author/{id}','WebManager@getEditAuthor')->name('getEditAuthor')->middleware('adminlogin');

Route::get('admin/edit-customer/{id}','WebManager@getEditCustomer')->name('getEditCustomer')->middleware('adminlogin');

Route::get('admin/edit-admin/{id}','WebManager@getEditAdmin')->name('getEditAdmin')->middleware('adminlogin');

Route::post('admin/edit-author','WebManager@postEditAuthor')->name('postEditAuthor')->middleware('adminlogin');

Route::post('admin/edit-customer','WebManager@postEditCustomer')->name('postEditCustomer')->middleware('adminlogin');

Route::post('admin/edit-admin','WebManager@postEditAdmin')->name('postEditAdmin')->middleware('adminlogin');

Route::get('/admin/remove-author/{id}','WebManager@getRemoveAuthor')->name('getRemoveAuthor')->middleware('adminlogin');

Route::get('/admin/remove-customer/{id}','WebManager@getRemoveCustomer')->name('getRemoveCustomer')->middleware('adminlogin');

Route::get('/admin/remove-admin/{id}','WebManager@getRemoveAdmin')->name('getRemoveAdmin')->middleware('adminlogin');

Route::post('/admin/add-book','WebManager@postAddBook')->name('postAddBook')->middleware('adminlogin');

Route::get('/admin/edit-book/{id}','WebManager@getEditBook')->name('getEditBook')->middleware('adminlogin');

Route::post('/admin/edit-book','WebManager@postEditBook')->name('postEditBook')->middleware('adminlogin');

Route::get('/admin/remove-book/{id}','WebManager@getRemoveBook')->name('getRemoveBook')->middleware('adminlogin');


Route::get('loai-san-pham/{id}','ViewPages@getLoaiSanPham')->name('loaisanpham');

Route::get('/book_detail/{id}','WebManager@getBookDetail')->name('getBookDetail');


Route::get('admin/next3book/{id}','WebManager@getNext3Book')->name('getNext3Book');

Route::get('admin/nexttabvanhoc/{id}','WebManager@getNextTabVanHoc')->name('getNextTabVanHoc');

Route::get('admin/prevtabvanhoc/{id}','WebManager@getPrevTabVanHoc')->name('getPrevTabVanHoc');

Route::get('admin/prev3book/{id}','WebManager@getPrev3Book')->name('getPrev3Book');

Route::get('checkout','ViewPages@getContentCheckOut')->name('getContentCheckOut');


Route::get('payment','ViewPages@getContentPayment')->name('getContentPayment');

Route::get('buybook','ViewPages@getBuyBook')->name('getBuyBook');

Route::post('tinhdoanhthutrongkhoangthoigian','WebManager@tinhDoanhThuTrongKhoangThoiGian')->name('tinhDoanhThuTrongKhoangThoiGian')->middleware('adminlogin');

Route::post('set-info-to-buy-book','WebManager@postSetInfo')->name('postSetInfo');

Route::get('thong-bao','WebManager@getThongBao')->name('getThongBao');

Route::post('dat-hang','WebManager@postDatHang')->name('postDatHang');

Route::get('check-exist-credit-card/{id}','WebManager@get_check_exist_credit_card')->name('get_check_exist_credit_card');