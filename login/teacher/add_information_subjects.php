<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");

if($_SESSION["Userlevel"] != T){

    Header("Location: ../");

}
?>


<html>
<head>
<meta charset="UTF-8">
<title>Admin page</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
<!-- bootbox.js at 4.4.0 -->
<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>
<!-- Custom fonts for this template-->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<br>
<div class="container">
     
    <form class="form-signin" action="add_subjects.php" method="POST">
    
    <div class="row">
        <a  class="fa fa-reply btn btn-primary" href="index.php"> ย้อนหลับ</a>       
    </div>

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
</body>
</html>