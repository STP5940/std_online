<?php
require_once("header.php");
$ID_holiday = filter_input(INPUT_GET, 'ID_holiday', FILTER_SANITIZE_SPECIAL_CHARS);

$sqi_result_holiday = mysqli_query($con, "SELECT * FROM holiday WHERE ID='$ID_holiday' ");
while($rows_sqi_result_holiday = mysqli_fetch_array($sqi_result_holiday, MYSQLI_ASSOC)){
    $Day = $rows_sqi_result_holiday['Day'];
    $Day_holiday = $rows_sqi_result_holiday['Day_holiday'];
    $Detail_holiday = $rows_sqi_result_holiday['Detail_holiday'];

    $sub_Date   = substr($Day_holiday,0,-8);
    $sub_Month = substr($Day_holiday,3,-5);
    $sub_Year = substr($Day_holiday,6);
    
    }
?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_holiday.php">เพิ่มวันหยุดนักขัตฤกษ์</a>
        </li>
        <li class="breadcrumb-item active"> แก้ไขข้อมูลวันหยุดนักขัตฤกษ์</li>
      </ol>
      
<!-- ตารางแสดง เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แบบฟอร์มแก้ไขข้อมูล</div>
        <div class="card-body">
          <div class="table-responsive">
          <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
                     $Day_holiday = filter_input(INPUT_GET, 'Day_holiday', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">แก้ไขข้อมูลวันหยุดสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                            echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ เนื่องจากวันที่ '.$Day_holiday.' มีในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ ! </font>';
                     }
                     ?>
            




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_holiday_record.php?edit=1&ID_holiday=<?php echo $ID_holiday; ?>" method="POST">


    <div align="center" >
       <h2>แก้ไขข้อมูลวันหยุด</h2>
    </div>

       <br>
       <div class="form-group">
       <label>หยุดวัน&nbsp;</label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Sunday" <?php if($Day == "Sunday"){ echo 'checked'; } ?> required/>&nbsp;อาทิตย์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Monday" <?php if($Day == "Monday"){ echo 'checked'; } ?> required/>&nbsp;จันทร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Tuesday" <?php if($Day == "Tuesday"){ echo 'checked'; } ?> required/>&nbsp;อังคาร&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Wednesday" <?php if($Day == "Wednesday"){ echo 'checked'; } ?> required/>&nbsp;พุธ&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Thursday" <?php if($Day == "Thursday"){ echo 'checked'; } ?> required/>&nbsp;พฤหัสบดี&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Friday" <?php if($Day == "Friday"){ echo 'checked'; } ?> required/>&nbsp;ศุกร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Saturday" <?php if($Day == "Saturday"){ echo 'checked'; } ?> required/>&nbsp;เสาร์&nbsp;
       </label>
       </div>

       <div class="form-group">
       <label>หยุดวันที่</label>
       <select name="Birthday_date" required>
       <label class="radio-inline">
            <option value="" disabled>กรุณาเลือก</option>
            <?php
            for($Day = 1; $Day <= 31; $Day++){
                if($Day < '10'){
                    if($Day == $sub_Date){
                        echo "<option value='0$Day' selected>0$Day</option>";
                    }else{
                        echo "<option value='0$Day'>0$Day</option>";
                    }
                }else{
                    if($Day == $sub_Date){
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
            <option value="01" <?php if($sub_Month == "01"){ echo 'selected'; } ?>>มกราคม</option>
            <option value="02" <?php if($sub_Month == "02"){ echo 'selected'; } ?>>กุมภาพันธ์</option>
            <option value="03" <?php if($sub_Month == "03"){ echo 'selected'; } ?>>มีนาคม</option>
            <option value="04" <?php if($sub_Month == "04"){ echo 'selected'; } ?>>เมษายน</option>
            <option value="05" <?php if($sub_Month == "05"){ echo 'selected'; } ?>>พฤษภาคม</option>
            <option value="06" <?php if($sub_Month == "06"){ echo 'selected'; } ?>>มิถุนายน</option>
            <option value="07" <?php if($sub_Month == "07"){ echo 'selected'; } ?>>กรกฎาคม</option>
            <option value="08" <?php if($sub_Month == "08"){ echo 'selected'; } ?>>สิงหาคม</option>
            <option value="09" <?php if($sub_Month == "09"){ echo 'selected'; } ?>>กันยายน</option>
            <option value="10" <?php if($sub_Month == "10"){ echo 'selected'; } ?>>ตุลาคม</option>
            <option value="11" <?php if($sub_Month == "11"){ echo 'selected'; } ?>>พฤศจิกายน</option>
            <option value="12" <?php if($sub_Month == "12"){ echo 'selected'; } ?>>ธันวาคม</option>
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
           if($sub_Year == $Date_now){
            echo "<option value='$Date_now' selected>$Date_now</option>";
           }else{
            echo "<option value='$Date_now'>$Date_now</option>";
           }
          
          
       }
       ?>
       </select>
       </label>
       </div>


       <div class="form-group">
       <label>รายละเอียดวันหยุด</label><br>
       <input class="form-control" type="text" name="Detail_holiday" placeholder="ใส่คำอธิบาย เช่น หยุดวันปีใหม่" value="<?php echo $Detail_holiday; ?>" required>
       </div>


    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="บันทึกข้อมูลวันหยุด" >
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



<?php
require_once("footer.php");
?>