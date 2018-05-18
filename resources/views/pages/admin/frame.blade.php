
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from thevectorlab.net/flatlab/basic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:46:23 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Quản Trị</title>
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin-bootstrap-reset.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
  <!--right slidebar-->
  <link href="{{ asset('css/admin-slidebars.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/admin-style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin-style-responsive.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-fileupload.css') }}" />
  <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body>
  <section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
      <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
      </div>
      <!--logo start-->
      <a href="{{ route('getAdmin') }}" class="logo" >Admin<span>page</span></a>
      <!--logo end-->
      <div class="top-nav ">
        <ul class="nav pull-right top-menu">
          <li>
            <input type="text" class="form-control search" placeholder="Search">
          </li>
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <img alt="" class="img-fluid" width="32" src="{{ asset('images/40848077334_db3b7055a3_o.jpg') }}">
              <span class="username">{{ session('adminlogin')->first_name.' '.session('adminlogin')->last_name }}</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li><a href="{{ route('getProfile',session('adminlogin')->admin_id) }}"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
              <li><a href="{{ route('getComingSoon') }}"><i class="fa fa-cog"></i> Cài đặt</a></li>
              <li><a href="{{ route('getLookScreen',session('adminlogin')->admin_id) }}"><i class="fa fa-lock"></i> Khóa</a></li>
              <li><a href="{{ route('getAdminLogout') }}"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
          </li>

          <!-- user login dropdown end -->
          <li class="sb-toggle-right">
            <i class="fa  fa-align-right"></i>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li>
            <a href="{{ route('getAdmin') }}">
              <i class="fa fa-dashboard"></i>
              <span>Tổng Quan</span>
            </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-th"></i>
              <span>Quản Lý</span>
            </a>
            <ul class="sub">
              <li><a  href="{{ route('getListCategory') }}">Thể Loại</a></li>
              <li><a  href="{{ route('getListAuthor') }}">Tác Giả</a></li>
              <li><a  href="{{ route('getListBook') }}">Sách</a></li>
              <li><a  href="{{ route('getListCustomer') }}">Khách Hàng</a></li>
              <li><a  href="{{ route('getListAdmin') }}">Admin</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-money"></i>
              <span>Bán Hàng</span>
            </a>
            <ul class="sub">
              <li><a  href="{{ route('getListOrderDetail') }}">Danh Sách Đơn Hàng</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-list"></i>
              <span>Danh Sách</span>
            </a>
            <ul class="sub">
              <li><a  href="{{ route('getBXHSachRatingCao') }}">BXH Sách Có Rating Cao</a></li>
            </ul>
          </li>

          <li class="sub-menu dcjq-parent-li">
            <a href="javascript:;" class="dcjq-parent">
              <i class="fa fa-bar-chart-o"></i>
              <span>Thống Kê</span>
              <span class="dcjq-icon"></span></a>
              <ul class="sub" style="display: block;">
                <li class="sub-menu dcjq-parent-li">
                  <a href="" class="dcjq-parent"><i class="fa fa-book"></i>Sách<span class="dcjq-icon"></span></a>
                  <ul class="sub" style="display: block;">
                    <li><a href="{{ route('getStatisticalAuthor') }}">Tác Giả</a></li>
                    <li><a href="{{ route('getStatisticalCategory') }}">Thể Loại</a></li>
                    <li><a href="{{ route('getStatisticalPublisher') }}">Nhà Xuất Bản</a></li>
                    <li><a href="{{ route('getStatisticalLanguage') }}">Ngôn Ngữ</a></li>
                    <li><a href="{{ route('getStatisticalSellingBook') }}">BXH Sách Bán Chạy</a></li>
                  </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                  <a href="" class="dcjq-parent"><i class="fa fa-book"></i>Bán Hàng<span class="dcjq-icon"></span></a>
                  <ul class="sub" style="display: block;">
                    <li><a href="{{ route('getStatisticalTotalCustomerBuy') }}">Khách Hàng</a></li>
                    <li>
                      <a href="">Doanh Thu</a>
                      <ul class="sub">
                        <li><a  href="{{ route('getStatisticalDoanhThu') }}">Ngày,Tháng</a></li>
                        <li><a  href="{{ route('getStatisticalDoanhThuThang') }}">Năm</a></li>
                      </ul>
                    </li>
                    <li><a href="{{ route('getComingSoon') }}">Lợi Nhuận</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
        @yield('content')
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
      <div class="sb-slidebar sb-right sb-style-overlay">
        <h5 class="side-title">Khách Hàng Trực Tuyến</h5>
        <ul class="quick-chat-list">
          <li class="online">
            <div class="media">
              <a href="#" class="pull-left media-thumb">
                <img alt="" src="{{ asset('images/chat-avatar2.jpg') }}" class="media-object">
              </a>
              <div class="media-body">
                <strong>John Doe</strong>
                <small>Dream Land, AU</small>
              </div>
            </div><!-- media -->
          </li>
          <li class="online">
            <div class="media">
              <a href="#" class="pull-left media-thumb">
                <img alt="" src="{{ asset('images/chat-avatar.jpg') }}" class="media-object">
              </a>
              <div class="media-body">
                <div class="media-status">
                  <span class=" badge bg-important">3</span>
                </div>
                <strong>Jonathan Smith</strong>
                <small>United States</small>
              </div>
            </div><!-- media -->
          </li>

          <li class="online">
            <div class="media">
              <a href="#" class="pull-left media-thumb">
                <img alt="" src="{{ asset('images/pro-ac-1.png') }}" class="media-object">
              </a>
              <div class="media-body">
                <div class="media-status">
                  <span class=" badge bg-success">5</span>
                </div>
                <strong>Jane Doe</strong>
                <small>ABC, USA</small>
              </div>
            </div><!-- media -->
          </li>
          <li class="online">
            <div class="media">
              <a href="#" class="pull-left media-thumb">
                <img alt="" src="{{ asset('images/avatar1.jpg') }}" class="media-object">
              </a>
              <div class="media-body">
                <strong>Anjelina Joli</strong>
                <small>Fockland, UK</small>
              </div>
            </div><!-- media -->
          </li>
          <li class="online">
            <div class="media">
              <a href="#" class="pull-left media-thumb">
                <img alt="" src="{{ asset('images/mail-avatar.jpg') }}" class="media-object">
              </a>
              <div class="media-body">
                <div class="media-status">
                  <span class=" badge bg-warning">7</span>
                </div>
                <strong>Mr Tasi</strong>
                <small>Dream Land, USA</small>
              </div>
            </div><!-- media -->
          </li>
        </ul>
        <h5 class="side-title"> pending Task</h5>
        <ul class="p-task tasks-bar">
          <li>
            <a href="#">
              <div class="task-info">
                <div class="desc">Dashboard v1.3</div>
                <div class="percent">40%</div>
              </div>
              <div class="progress progress-striped">
                <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                  <span class="sr-only">40% Complete (success)</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="task-info">
                <div class="desc">Database Update</div>
                <div class="percent">60%</div>
              </div>
              <div class="progress progress-striped">
                <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                  <span class="sr-only">60% Complete (warning)</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="task-info">
                <div class="desc">Iphone Development</div>
                <div class="percent">87%</div>
              </div>
              <div class="progress progress-striped">
                <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                  <span class="sr-only">87% Complete</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="task-info">
                <div class="desc">Mobile App</div>
                <div class="percent">33%</div>
              </div>
              <div class="progress progress-striped">
                <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                  <span class="sr-only">33% Complete (danger)</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="task-info">
                <div class="desc">Dashboard v1.3</div>
                <div class="percent">45%</div>
              </div>
              <div class="progress progress-striped active">
                <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                  <span class="sr-only">45% Complete</span>
                </div>
              </div>

            </a>
          </li>
          <li class="external">
            <a href="#">See All Tasks</a>
          </li>
        </ul>
      </div>
      <!-- Right Slidebar end -->
      <!--footer start-->
      <div class="clearfix"></div>
      <div class="cuoi">
        <footer class="site-footer">
          <div class="text-center">
            2013 &copy; FlatLab by VectorLab.
            <a href="#" class="go-top">
              <i class="fa fa-angle-up"></i>
            </a>
          </div>
        </footer>
      </div>
      <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('js/admin-jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('js/admin-jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/admin-jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--right slidebar-->
    <script src="{{ asset('js/admin-slidebars.min.js') }}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('js/admin-common-scripts.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap-fileupload.js') }}"></script>
  </body>
  <!-- Mirrored from thevectorlab.net/flatlab/basic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:46:23 GMT -->
  </html>
