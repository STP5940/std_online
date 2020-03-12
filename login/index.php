<?php
session_start();
if(isset($_SESSION["Userlevel"]) == "T"){
     Header("Location: teacher/");
}
if(isset($_SESSION["Userlevel"]) == "A"){
Header("Location: admin/");
}
if(isset($_SESSION["Userlevel"]) == "S"){
Header("Location: student/");
}
$login = filter_input(INPUT_GET, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="admin/img/logo.ico">
  <title>โปรแกรมเช็คชื่อนักศึกษา</title>
  <!-- Bootstrap core CSS-->
  <link href="teacher/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="teacher/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="teacher/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="teacher/css/sb-admin.css" rel="stylesheet">


  <link rel="stylesheet" href="css/style.css">
  
  
<style>

.sticky-footer-index {
    color: 	#000000;
    position: absolute;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 56px;
    background-color: #e9ecef;
    opacity: 0.5;
    filter: alpha(opacity=40); /* For IE8 and earlier */
    line-height: 20px;
}
</style>

</head>

<body class="fixed-nav sticky-footer" id="page-top" >
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">ระบบเช็คชื่อนักศึกษา</a>
    

  </nav>

  <div class="wrapper" >
    <form class="form-signin" action="Checklogin.php" method="POST">
      <h2 class="form-signin-heading" style="text-align:center">ลงชื่อเข้าสู่ระบบ</h2>
      <?php
      if($login == 'login_fall'){
        echo '<font size="2" color="red">*ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</font><br><br>';
      }
      ?>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
	  </br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      

      <button class="btn btn-lg btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>  
    </form>
  </div>

    <!-- /.container-fluid-->
<!-- ตารางแสดงรายชื่อ จบ -->






    <!-- /.content-wrapper-->
    <footer style="text-align:center" class="sticky-footer-index">
          <small>สงวนลิขสิทธิ์เนื้อหาทั้งหมด พ.ศ. 2560 จัดทำโดย นักศึกษาวิทยาลัยเทคนิคราชบุรี
          <br>Copyright © By Sitthipong And Tanapon</small>
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
    <script src="teacher/vendor/jquery/jquery.min.js"></script>
    <script src="teacher/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="teacher/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="teacher/vendor/chart.js/Chart.min.js"></script>
    <script src="teacher/vendor/datatables/jquery.dataTables.js"></script>
    <script src="teacher/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="teacher/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="teacher/js/sb-admin-datatables.min.js"></script>
    <script src="teacher/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
