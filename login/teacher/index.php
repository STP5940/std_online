<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
date_default_timezone_set("Asia/Bangkok");
$timestamp = time();

$date_time = date("l-d-m-Y H:i:s", $timestamp);

$date_day =  date("l", $timestamp);
$date_date =  date("d", $timestamp);
$date_month =  date("m", $timestamp);
$date_year =  date("Y", $timestamp);
$date_hour =  date("H", $timestamp);
$date_minute =  date("i", $timestamp);
$date_second =  date("s", $timestamp);

$Date_database = $date_year."-".$date_month."-".$date_date;


if($_SESSION["Userlevel"] != T){

    Header("Location: ../");

}

$subjects_ID = filter_input(INPUT_GET, 'subjects_ID', FILTER_SANITIZE_SPECIAL_CHARS);

$result_ID = mysqli_query($con, "SELECT Teacher_id FROM subjects WHERE ID='$subjects_ID' ");
if($result_ID){
  while($row_result_ID = mysqli_fetch_array($result_ID, MYSQLI_ASSOC)){
    $row_result_ID['Teacher_id'];
    if($row_result_ID['Teacher_id'] != $_SESSION["ID"]){
      Header("Location: index.php");
    }
  }
}


if($subjects_ID == null){
  Header("Location: subjects.php");
}

require("header.php");
?>


      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">ตารางสอน</a>
        </li>
        <?php
        $result_subjects = mysqli_query($con, "SELECT * FROM subjects WHERE ID='".$subjects_ID."' ");
        if($result_subjects){
          while($row_subjects = mysqli_fetch_array($result_subjects,MYSQLI_ASSOC)){
            $subjects_name = $row_subjects['Name'];
            echo '<li class="breadcrumb-item active">'.$subjects_name.'</li>';
            }
        } 
        ?>
        
      </ol>

<!-- Example Bar Chart Card-->
<?php
        $result_subjects_ID = mysqli_query($con, "SELECT * FROM subjects WHERE ID='".$subjects_ID."' ");

          if($result_subjects_ID){
            while ($row_subjects_ID = mysqli_fetch_array($result_subjects_ID, MYSQLI_ASSOC)) {
                 $Subjects_Time_start   =  $row_subjects_ID['Time_start'];
                 $Subjects_Time_end     =  $row_subjects_ID['Time_end'];
            }
          }
          ?>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> เช็คชื่อนักศึกษา <?php echo 'เริ่มสอนเวลา '.second_cover_return($Subjects_Time_start).'-'.second_cover_return($Subjects_Time_end).' นาฬิกา'; ?></div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">

                <?php

                $sql_check_start_day = mysqli_query($con, "SELECT ID FROM record WHERE Subjects_ID='$subjects_ID' AND Date='$Date_database' AND Status='5' ");
//print_r($sql_check_start_day);
if(mysqli_num_rows($sql_check_start_day) != '1'){
        echo "<form class='form-signin' action='add_record.php?subjects_ID=$subjects_ID' method='POST'>
        <input type='text' class='form-control form-control-sm' name='ID_Studen' placeholder='คำเตือน: หากไม่กดปุ่ม \"เริ่มระบบเช็คชื่อ\" ข้อมูลในวันนั้นจะไม่ถูกบันทึกลงในฐานข้อมูลระบบ' autofocus='' disabled>
        </div>
        <div class='col-sm-2 text-center my-auto'>
        <button class='btn btn-danger btn-block' type='submit'>เริ่มระบบเช็คชื่อ</button>
        </form>";
}else {
        echo "<form class='form-signin' action='add_record.php?subjects_ID=$subjects_ID' method='POST'>
        <input type='text' class='form-control form-control-sm' name='ID_Studen' placeholder='ใส่รหัสนักศึกษา' required='' autofocus=''>
        </div>
        <div class='col-sm-2 text-center my-auto'>
        <button class='btn btn-primary btn-block' type='submit'>เช็คชื่อนักศึกษา</button>
        </form>";
}

                ?>
                

                
   


                </div>           
                <div class="col-sm-2 text-center my-auto">
              
                <!-- ใส่วัตถุได้ -->
                <?php
                $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

                if(mysqli_num_rows($sql_check_start_day) != '1' ){
                  echo '<font size="3" color="red">กดปุ่ม "เริ่มระบบเช็คชื่อ"</font>';
                }else{
                      if($confirm == "1"){
                              echo '<font size="3" color="#008000">เช็คชื่อสำเร็จ ! </font>';
                      }elseif($confirm == "0"){
                              echo '<font size="3" color="red">เช็คชื่อไม่สำเร็จ ! </font>';
                      }elseif($confirm == "3"){
                              echo '<font size="3" color="red">มีชื่อนี้ในระบบแล้ว ! </font>';
                      }elseif($confirm == "4"){
                        echo '<font size="3" color="red">หมดเวลาเช็คชื่อแล้ว ! </font>';
                      }elseif($confirm == "5"){
                        echo '<font size="3" color="red">ยังไม่ถึงวันเช็คชื่อ ! </font>';
                      }elseif($confirm == "6"){
                        echo '<font size="3" color="#008000">เริ่มต้นระบบสำเร็จ ! </font>';
                      }
                }
                ?>
                
                <!-- <font size="3" color="red">ไม่สำเร็จ ! </font> -->
                <!-- <font size="3" color="#008000">สำเร็จ ! </font> -->
                </div>

<?php

  $sql_subjects = "SELECT St_class,St_department FROM subjects WHERE ID='$subjects_ID' ";
  $result_subjects = mysqli_query($con,$sql_subjects);
  //print_r($result_subjects);
  if($result_subjects){
      while($row_result_subjects = mysqli_fetch_array($result_subjects, MYSQLI_ASSOC)){
              $St_class =  $row_result_subjects['St_class'];
              $St_department =  $row_result_subjects['St_department'];
  
              ##################  ดึงรายชื่อนักเรียนที่ตรงกับตารางสอน  ##################
              $result_list_studen = mysqli_query($con, "SELECT ID FROM student WHERE St_class='$St_class' AND St_department='$St_department' ");
              //print_r($result_list_studen);
              if(mysqli_num_rows($result_list_studen) >= '1'){
                  $num_studen_in_class = mysqli_num_rows($result_list_studen);
              }else{
                  $num_studen_in_class = '0';
              }
  
          }
  }else{
      echo 'ไม่พบข้อมูล';
  }


  $date_now = $date_year.'-'.$date_month.'-'.$date_date;

  $result_st_input = mysqli_query($con,"SELECT St_id FROM record WHERE Subjects_ID='$subjects_ID' AND Date='$date_now' ");
  if(mysqli_num_rows($result_st_input) >= '1'){
    $st_input = mysqli_num_rows($result_st_input)-1;
  }else{
    $st_input = 0;
  }

  #จำนวนนักเรียนเข้าสาย
  $result_record_late = mysqli_query($con, "SELECT Status FROM record WHERE Status='2' AND Date='$Date_database' AND Subjects_ID='$subjects_ID' ");
  $num_late = mysqli_num_rows($result_record_late);

  #จำนวนนักเรียนขาดเรียน
  $std_no_checkin = '0';
  $result_student = mysqli_query($con, "SELECT * FROM student WHERE St_class='$St_class'AND St_department='$St_department' ");
  while($rows_result_student = mysqli_fetch_array($result_student,MYSQLI_ASSOC)){
        $id_std = $rows_result_student['St_id'];
        $St_rfid = $rows_result_student['St_rfid'];
        //echo $id_std.'<br>';

        $result_record = mysqli_query($con, "SELECT * FROM record WHERE St_id='$id_std' AND Date='$Date_database' AND Subjects_ID='$subjects_ID' ");
        if(mysqli_num_rows($result_record) == '0'){
          $result_record = mysqli_query($con, "SELECT * FROM record WHERE St_id='$St_rfid' AND Date='$Date_database' AND Subjects_ID='$subjects_ID' ");
          if(mysqli_num_rows($result_record) == '0'){
            $std_no_checkin++;
            //echo $id_std.'<br>';
           }
        }

  }
?>


                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-primary"><?php echo $num_studen_in_class; ?> คน</div>
                  <div class="small text-muted">นักเรียนทั้งหมด</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-success"><?php echo $st_input; ?> คน</div>
                  <div class="small text-muted">เข้าเรียนแล้ว</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-warning"><?php echo $num_late; ?> คน</div>
                  <div class="small text-muted">เข้าเรียนสาย</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-danger"><?php echo $std_no_checkin; ?> คน</div>
                  <div class="small text-muted">ขาดเรียน</div>
                  <hr>
                </div>




              </div>
            </div>
            <div class="card-footer small text-muted">อัปเดตเมื่อเวลา <?php Time_now() ?> นาฬิกา</div>
          </div>

<!-- ปริ้น -->
          <div class="col-sm-2 text-center my-auto">
                  <hr>
                    <a href="print_list_studen_Day.php?Subjects_ID=<?php echo $subjects_ID ?>">
                     <button class="btn btn-success btn-block fa fa-print" type="submit"></button>
                    </a>
                  <div class="small text-muted">ปริ้นรายงานประจำวัน</div>
                  <hr>
          </div>

<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <i class="fa fa-table"></i> ตารางแสดงรายชื่อนักศึกษาที่เข้าเรียนแล้ว</div>
           
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
                  <th style="text-align:center">สถานะ</th>
                  <th style="text-align:center">ลบ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ชั้น/ห้อง</th>
                  <th>สาขา</th>
                  <th>วัน-เวลา</th>
                  <th>สถานะ</th>
                  <th>ลบ</th>
                </tr>
              </tfoot>
              <tbody>

              <?php
########## กำหนดให้ใช้เวลาในประเทศไทย ##########
date_default_timezone_set("Asia/Bangkok");
$timestamp = time();
$date_date =  date("d", $timestamp);
$date_month =  date("m", $timestamp);
$date_year =  date("Y", $timestamp);
$Date_database = $date_year."-".$date_month."-".$date_date;

$result_subjects_ID = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID='$subjects_ID' AND Date='$Date_database' ");

if($result_subjects_ID){
    while ($row_subjects_ID = mysqli_fetch_array($result_subjects_ID, MYSQLI_ASSOC)) {
         $St_id  =  $row_subjects_ID['St_id'];
         $record_ID  =  $row_subjects_ID['ID'];
         $record_Date = $row_subjects_ID['Date'];
         $record_Time = $row_subjects_ID['Time'];
         $record_Status = $row_subjects_ID['Status'];
         switch ($record_Status) {
          case "0":
              $record_Status = 'ขาด';
              break;
          case "1":
              $record_Status = 'เข้าเรียน';
              break;
          case "2":
              $record_Status = 'สาย';
              break;
          default:
              $record_Status = "ไม่มีสถานะการเข้าเรียน";
        }


         //echo $St_id."<br><hr> ";
         $result_student_St_id = mysqli_query($con, "SELECT * FROM student WHERE St_id='$St_id' OR St_rfid='$St_id' ");
         if($result_student_St_id){
            while ($row_student_St_id = mysqli_fetch_array($result_student_St_id, MYSQLI_ASSOC)) {
                 $student_St_id  =  $row_student_St_id['St_id'];
                 $student_St_rfid  =  $row_student_St_id['St_rfid'];
                 $student_Name_studen = $row_student_St_id['St_sex'].' '.$row_student_St_id['St_firstname'].$row_student_St_id['St_lastname'];
                 $student_St_class = $row_student_St_id['St_class'];
                 $student_St_department = $row_student_St_id['St_department'];
                 

                 echo "<tr class=\"list-group-item-action list-group-item-success\">";
                 echo "<td style=\"text-align:center\"><a href=\"http://182.93.148.91/files/importpicstd/01/$student_St_id.jpg\" title=\"ดูรูปนักศึกษา\" >$student_St_id</a></td>";
                 echo "<td>$student_Name_studen</td>";
                 echo "<td>$student_St_class</td>";
                 echo "<td>$student_St_department</td>";
                 echo "<td>$record_Date $record_Time</td>";
                 if($record_Status == 'สาย'){
                  echo "<td style='text-align:center'><font color='FF8200'>$record_Status</font></td>";
                 }else{
                  echo "<td style='text-align:center'>$record_Status</td>";
                 }
                 echo "<td><a data-toggle=\"modal\" data-target=\"#delet$record_ID\"><button class=\"btn btn-danger btn-block fa fa-times\" type=\"submit\"></button></a></td>";
                 echo "</tr>";

            }
          }
            
           #กรณีที่ไม่มีชื่อนักศึกษาในระบบ#
           if($St_id != $student_St_id && mysqli_num_rows($result_student_St_id) == '0'){
                 echo "<tr class=\"list-group-item-action list-group-item-danger\">";
                 echo "<td style=\"text-align:center\"><a href=\"http://182.93.148.91/files/importpicstd/01/$St_id.jpg\" title=\"ดูรูปนักศึกษา\" >$St_id</a></td>";
                 echo "<td style=\"text-align:center\"><font size=\"3\" color=\"red\">ไม่พบข้อมูลนักศึกษา</font></td>";
                 echo "<td style=\"text-align:center\">-</td>";
                 echo "<td style=\"text-align:center\">-</td>";
                 echo "<td>$record_Date $record_Time</td>";
                 if($record_Status == 'สาย'){
                  echo "<td style='text-align:center'><font color='FF8200'>$record_Status</font></td>";
                 }else{
                  echo "<td style='text-align:center'><font color='#006600'>$record_Status</font></td>";
                 }
                 echo "<td><a data-toggle=\"modal\" data-target=\"#delet$record_ID\"><button class=\"btn btn-danger btn-block fa fa-times\" type=\"submit\"></button></a></td>";
                 echo "</tr>";
           }

    }
  }

?>

<!--
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

-->
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">อัปเดตเมื่อเวลา <?php Time_now() ?> นาฬิกา</div>
      </div>
    </div>
    <!-- /.container-fluid-->
<!-- ตารางแสดงรายชื่อ จบ -->
<?php
require("footer.php");
?>





