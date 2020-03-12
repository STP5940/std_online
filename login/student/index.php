<?php
require("header.php");
$St_class =$_SESSION["St_class"];
$St_department =$_SESSION["St_department"];
$St_id = $_SESSION["St_id"];
$St_rfid =  $_SESSION["St_rfid"];
//echo $St_rfid;
$sql_result_subjects = mysqli_query($con, "SELECT * FROM subjects WHERE St_class='$St_class' AND St_department='$St_department' ");
//print_r($sql_result_subjects);
?>
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">รายงานการเข้าเรียน</a>
        </li>
        <li class="breadcrumb-item active">แผนควบคุมของฉัน</li>
      </ol>

     

<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ตารางแสดงรายชื่อ<?php echo $_SESSION["St_class"].$_SESSION["St_department"]; ?></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align:center">รหัสวิชา</th>
                  <th style="text-align:center">ชื่อวิชา</th>
                  <th style="text-align:center">วันที่เรียน</th>
                  <th style="text-align:center">เข้าเรียน</th>
                  <th style="text-align:center">ขาดเรียน</th>
                  <th style="text-align:center">ขาดเรียนได้</th>
                  <th style="text-align:center">เวลาเรียนทั้งหมด</th>
                  <th style="text-align:center">สถานะเข้าสอบ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">รหัสวิชา</th>
                  <th>ชื่อวิชา</th>
                  <th>วันที่เรียน</th>
                  <th>เข้าเรียน</th>
                  <th>ขาดเรียน</th>
                  <th>ขาดเรียนได้</th>
                  <th>เวลาเรียนทั้งหมด</th>
                  <th>สถานะเข้าสอบ</th>
                </tr>
              </tfoot>
              <tbody>
                <!--<tr class="list-group-item-action list-group-item-warning">
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
                </tr>-->
                <?php
                      $Day_stop = 0;
                      while($sql_query_subjects = mysqli_fetch_array($sql_result_subjects, MYSQLI_ASSOC)){
                        $Subjects_ID = $sql_query_subjects['ID'];
                        $Subjects_code = $sql_query_subjects['Subjects_code'];
                        $Name = $sql_query_subjects['Name'];
                        $Day = $sql_query_subjects['Day'];
                        $Time_start = $sql_query_subjects['Time_start'];
                        $Time_end = $sql_query_subjects['Time_end'];
                        $sum_time = $Time_end-$Time_start;

                          $sql_stop_day = mysqli_query($con, "SELECT * FROM holiday WHERE Day='$Day' ");
                          while($rows_sql_stop_day = mysqli_fetch_array($sql_stop_day, MYSQLI_ASSOC)){
                              $Day_stop = $sum_time+$Day_stop;
                          }
                        


                        $Time_all = $sql_query_subjects['Time_all'];
                        $Time_all_cover = ($Time_all*60)*60;
                        //echo $Time_all_cover;
                        

                        $sql_result_record = mysqli_query($con, "SELECT Hours FROM record WHERE Subjects_ID='$Subjects_ID'  AND St_id='$St_id' ");
                        $Hours_all = '0';
                        while($row_sql_record = mysqli_fetch_array($sql_result_record, MYSQLI_ASSOC)){
                          $Hours = $row_sql_record['Hours'];
                          $Hours_all = $Hours_all+$Hours;
                          //echo '>>>>>'.$Hours_all;
                        }
                        $sql_result_record_St_rfid = mysqli_query($con, "SELECT Hours FROM record WHERE Subjects_ID='$Subjects_ID'  AND St_id='$St_rfid' ");
                        while($row_sql_record_St_rfid = mysqli_fetch_array($sql_result_record_St_rfid, MYSQLI_ASSOC)){
                          $Hours = $row_sql_record_St_rfid['Hours'];
                          $Hours_all = $Hours_all+$Hours;
                        }

                        $sql_result_record_status = mysqli_query($con, "SELECT Hours FROM record WHERE Subjects_ID='$Subjects_ID' AND Status='5' ");
                        $Hours_status_all = '0';
                        while($row_record_status = mysqli_fetch_array($sql_result_record_status,MYSQLI_ASSOC)){
                          $Hours_status = $row_record_status['Hours'];
                          $Hours_status_all = $Hours_status_all+$Hours_status;
                        }
                        $persen = 20; //ขาดเรียนได้กี่เปอร์เซ็น %
                        $persen_check_status = ($Time_all_cover*$persen)/100;
                        //echo $persen_check_status;
                        $persen_check_status_sum = second_cover_hour($persen_check_status);
                        //echo $persen_check_status_sum;
                        $Hours_all_sum = second_cover_hour($Hours_all+$Day_stop);
                        
                        //หาชัวโมงที่ขาดเรียน
                        $time_kadreen = ($Hours_status_all-$Hours_all);
                        $time_kadreen_cover = second_cover_hour($time_kadreen);


                        if($time_kadreen > $persen_check_status){
                          $status_soob = "หมดสิทธิสอบ";
                          $status_css = "class='list-group-item-action list-group-item-danger'";
                        }elseif($time_kadreen <= $persen_check_status){
                          if($time_kadreen >= ($persen_check_status/2)){
                            $status_soob = "ใกล้หมดสิทธิสอบแล้ว";
                            $status_css = "class='list-group-item-action list-group-item-warning'";
                          }else{
                            $status_soob = "มีสิทธิสอบ";
                            $status_css = "";
                          }
                        }

                        echo "<tr $status_css>";
                          echo "<td style='text-align:center'>$Subjects_code </td>";
                          echo "<td>$Name</td>";
                          echo "<td style='text-align:center'>".Day_th($Day)."</td>";
                          echo "<td style='text-align:center'>$Hours_all_sum</td>";
                          echo "<td style='text-align:center'>$time_kadreen_cover</td>";
                          echo "<td style='text-align:center'>$persen_check_status_sum</td>";
                          echo "<td style='text-align:center'>$Time_all ชั่วโมง</td>";
                          echo "<td style='text-align:center'>$status_soob</td>";
                        echo "</tr>";
                        }
                ?>


              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">อัปเดตเมื่อเวลา <?php echo Time_now() ?> นาฬิกา</div>
      </div>
    </div>
    <!-- /.container-fluid-->
<!-- ตารางแสดงรายชื่อ จบ -->
<?php
require("footer.php");
?>