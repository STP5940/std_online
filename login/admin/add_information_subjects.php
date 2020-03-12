<?php
require_once("header.php");
$ID_tr = filter_input(INPUT_GET, 'ID_tr', FILTER_SANITIZE_SPECIAL_CHARS);

$sql_result_tr = mysqli_query($con, "SELECT Firstname,Lastname FROM user WHERE ID='$ID_tr' ");
while($rows_sql_result_tr = mysqli_fetch_array($sql_result_tr, MYSQLI_ASSOC)){
    $Firstname = $rows_sql_result_tr['Firstname'];
    $Lastname = $rows_sql_result_tr['Lastname'];
}
?>

 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
 <li class="breadcrumb-item">
   <a href="index.php">แผนควบคุม</a>
 </li>
 <li class="breadcrumb-item">
   <a href="add_subjects.php">จัดการตารางสอนครู</a>
 </li>
 <li class="breadcrumb-item">
   <a href="add_subjects_teacher.php?ID_tr=<?php echo $ID_tr; ?>">ตารางสอนครู <?php echo $Firstname.' '.$Lastname ?></a>
 </li>
 <li class="breadcrumb-item active">สร้างตารางสอน</li>
</ol>
      
<!-- สร้างตารางสอน เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> สร้างตารางสอน</div>
        <div class="card-body">
          <div class="table-responsive">
            
          <?php
          $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

          if($confirm == "1"){
                 echo '<font size="3" color="#008000">เพิ่มข้อมูลตารางสอน ! </font>';
          }elseif($confirm == "0"){
                 echo '<font size="3" color="red">เพิ่มข้อมูลไม่สำเร็จ</font>';
          }
          ?>
 




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_subjects_teacher_record.php?ID_tr=<?php echo $ID_tr; ?>" method="POST">
    

    <div align="center" >
       <h2>เพิ่มข้อมูลตารางสอน</h2>
    </div>

       <br>
       <div class="form-group">
       <label >รหัสวิชา</label>
       <input class="form-control" type="text" name="Subjects_code" placeholder="รหัสวิชา" required>
       </div>
       <div class="form-group">
       <label>ชื่อวิชา</label>
       <input class="form-control" type="text" name="Name" placeholder="ชื่อวิชา" required>
       </div>

       <div class="form-group">
       <label>วันที่สอน&nbsp;</label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Sunday" required/>&nbsp;อาทิตย์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Monday" required/>&nbsp;จันทร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Tuesday" required/>&nbsp;อังคาร&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Wednesday" required/>&nbsp;พุธ&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Thursday" required/>&nbsp;พฤหัสบดี&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Friday" required/>&nbsp;ศุกร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Saturday" required/>&nbsp;เสาร์&nbsp;
       </label>
       </div>

       <!--****************************************** เวลาเริ่มเรียน *************************************************-->

       <div class="form-group">
       <label>เริ่มเรียนเวลา&nbsp;</label>
       <select name="Time_start_hour" required>
       <option value="" disabled selected>กรุณาเลือก</option>
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
       <select name="Time_start_minute" required>
       <option value="" disabled selected>กรุณาเลือก</option>
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
       <select name="Time_end_hour" required>
       <option value="" disabled selected>กรุณาเลือก</option>
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
       <select name="Time_end_minute" required>
       <option value="" disabled selected>กรุณาเลือก</option>
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

       <div class="form-group">
       <label>ระดับชั้น&nbsp;</label>
       <select name="St_class_main" required>
            <option value="" disabled selected>กรุณาเลือก</option>
            <option value="ปวช.1">ปวช.1</option>
            <option value="ปวช.2">ปวช.2</option>
            <option value="ปวช.3">ปวช.3</option>
            <option value="ปวส.1">ปวส.1</option>
            <option value="ปวส.2">ปวส.2</option>
       </select>
       


       <label>&nbsp;ห้อง&nbsp;</label>
       <select name="St_class_sub" required>
       <option value="" disabled selected>กรุณาเลือก</option>
        <?php
            for ($room = 1; $room <= 10  ; $room++) { 
                   echo "<option value='".$room."'>".$room."</option>";
            }
        ?>
       </select>

       <label>&nbsp;แผนก&nbsp;</label>
       <select name="St_department" required>
       <label class="radio-inline">
            <option value="" disabled selected>กรุณาเลือก</option>
            <?php $sqli_rusult_department = mysqli_query($con ,"SELECT Name FROM department ORDER BY Name ASC ");
            while($row_sqli_rusult_department = mysqli_fetch_array($sqli_rusult_department, MYSQLI_ASSOC)){
                  $Name_department = $row_sqli_rusult_department['Name'];
                  echo '<option value="'.$Name_department.'">'.$Name_department.'</option>';
            }
            ?>
       </label>
       </select>

       </div>

       <div class="form-group">
       <label>เวลาทั้งหมด </label>
       <select name="Time_all" required>
       <option value="" disabled selected>กรุณาเลือก</option>
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
       </div>

       <!-- checkbox หลายอัน radio 1 อัน-->

<!-- เวลาจบเรียน -->
    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="สร้างตารางสอน" >
    <button type="reset" class="btn">ล้างฟอร์มข้อมูล</button>
    
    </div>
    <p>
    </form>
    <p>

</div>




            
          </div>
        </div>
        <div class="card-footer small text-muted">อัปเดตเมื่อเวลา <?php Time_now() ?> นาฬิกา</div>
      </div>
    </div>
    <!-- /.container-fluid-->
<!-- ตารางแสดงรายชื่อ จบ -->


<?php
require_once("footer.php");
?>



