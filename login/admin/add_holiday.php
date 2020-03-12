<?php
require_once("header.php");
?>
 
<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item active"> เพิ่มวันหยุดนักขัตฤกษ์</li>
      </ol>
      
<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> เพิ่ม-แก้ไข-ลบ รายการวันหยุดนักขัตฤกษ์</div>

          <div class="card-body">
             <div class="row">
               <div class="col-sm-2 text-center my-auto">
                  <a  class="fa fa-plus btn btn-primary" href="add_holiday_new.php"> เพิ่มวันหยุดนักขัตฤกษ์</a>
               </div>       
                 <!-- ยืนยันการลบข้อมูล -->
                 <div class="col-sm-2 text-center my-auto">
                     <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">ลบข้อมูลสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                        echo '<font size="3" color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลบข้อมูลไม่สำเร็จ ! </font>';
                     }
                     ?>
                 </div>
                 <!-- จบยืนยันการลบข้อมูล -->
            </div>
          </div>
          


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align:center">ลำดับที่</th>
                  <th style="text-align:center">วัน</th>
                  <th style="text-align:center">วันที่/เดือน/ปี</th>
                  <th style="text-align:center">รายละเอียดวันหยุด</th>
                  <th style="text-align:center">แก้ไข/ลบ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">ลำดับที่</th>
                  <th>วันปี</th>
                  <th>วันที่/เดือน/ปี</th>
                  <th>รายละเอียดวันหยุด</th>
                  <th>แก้ไข/ลบ</th>
                </tr>
              </tfoot>
              <tbody>
          <?php 
          $sql_result_holiday = mysqli_query($con, "SELECT * FROM holiday");
          $Number_holiday = '0';
          if(mysqli_num_rows($sql_result_holiday) >= '1'){
              while($rows_sql_result_holiday = mysqli_fetch_array($sql_result_holiday, MYSQLI_ASSOC)){
                $ID_holiday = $rows_sql_result_holiday['ID'];
                $Day_holiday = $rows_sql_result_holiday['Day_holiday'];
                $Days_holiday = $rows_sql_result_holiday['Day'];
                $Detail_holiday = $rows_sql_result_holiday['Detail_holiday'];


                
                switch ($Days_holiday) {
                  case "Sunday":
                       $Days_holiday = 'วันอาทิตย์';
                      break;
                  case "Monday":
                      $Days_holiday = 'วันจันทร์';
                      break;
                  case "Tuesday":
                     $Days_holiday = 'วันอังคาร';
                      break;
                  case "Wednesday":
                      $Days_holiday = 'วันพุธ';
                      break;
                  case "Thursday":
                     $Days_holiday = 'วันพฤหัสบดี';
                      break;
                  case "Friday":
                     $Days_holiday = 'วันศุกร์';
                      break;
                  case "Saturday":
                     $Days_holiday = 'วันเสาร์';
                      break;
                  default:
                      echo "ไม่พบข้อมูล";
                }

                $Number_holiday++;

          echo "<tr>
                  <td style='text-align:center'>$Number_holiday</td>
                  <td style='text-align:center'>$Days_holiday</td>
                  <td style='text-align:center'>$Day_holiday</td>
                  <td style='text-align:center'>$Detail_holiday</td>
                  <td style='text-align:center'><a data-toggle='modal' data-target='#edit_holiday$ID_holiday'><button class='btn btn-primary fa fa-pencil-square-o' type='submit'></button></a>&ensp;<a data-toggle='modal' data-target='#delet_holiday$ID_holiday'><button class='btn btn-danger fa fa-times' type='submit'></button></a></td>
                </tr>";

              }
          }else{
            echo "<tr>
            <td style='text-align:center' colspan='4'><font size='3' color='red'>ไม่พบข้อมูลนักศึกษา</font></td>
          </tr>";
          }

            ?>

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
require_once("footer.php");
?>