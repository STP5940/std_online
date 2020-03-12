<?php
require_once("header.php");
?>

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_studen.php">จัดการรายชื่อนักศึกษา</a>
        </li>
        <li class="breadcrumb-item active"> เพิ่มรายชื่อนักศึกษา</li>
      </ol>
      
<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แบบฟอร์มบันทึกข้อมูล</div>
        <div class="card-body">
          <div class="table-responsive">
          <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_rfid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">เพิ่มข้อมูลนักศึกษาสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                            echo '<font size="3" color="red">เพิ่มข้อมูลไม่สำเร็จ เนื่องจากมีรหัสนักศึกษา '.$St_id.' ในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">เพิ่มข้อมูลไม่สำเร็จ เนื่องจากมีรหัส RFID: '.$St_rfid.' ในระบบอยู่แล้ว ! </font>';
               }
                     ?>
            




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_student_record.php" method="POST">
    

    <div align="center" >
       <h2>เพิ่มข้อมูลนักศึกษา</h2>
    </div>

       <br>
       <div class="form-group">
       <label >รหัสนักศึกษา</label>
       <input class="form-control" type="text" name="St_id" placeholder="รหัสนักศึกษา" required>
       </div>

       <div class="form-group">
       <label >รหัสบัตร RFID</label>
       <input class="form-control" type="text" name="St_rfid" placeholder="รหัสบัตร RFID">
       </div>

       <div class="form-group">
       <label>ชื่อ-นามสกุล</label><br>
       <input class="form-control-name" type="text" name="St_firstname" placeholder="ชื่อ" required>&nbsp;
       <input class="form-control-name" type="text" name="St_lastname" placeholder="นามสกุล" required></div>

       <div class="form-group">
       <label>คำนำหน้าชื่อ</label><br>
       <label class="radio-inline">
       <input type="radio" name="St_sex" value="เด็กชาย" required>&nbsp;เด็กชาย</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="St_sex" value="เด็กหญิง" required>&nbsp;เด็กหญิง</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="St_sex" value="นาย" required>&nbsp;นาย</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="St_sex" value="นาง" required>&nbsp;นาง</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="St_sex" value="นางสาว" required>&nbsp;นางสาว</input></label>&nbsp;
       </div>

       <div class="form-group">
       <label>เกิดวันที่ </label>
       <select name="Birthday_date" required>
       <label class="radio-inline">
            <option value="">กรุณาเลือก</option>
            <?php
            for($Day = 1; $Day <= 31; $Day++){
                if($Day < '10'){
                   echo "<option value='0$Day'>0$Day</option>";
                }else{
                   echo "<option value='$Day'>$Day</option>";
                }
            }
            ?>
       </label>
       </select>

       <label>เดือน </label>
       <select name="Birthday_month" required>
       <label class="radio-inline">
            <option value="">กรุณาเลือก</option>
            <option value="01">มกราคม</option>
            <option value="02">กุมภาพันธ์</option>
            <option value="03">มีนาคม</option>
            <option value="04">เมษายน</option>
            <option value="05">พฤษภาคม</option>
            <option value="06">มิถุนายน</option>
            <option value="07">กรกฎาคม</option>
            <option value="08">สิงหาคม</option>
            <option value="09">กันยายน</option>
            <option value="10">ตุลาคม</option>
            <option value="11">พฤศจิกายน</option>
            <option value="12">ธันวาคม</option>
       </label>
       </select>

       <label>ปี พ.ศ.  </label>
       <select name="Birthday_year" required>
       <label class="radio-inline">
            <option value="">กรุณาเลือก</option>
       <?php
       $Date_now = $date_year+543;
       $Year = 2400;

       for($Date_now; $Date_now >= $Year; $Date_now--){
          echo "<option value='$Date_now'>$Date_now</option>";
       }
       ?>
       </select>
       </label>
       </div>
       

       <div class="form-group">
       <label>ระดับชั้น </label>
       <select name="St_class_one" required>
       <label class="radio-inline">
            <option value="">กรุณาเลือก</option>
            <option value="ปวช.1">ปวช.1</option>
            <option value="ปวช.2">ปวช.2</option>
            <option value="ปวช.3">ปวช.3</option>
            <option value="ปวส.1">ปวส.1</option>
            <option value="ปวส.2">ปวส.2</option>
       </label>
       </select>

    
       <label>ห้อง </label>
       <select name="St_class_sub" required>
            <option value="">กรุณาเลือก</option>
        <?php
            for ($room = 1; $room <= 10; $room++) { 
                   echo "<option value='".$room."'>".$room."</option>";
            }
        ?>
       </select>


       <label>แผนก </label>
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

       
<!-- เวลาจบเรียน -->
    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="บันทึกข้อมูลนักศึกษา" >
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



