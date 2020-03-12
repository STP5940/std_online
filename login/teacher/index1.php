<?php
session_start();
require("../../config/connection.php");

if($_SESSION["Userlevel"] != A){

    Header("Location: ../");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>โปรแกรมเช็คชื่อนักศึกษา</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">ระบบเช็คชื่อนักศึกษา</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">แผงควบคุม</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">กราฟการเข้าเรียน</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">ตารางเข้าเรียน</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">ตั้งค่าส่วนประกอบ</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">ตั้งค่าสีธีม</a>
            </li>
            <li>
              <a href="cards.html">Cards</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="../../logout.php">ออกจากระบบ</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">ข้อความใหม่:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="ค้นหาข้อมูล...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item active">แผนควบคุมของฉัน</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-address-book-o"></i>
              </div>
              <div class="mr-5">ดูตารางสอนทั้งหมด!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-check-square-o"></i>
              </div>
              <div class="mr-5">เข้าเรียน 123 คน</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">ดูรายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-info-circle"></i>
              </div>
              <div class="mr-5">เข้าเรียนสาย 11 คน</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">ดูรายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-times-circle"></i>
              </div>
              <div class="mr-5">ขาดเรียน 13 คน</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">ดูรายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

      </div>

<!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> เช็คชื่อนักศึกษา</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable" autofocus>
                </div>

                <div class="col-sm-2 text-center my-auto">
                <button type="button" class="btn btn-primary btn-block">เช็คชื่อนักศึกษา</button>
                </div>           
                <div class="col-sm-2 text-center my-auto">
                <!-- ใส่วัตถุได้ -->
                <!-- <font size="3" color="red">ไม่สำเร็จ ! </font> -->
                <!-- <font size="3" color="#008000">สำเร็จ ! </font> -->
                </div>


                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-primary">32 คน</div>
                  <div class="small text-muted">นักเรียนทั้งหมด</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-success">20 คน</div>
                  <div class="small text-muted">เข้าเรียนแล้ว</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-warning">10 คน</div>
                  <div class="small text-muted">เข้าเรียนสาย</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-danger">2 คน</div>
                  <div class="small text-muted">ขาดเรียน</div>
                  <hr>
                </div>




              </div>
            </div>
            <div class="card-footer small text-muted">อัปเดตเมื่อเวลา 11:59 นาฬิกา</div>
          </div>

<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ตารางแสดงรายชื่อ</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th style="text-align:center">ชื่อ-นามสกุล</th>
                  <th style="text-align:center">ชั้น/ห้อง</th>
                  <th style="text-align:center">สาขา</th>
                  <th style="text-align:center">วัน-เวลา</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ชั้น/ห้อง</th>
                  <th>สาขา</th>
                  <th>วัน-เวลา</th>
                </tr>
              </tfoot>
              <tbody>




                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041001.jpg" title="ดูรูปนักศึกษา" >5932041001</a></td>
                  <td>นายกรอบทอง ศรีพิจารย์</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:50</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041002.jpg" title="ดูรูปนักศึกษา" >5932041002</a></td>
                  <td>นางสาวกัญญารัตน์ เกิดดี</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:40</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041003.jpg" title="ดูรูปนักศึกษา" >5932041003</a></td>
                  <td>นายจิติวัฒนา รุ่งพิทยานนท์</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:45</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041004.jpg" title="ดูรูปนักศึกษา" >5932041004</a></td>
                  <td>นางสาวจิราภรณ์ พวงเข็มแดง</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:50</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041027.jpg" title="ดูรูปนักศึกษา" >5932041027</a></td>
                  <td>นายสิทธิพงษ์ เส็งดอนไพร</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-success">
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041028.jpg" title="ดูรูปนักศึกษา" >5932041028</td>
                  <td >นางสาวสิริภัทร เถาว์น้อย</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:20</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041029.jpg" title="ดูรูปนักศึกษา" >5932041029</td>
                  <td>นางสาวสิริรักษ์ ทับแก้ว</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:30</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041030.jpg" title="ดูรูปนักศึกษา" >5932041030</td>
                  <td>นางสาวสุชาดา เต็กสุวรรณ</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:31:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-warning">
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041031.jpg" title="ดูรูปนักศึกษา" >5932041031</td>
                  <td>นางสาวสุพรรษา จิตอ่ำ</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:32:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-danger">
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041032.jpg" title="ดูรูปนักศึกษา" >5932041032</td>
                  <td><font size="3" color="red">ไม่พบข้อมูลนักศึกษา</font></td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:32:20</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041033.jpg" title="ดูรูปนักศึกษา" >5932041033</td>
                  <td>นายอริญชย์ ทองจาด</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:32:50</td>
                </tr>


              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">อัปเดตเมื่อเวลา 11:59 นาฬิกา</div>
      </div>
    </div>
    <!-- /.container-fluid-->
<!-- ตารางแสดงรายชื่อ จบ -->






    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบใช้หรือไม่?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่างเพื่อยืนยันการออกจากระบบของคุณ</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="../../logout.php">ออกจากระบบ</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
