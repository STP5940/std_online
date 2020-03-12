<?php
require_once("header.php");
#http://localhost/login/login/admin/edit_student_new.php?id_main=1
$ID = filter_input(INPUT_GET, 'id_main', FILTER_SANITIZE_SPECIAL_CHARS);


$sql_result = mysqli_query($con, "SELECT * FROM student WHERE ID='$ID' ");
if(mysqli_num_rows($sql_result) >= '1'){
   while($rows_sql_result = mysqli_fetch_array($sql_result, MYSQLI_ASSOC)){
         $ID = $rows_sql_result['ID'];
         $St_id = $rows_sql_result['St_id'];
         $St_rfid = $rows_sql_result['St_rfid'];
         $St_sex = $rows_sql_result['St_sex'];
         $St_firstname = $rows_sql_result['St_firstname'];
         $St_lastname = $rows_sql_result['St_lastname'];
         $St_class  = $rows_sql_result['St_class'];
         $St_department = $rows_sql_result['St_department'];
         $Birthday = $rows_sql_result['Birthday'];
   }
}



$Birthday_date = substr($Birthday,0,2);
$Birthday_month = substr($Birthday,3,2);
$Birthday_year =  substr($Birthday,6,4);
$St_class_main = substr($St_class,0,-2);
$St_class_sub = substr($St_class,-1);


?>

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_studen.php">จัดการรายชื่อนักศึกษา</a>
        </li>
        <li class="breadcrumb-item active"> แก้ไขรายชื่อนักศึกษา</li>
      </ol>
      
<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แบบฟอร์มแก้ไขข้อมูล</div>
        <div class="card-body">
          <div class="table-responsive">
            
          <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_id_edit = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_rfid_edit = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">แก้ไขข้อมูลนักศึกษาสำเร็จ ! </font>';
                     }if($confirm == "0"){
                      echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ เนื่องจากมีรหัสนักศึกษา '.$St_id_edit.' ในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ เนื่องจากมีรหัส RFID: '.$St_rfid_edit.' ในระบบอยู่แล้ว ! </font>';
                     }
                     ?>



<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_student_record.php?edit=1&id_main=<?php echo $ID; ?>" method="POST">
    

    <div align="center" >
       <h2>แก้ไขข้อมูลนักศึกษา</h2>
    </div>

       <br>
       <div class="form-group">
       <label >รหัสนักศึกษา</label>
       <input class="form-control" type="text" name="St_id" placeholder="รหัสนักศึกษา" value="<?php echo $St_id; ?>" required>
       </div>

       <div class="form-group">
       <label >รหัสบัตร RFID</label>
       <input class="form-control" type="text" name="St_rfid" placeholder="รหัสบัตร RFID" value="<?php echo $St_rfid; ?>">
       </div>

       <div class="form-group">
       <label>ชื่อ-นามสกุล</label><br>
       <input class="form-control-name" type="text" name="St_firstname" placeholder="ชื่อ"  value="<?php echo $St_firstname; ?>" required>&nbsp;
       <input class="form-control-name" type="text" name="St_lastname" placeholder="นามสกุล"  value="<?php echo $St_lastname; ?>" required></div>

       <div class="form-group">
       <label>คำนำหน้าชื่อ</label><br>

      <?php
          switch ($St_sex) {
       case "เด็กชาย":
           echo '<label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กชาย" checked required>&nbsp;เด็กชาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กหญิง" required>&nbsp;เด็กหญิง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาย" required>&nbsp;นาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาง" required>&nbsp;นาง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นางสาว" required>&nbsp;นางสาว</input></label>&nbsp;';
           break;
       case "เด็กหญิง":
           echo '<label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กชาย" required>&nbsp;เด็กชาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กหญิง" checked required>&nbsp;เด็กหญิง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาย" required>&nbsp;นาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาง" required>&nbsp;นาง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นางสาว" required>&nbsp;นางสาว</input></label>&nbsp;';
           break;
       case "นาย":
           echo '<label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กชาย" required>&nbsp;เด็กชาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กหญิง" required>&nbsp;เด็กหญิง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาย" checked required>&nbsp;นาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาง" required>&nbsp;นาง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นางสาว" required>&nbsp;นางสาว</input></label>&nbsp;';
           break;
       case "นาง":
           echo '<label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กชาย" required>&nbsp;เด็กชาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กหญิง" required>&nbsp;เด็กหญิง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาย" required>&nbsp;นาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาง" checked required>&nbsp;นาง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นางสาว" required>&nbsp;นางสาว</input></label>&nbsp;';
           break;
       case "นางสาว":
           echo '<label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กชาย" required>&nbsp;เด็กชาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กหญิง" required>&nbsp;เด็กหญิง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาย" required>&nbsp;นาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาง" required>&nbsp;นาง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นางสาว" checked required>&nbsp;นางสาว</input></label>&nbsp;';
           break;
       default:
           echo '<label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กชาย" required>&nbsp;เด็กชาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="เด็กหญิง" required>&nbsp;เด็กหญิง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาย" required>&nbsp;นาย</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นาง" required>&nbsp;นาง</input></label>&nbsp;
           <label class="radio-inline">
           <input type="radio" name="St_sex" value="นางสาว" required>&nbsp;นางสาว</input></label>&nbsp;';
          }
       ?>
       </div>

       <div class="form-group">
       <label>เกิดวันที่ </label>
       <select name="Birthday_date" required>
       <label class="radio-inline">
            <option value="" disabled>กรุณาเลือก</option>
            <?php

            for($Day = 1; $Day <= 31; $Day++){
                if($Day < '10'){
                  if($Day == $Birthday_date){
                      echo "<option value='0$Day' selected>0$Day</option>";
                  }else{
                      echo "<option value='0$Day'>0$Day</option>";
                  }
                }else{
                  if($Day == $Birthday_date){
                     echo "<option value='$Day' selected>$Day</option>";
                  }else {
                     echo "<option value='$Day'>$Day</option>";
                  }
                }
            }
            ?>
       </label>
       </select>

       <label>เดือน </label>
       <select name="Birthday_month" required>
       <label class="radio-inline">
            <option value="" disabled>กรุณาเลือก</option>
            <option value="01" <?php $month = '01'; if($month == $Birthday_month){ echo 'selected'; } ?>>มกราคม</option>
            <option value="02" <?php $month = '02'; if($month == $Birthday_month){ echo 'selected'; } ?>>กุมภาพันธ์</option>
            <option value="03" <?php $month = '03'; if($month == $Birthday_month){ echo 'selected'; } ?>>มีนาคม</option>
            <option value="04" <?php $month = '04'; if($month == $Birthday_month){ echo 'selected'; } ?>>เมษายน</option>
            <option value="05" <?php $month = '05'; if($month == $Birthday_month){ echo 'selected'; } ?>>พฤษภาคม</option>
            <option value="06" <?php $month = '06'; if($month == $Birthday_month){ echo 'selected'; } ?>>มิถุนายน</option>
            <option value="07" <?php $month = '07'; if($month == $Birthday_month){ echo 'selected'; } ?>>กรกฎาคม</option>
            <option value="08" <?php $month = '08'; if($month == $Birthday_month){ echo 'selected'; } ?>>สิงหาคม</option>
            <option value="09" <?php $month = '09'; if($month == $Birthday_month){ echo 'selected'; } ?>>กันยายน</option>
            <option value="10" <?php $month = '10'; if($month == $Birthday_month){ echo 'selected'; } ?>>ตุลาคม</option>
            <option value="11" <?php $month = '11'; if($month == $Birthday_month){ echo 'selected'; } ?>>พฤศจิกายน</option>
            <option value="12" <?php $month = '12'; if($month == $Birthday_month){ echo 'selected'; } ?>>ธันวาคม</option>
       </label>
       </select>

       <label>ปี พ.ศ.  </label>
       <select name="Birthday_year" required>
       <label class="radio-inline">
            <option value="" disabled>กรุณาเลือก</option>
       <?php
       $Date_now = $date_year+543;
       $Year = 2400;

       for($Date_now; $Date_now >= $Year; $Date_now--){
          echo "<option value='$Date_now'";
          if($Date_now == $Birthday_year){
             echo 'selected'; 
            }
          echo ">$Date_now</option>";
       }
       ?>
       </select>
       </label>
       </div>


       <div class="form-group">
       <label>ระดับชั้น </label>
       <select name="St_class_one" required>
       <label class="radio-inline">
            <option value="" disabled>กรุณาเลือก</option>
            <option value="ปวช.1" <?php $St_class_one = 'ปวช.1'; if($St_class_one == $St_class_main){ echo 'selected'; } ?>>ปวช.1</option>
            <option value="ปวช.2" <?php $St_class_one = 'ปวช.2'; if($St_class_one == $St_class_main){ echo 'selected'; } ?>>ปวช.2</option>
            <option value="ปวช.3" <?php $St_class_one = 'ปวช.3'; if($St_class_one == $St_class_main){ echo 'selected'; } ?>>ปวช.3</option>
            <option value="ปวส.1" <?php $St_class_one = 'ปวส.1'; if($St_class_one == $St_class_main){ echo 'selected'; } ?>>ปวส.1</option>
            <option value="ปวส.2" <?php $St_class_one = 'ปวส.2'; if($St_class_one == $St_class_main){ echo 'selected'; } ?>>ปวส.2</option>
       </label>
       </select>

       
       <label>ห้อง </label>
       <select name="St_class_sub" required>
            <option value="" disabled>กรุณาเลือก</option>
        <?php
            for ($room = 1; $room <= 10; $room++) { 
                   echo "<option value='".$room."' ";
                   if($room == $St_class_sub){
                     echo 'selected';
                    }
                   echo ">".$room."</option>";
            }
        ?>
       </select>


       <label>แผนก </label>
       <select name="St_department" required>
       <label class="radio-inline">
            <option value="" disabled>กรุณาเลือก</option>
            <?php $sqli_rusult_department = mysqli_query($con ,"SELECT Name FROM department");
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

       
<!-- เวลาจบเรียน -->
    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="แก้ไขข้อมูลนักศึกษา" >
    <button type="reset" class="btn">ล้างฟอร์มข้อมูล</button>
    
    </div>
    <p><br>
    </form>
    <p><br>

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



