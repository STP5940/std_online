<?php
require_once("header.php");

#
?>

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item active"> จัดการรายชื่อนักศึกษา</li>
      </ol>
      
<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> เพิ่ม-แก้ไข-ลบ รายชื่อนักศึกษา</div>

          <div class="card-body">
             <div class="row">
               <div class="col-sm-2 text-center my-auto">
                  <a  class="fa fa-plus btn btn-primary" href="add_student_new.php"> เพิ่มข้อมูลนักศึกษา</a>
               </div>       
               <div class="col-sm-2 text-center my-auto">
                  <a  class="fa fa-print btn btn-warning" href="print_studen.php"> พิมรายชื่อนักศึกษา</a>
               </div>   
                 <!-- ยืนยันการลบข้อมูล -->
                 <div class="col-sm-2 text-center my-auto">
                     <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">ลบข้อมูลสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                        echo '<font size="3" color="red">ลบข้อมูลไม่สำเร็จ ! </font>';
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
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th style="text-align:center">รหัสบัตร RFID</th>
                  <th style="text-align:center">ชื่อ-นามสกุล</th>
                  <th style="text-align:center">ชั้น/ห้อง</th>
                  <th style="text-align:center">สาขา</th>
                  <th style="text-align:center">แก้ไข/ลบ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th>รหัสบัตร RFID</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ชั้น/ห้อง</th>
                  <th>สาขา</th>
                  <th>แก้ไข/ลบ</th>
                </tr>
              </tfoot>
              <tbody>

              <?php
                    $sql_result_student = mysqli_query($con, "SELECT * FROM student");
                    if(mysqli_num_rows($sql_result_student) >= '1'){

                       while($rows_sql_result_student = mysqli_fetch_array($sql_result_student, MYSQLI_ASSOC)){
                             $ID = $rows_sql_result_student['ID'];
                             $St_id = $rows_sql_result_student['St_id'];
                             $St_rfid = $rows_sql_result_student['St_rfid'];
                             $Name_std = $rows_sql_result_student['St_sex'].' '.$rows_sql_result_student['St_firstname'].' '.$rows_sql_result_student['St_lastname'];
                             $St_class = $rows_sql_result_student['St_class'];
                             $St_department = $rows_sql_result_student['St_department'];

                             echo "<tr>";
                             echo "<td style='text-align:center'><a href='http://182.93.148.91/files/importpicstd/01/$St_id.jpg' title='ดูรูปนักศึกษา' >$St_id</a></td>";
                             echo "<td style='text-align:center'>$St_rfid</td>";
                             echo "<td>$Name_std</td>";
                             echo "<td>$St_class</td>";
                             echo "<td>$St_department</td>";
                             echo "<td style='text-align:center'><a data-toggle='modal' data-target='#edit$ID'><button class='btn btn-primary fa fa-pencil-square-o' type='submit'></button></a>&ensp;<a data-toggle='modal' data-target='#delet$ID'><button class='btn btn-danger fa fa-times' type='submit'></button></a></td>";
                             echo "</tr>";


                       }
                    }else{
                        echo '<tr>';
                        echo"<td style='text-align:center' colspan='5'><font size='3' color='red'>ไม่พบข้อมูลนักศึกษา</font></td>";
                        echo '</tr>';
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



