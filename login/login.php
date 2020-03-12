<?php
session_start();
if($_SESSION["Userlevel"] == "T"){
     Header("Location: teacher/");
}
if($_SESSION["Userlevel"] == "A"){
  Header("Location: admin/");
}
if($_SESSION["Userlevel"] == "S"){
  Header("Location: student/");
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ลงชื่อเข้าสู่ระบบเช็คชื่อออนไลค์</title>


  <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <div class="wrapper">
    <form class="form-signin" action="Checklogin.php" method="POST">
      <h2 class="form-signin-heading">ลงชื่อเข้าสู่ระบบ</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
	  </br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> บันทึกการเข้าสู่ระบบ
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>   
    </form>
  </div>
  
               
</body>
</html>