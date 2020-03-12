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


  <style type="text/css">
    table,th,td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    body {
	background: #eee !important;	
    }

    .wrapper {	
	margin-top: 80px;
    margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  
}

  </style>
<!-- CSS dependencies -->
<!-- required includes -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!-- bootbox.js at 4.4.0 -->
<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>
<!-- Custom fonts for this template-->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item active">แผนควบคุมของฉัน</li>
      </ol>
      

<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ตารางแสดงรายชื่อ</div>
        <div class="card-body">
          <div class="table-responsive">
            




<br>
<div class="container">
     
    <form class="form-signin" action="add_subjects.php" method="POST">
    

    <div align="center" >
       <h2>เพิ่มข้อมูลตารางสอน</h2>
    </div>

       <br>
       <div class="form-group">
       <label >รหัสวิชา :</label>
       <input class="form-control" type="text" name="lg_code" placeholder="รหัสวิชา" required>
       </div>
       <label>ชื่อวิชา :</label>
       <input class="form-control" type="text" name="lg_name" placeholder="ชื่อวิชา" required><br><br>

       <div align="center" >
       <label>ชั้นที่สอน</label>
       <select name="st_class">
            <option value="ปวช.1">ปวช.1</option>
            <option value="ปวช.2">ปวช.2</option>
            <option value="ปวช.3">ปวช.3</option>
            <option value="ปวส.1">ปวส.1</option>
            <option value="ปวส.2">ปวส.2</option>
       </select>


       <label>ห้อง</label>
       <select name="st_room">
        <?php
            for ($room = 1; $room <= 10  ; $room++) { 
                   echo "<option value='".$room."'>".$room."</option>";
            }
        ?>
       </select>
       </div><br>

       <div align="center" >
       <label>เวลาเรียนทั้งหมด </label>
       <select name="lg_learning_time">
       <?php
            for ($time_hour = 0; $time_hour <= 100  ; $time_hour++) { 
            	if($time_hour < 10){
                   echo "<option value='0".$time_hour."'>0".$time_hour."</option>";
            	}else{
                   echo "<option value='".$time_hour."'>".$time_hour."</option>";
            	}
            }
        ?>
       </select>
       <label>ชั่วโมง/เทอม</label>
       </div><br>


       <div align="center" >
       <label>เลือกวันที่คุณสอน</label><br>
       <label class="radio-inline">
       <input name= "lg_days" type="radio" value="Sunday"  checked/>อาทิตย์
       </label>
       <label class="radio-inline">
       <input name= "lg_days" type="radio" value="Monday"/>จันทร์
       </label>
       <label class="radio-inline">
       <input name= "lg_days" type="radio" value="Tuesday" />อังคาร
       </label>
       <label class="radio-inline">
       <input name= "lg_days" type="radio" value="Wednesday" />พุธ
       </label>
       <br>
       <label class="radio-inline">
       <input name= "lg_days" type="radio" value="Thursday" />พฤหัสบดี
       </label>
       <label class="radio-inline">
       <input name= "lg_days" type="radio" value="Friday" />ศุกร์
       </label>
       <label class="radio-inline">
       <input name= "lg_days" type="radio" value="Saturday" />เสาร์
       </label>
       </div>
       <br><br>

<!--****************************************** เวลาเริ่มเรียน *************************************************-->
       <div align="center" >
       <label>ตั้งแต่เวลา </label>
       <select name="lg_start_hour">
       <?php
            for ($time_hour = 0; $time_hour <= 23  ; $time_hour++) { 
            	if($time_hour < 10){
                   echo "<option value='0".$time_hour."'>0".$time_hour."</option>";
            	}else{
                   echo "<option value='".$time_hour."'>".$time_hour."</option>";
            	}
            }
        ?>
       </select>
       <label>:</label>
       <select name="lg_start_minute">
       <?php
            for ($time_minute = 0; $time_minute <= 60  ; $time_minute++) { 
            	if($time_minute < 10){
                   echo "<option value='0".$time_minute."'>0".$time_minute."</option>";
            	}else{
                   echo "<option value='".$time_minute."'>".$time_minute."</option>";
            	}
            }
        ?>
       </select>
<!--****************************************** เวลาเริ่มเรียน *************************************************-->

<label> - </label>

<!--****************************************** เวลาจบเรียน ***************************************************-->
       <select name="lg_stop_hour">
       <?php
            for ($time_hour = 0; $time_hour <= 23  ; $time_hour++) { 
            	if($time_hour < 10){
                   echo "<option value='0".$time_hour."'>0".$time_hour."</option>";
            	}else{
                   echo "<option value='".$time_hour."'>".$time_hour."</option>";
            	}
            }
        ?>
       </select>
       <label>:</label>
       <select name="lg_stop_minute">
       <?php
            for ($time_minute = 0; $time_minute <= 60  ; $time_minute++) { 
            	if($time_minute < 10){
                   echo "<option value='0".$time_minute."'>0".$time_minute."</option>";
            	}else{
                   echo "<option value='".$time_minute."'>".$time_minute."</option>";
            	}
            }
        ?>
       </select>
       </div>

       <!-- checkbox หลายอัน radio 1 อัน-->
<br>
<!--****************************************** วัน-เดือน สิ้นสุด  **************************************************-->
       <div align="center" >
       <label>สิ้นสุดวันที่ </label>
       <select name="lg_day_end">
       <?php
            for ($day = 0; $day <= 31  ; $day++) { 
            	if($day < 10){
                   echo "<option value='0".$day."'>0".$day."</option>";
            	}else{
                   echo "<option value='".$day."'>".$day."</option>";
            	}
            }
        ?>
       </select>

       <select name="lg_Month_end">
       <option value="0" selected="1">เดือน</option>
       <option value="1">ม.ค.</option>
       <option value="2">ก.พ.</option>
       <option value="3">มี.ค.</option>
       <option value="4">เม.ย.</option>
       <option value="5">พ.ค.</option>
       <option value="6">มิ.ย.</option>
       <option value="7">ก.ค.</option>
       <option value="8">ส.ค.</option>
       <option value="9">ก.ย.</option>
       <option value="10">ต.ค.</option>
       <option value="11">พ.ย.</option>
       <option value="12">ธ.ค.</option>
       </select>


       <?php
       	date_default_timezone_set("Asia/Bangkok");
	    $timestamp = time();

	    $date_time = date("Y", $timestamp);
       ?>
       <select name="lg_year_end">
       <option value="0" selected="0">ปี</option>
       <option value="<?php echo "$date_time"; ?>"><?php echo "$date_time"; ?></option>
       <?php $date_time = $date_time+1; ?>
       <option value="<?php echo "$date_time"; ?>"><?php echo "$date_time"; ?></option>
       </select>

       </div>
<!-- เวลาจบเรียน -->
    <br><br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="สร้างตารางสอน" >
    <button type="reset" class="btn">ล้างฟอร์มข้อมูล</button>
    
    </div>
    <p><br>
    </form>
    <p><br>

</div>




            
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
