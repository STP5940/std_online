<?php
require_once("header.php");
$ID_tr = filter_input(INPUT_GET, 'ID_tr', FILTER_SANITIZE_SPECIAL_CHARS);
$ID_subjects = filter_input(INPUT_GET, 'ID_subjects', FILTER_SANITIZE_SPECIAL_CHARS);


$sql_result_tr = mysqli_query($con, "SELECT Firstname,Lastname FROM user WHERE ID='$ID_tr' ");
while($rows_sql_result_tr = mysqli_fetch_array($sql_result_tr, MYSQLI_ASSOC)){
    $Firstname = $rows_sql_result_tr['Firstname'];
    $Lastname = $rows_sql_result_tr['Lastname'];
}

$sql_result_subjects = mysqli_query($con, "SELECT * FROM subjects WHERE ID='$ID_subjects' ");
while($rows_sql_result_subjects = mysqli_fetch_array($sql_result_subjects, MYSQLI_ASSOC)){
     $Subjects_code = $rows_sql_result_subjects['Subjects_code'];
     $Name = $rows_sql_result_subjects['Name'];
     $Time_start = $rows_sql_result_subjects['Time_start'];
     $Time_end = $rows_sql_result_subjects['Time_end'];
     $Time_all = $rows_sql_result_subjects['Time_all'];
     $Teacher_id = $rows_sql_result_subjects['Teacher_id'];
     $Day = $rows_sql_result_subjects['Day'];
     $St_class = $rows_sql_result_subjects['St_class'];
     $St_department = $rows_sql_result_subjects['St_department'];
     $Late = $rows_sql_result_subjects['Late'];

     
     $Time_start = second_cover_return($Time_start);
     $Time_end = second_cover_return($Time_end);


     $Time_hour_start   = substr($Time_start,0,2);
     $Time_minute_start   = substr($Time_start,3,2);
     $Time_end_hour   = substr($Time_end,0,2);
     $Time_end_minute   = substr($Time_end,3,2);
     //echo $Time_hour_start;
     ///echo '<br>';
     //echo $Time_minute_start;
     //echo '<br>';
     //echo $Time_second_start;

     $St_class_main = substr($St_class,0,-2);
     $St_class_sub = substr($St_class,-1);

     //echo $St_class_main;
     //echo $St_class_sub;

     
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
 <li class="breadcrumb-item active">แก้ไขตารางสอน</li>
</ol>
      
<!-- แก้ไขตารางสอน เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แก้ไขตารางสอน</div>
        <div class="card-body">
          <div class="table-responsive">
            
          <?php
          $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

          if($confirm == "1"){
                 echo '<font size="3" color="#008000">แก้ไขข้อมูลตารางสอน ! </font>';
          }elseif($confirm == "0"){
                 echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ</font>';
          }
          ?>
 




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_subjects_teacher_record.php?ID_subjects=<?php echo $ID_subjects; ?>&edit=1&ID_tr=<?php echo $ID_tr; ?>" method="POST">
    

    <div align="center" >
       <h2>แก้ไขข้อมูลตารางสอน</h2>
    </div>

       <br>
       <div class="form-group">
       <label >รหัสวิชา</label>
       <input class="form-control" type="text" name="Subjects_code" placeholder="รหัสวิชา" value="<?php echo $Subjects_code; ?>" required>
       </div>
       <div class="form-group">
       <label>ชื่อวิชา</label>
       <input class="form-control" type="text" name="Name" placeholder="ชื่อวิชา" value="<?php echo $Name; ?>" required>
       </div>

       <div class="form-group">
       <label>วันที่สอน&nbsp;</label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Sunday" <?php if($Day == 'Sunday'){ echo 'checked'; } ?> required/>&nbsp;อาทิตย์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Monday" <?php if($Day == 'Monday'){ echo 'checked'; } ?> required/>&nbsp;จันทร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Tuesday" <?php if($Day == 'Tuesday'){ echo 'checked'; } ?> required/>&nbsp;อังคาร&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Wednesday" <?php if($Day == 'Wednesday'){ echo 'checked'; } ?> required/>&nbsp;พุธ&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Thursday" <?php if($Day == 'Thursday'){ echo 'checked'; } ?> required/>&nbsp;พฤหัสบดี&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Friday" <?php if($Day == 'Friday'){ echo 'checked'; } ?> required/>&nbsp;ศุกร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Saturday" <?php if($Day == 'Saturday'){ echo 'checked'; } ?> required/>&nbsp;เสาร์&nbsp;
       </label>
       </div>

       <!--****************************************** เวลาเริ่มเรียน *************************************************-->

       <div class="form-group">
       <label>เริ่มเรียนเวลา&nbsp;</label>
       <select name="Time_start_hour" required>
       <option value="" disabled >กรุณาเลือก</option>
       <?php
            for ($time_hour = 0; $time_hour <= 23  ; $time_hour++) { 
            	if($time_hour < 10){
                    if($time_hour == $Time_hour_start){
                        echo "<option value='0".$time_hour."' selected>0".$time_hour."</option>";
                    }else{
                        echo "<option value='0".$time_hour."'>0".$time_hour."</option>";
                    }
            	}else{
                    if($time_hour == $Time_hour_start){
                        echo "<option value='".$time_hour."' selected>".$time_hour."</option>";
                    }else{
                        echo "<option value='".$time_hour."'>".$time_hour."</option>";
                    }
            	}
            }
        ?>
       </select>
       <label>:</label>
       <select name="Time_start_minute" required>
       <option value="" disabled >กรุณาเลือก</option>
       <?php
            for ($time_minute = 0; $time_minute <= 60  ; $time_minute++) { 
            	if($time_minute < 10){
                    if($time_minute == $Time_minute_start){
                        echo "<option value='0".$time_minute."' selected>0".$time_minute."</option>";
                    }else{
                        echo "<option value='0".$time_minute."'>0".$time_minute."</option>";
                    }
            	}else{
                    if($time_minute == $Time_minute_start){
                        echo "<option value='".$time_minute."' selected>".$time_minute."</option>";
                    }else{
                        echo "<option value='".$time_minute."'>".$time_minute."</option>";
                    }
            	}
            }
        ?>
       </select>
<!--****************************************** เวลาเริ่มเรียน *************************************************-->

<label> - </label>

<!--****************************************** เวลาจบเรียน ***************************************************-->
       <select name="Time_end_hour" required>
       <option value="" disabled >กรุณาเลือก</option>
       <?php
            for ($time_hour = 0; $time_hour <= 23  ; $time_hour++) { 
            	if($time_hour < 10){
                    if($time_hour == $Time_end_hour){
                        echo "<option value='0".$time_hour."' selected>0".$time_hour."</option>";
                    }else{
                        echo "<option value='0".$time_hour."'>0".$time_hour."</option>";
                    }
            	}else{
                    if($time_hour == $Time_end_hour){
                        echo "<option value='".$time_hour."' selected>".$time_hour."</option>";
                    }else{
                        echo "<option value='".$time_hour."'>".$time_hour."</option>";
                    }
            	}
            }
        ?>
       </select>
       <label>:</label>
       <select name="Time_end_minute" required>
       <option value="" disabled >กรุณาเลือก</option>
       <?php
            for ($time_minute = 0; $time_minute <= 60  ; $time_minute++) { 
            	if($time_minute < 10){
                    if($time_minute == $Time_end_minute){
                        echo "<option value='0".$time_minute."' selected>0".$time_minute."</option>";
                    }else{
                        echo "<option value='0".$time_minute."'>0".$time_minute."</option>";
                    }
            	}else{
                    if($time_minute == $Time_end_minute){
                        echo "<option value='".$time_minute."' selected>".$time_minute."</option>";
                    }else{
                        echo "<option value='".$time_minute."'>".$time_minute."</option>";
                    }
            	}
            }
        ?>
       </select>
       </div>

       <div class="form-group">
       <label>ระดับชั้น&nbsp;</label>
       <select name="St_class_main" required>
            <option value="" disabled>กรุณาเลือก</option>
            <option value="ปวช.1" <?php if($St_class_main == 'ปวช.1'){ echo 'selected'; } ?>>ปวช.1</option>
            <option value="ปวช.2" <?php if($St_class_main == 'ปวช.2'){ echo 'selected'; } ?>>ปวช.2</option>
            <option value="ปวช.3" <?php if($St_class_main == 'ปวช.3'){ echo 'selected'; } ?>>ปวช.3</option>
            <option value="ปวส.1" <?php if($St_class_main == 'ปวส.1'){ echo 'selected'; } ?>>ปวส.1</option>
            <option value="ปวส.2" <?php if($St_class_main == 'ปวส.2'){ echo 'selected'; } ?>>ปวส.2</option>
       </select>
       


       <label>&nbsp;ห้อง&nbsp;</label>
       <select name="St_class_sub" required>
       <option value="" disabled >กรุณาเลือก</option>
        <?php
            for ($room = 1; $room <= 10  ; $room++) {
                if($St_class_sub == $room){
                    echo "<option value='".$room."' selected>".$room."</option>";
                }else{
                    echo "<option value='".$room."'>".$room."</option>";
                }
                   
            }
        ?>
       </select>

       <label>&nbsp;แผนก&nbsp;</label>
       <select name="St_department" required>
       <label class="radio-inline">
            <option value="" disabled>กรุณาเลือก</option>

            <?php $sqli_rusult_department = mysqli_query($con ,"SELECT Name FROM department ORDER BY Name ASC ");
            while($row_sqli_rusult_department = mysqli_fetch_array($sqli_rusult_department, MYSQLI_ASSOC)){
                  $Name_department = $row_sqli_rusult_department['Name'];
                  
                  if($St_department == $Name_department){
                    echo '<option value="'.$Name_department.'" selected>'.$Name_department.'</option>';
                  }else{
                    echo '<option value="'.$Name_department.'">'.$Name_department.'</option>';
                  }
            }
            ?>
       </label>
       </select>

       </div>

       <div class="form-group">
       <label>เวลาทั้งหมด </label>
       <select name="Time_all" required>
       <option value="" disabled >กรุณาเลือก</option>
       <?php
            for ($time_hour = 0; $time_hour <= 100  ; $time_hour++) { 
            	if($time_hour < 10){
                    if($Time_all == $time_hour){
                        echo "<option value='0".$time_hour."' selected>0".$time_hour."</option>";
                    }else{
                        echo "<option value='0".$time_hour."'>0".$time_hour."</option>";
                    }
                   
            	}else{
                    if($Time_all == $time_hour){
                        echo "<option value='".$time_hour."' selected>".$time_hour."</option>";
                    }else{
                        echo "<option value='".$time_hour."'>".$time_hour."</option>";
                    }
                   
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
    <input type="submit" class="btn btn-danger" value="แก้ไขตารางสอน" >
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



