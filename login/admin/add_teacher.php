<?php
require_once("header.php");

#
?>

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item active">จัดการรายชื่อครูผู้สอน</li>
      </ol>
      
<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> เพิ่ม-แก้ไข-ลบ รายชื่อครูผู้สอน</div>

          <div class="card-body">
             <div class="row">
               <div class="col-sm-2 text-center my-auto">
                  <a  class="fa fa-plus btn btn-primary" href="add_teacher_new.php"> เพิ่มรายชื่อครูผู้สอน</a>
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
                  <th style="text-align:center">ลำดับที่</th>
                  <th style="text-align:center">ชื่อผู้ใช้งาน</th>
                  <th style="text-align:center">ชื่อ-นามสกุล</th>
                  <th style="text-align:center">E-mail</th>
                  <th style="text-align:center">เบอร์โทร</th>
                  <th style="text-align:center">แก้ไข/ลบ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">ลำดับที่</th>
                  <th>ชื่อผู้ใช้งาน</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>E-mail</th>
                  <th>เบอร์โทร</th>
                  <th>แก้ไข/ลบ</th>
                </tr>
              </tfoot>
              <tbody>

              <?php
                    
                    $Number = '0';
                    $sql_result_student = mysqli_query($con, "SELECT * FROM user WHERE Userlevel='T' ");
                    if(mysqli_num_rows($sql_result_student) >= '1'){

                       while($rows_sql_result_student = mysqli_fetch_array($sql_result_student, MYSQLI_ASSOC)){
                             $ID_tr = $rows_sql_result_student['ID'];
                             $Username = $rows_sql_result_student['Username'];
                             $Name_ter = $rows_sql_result_student['sex'].' '.$rows_sql_result_student['Firstname'].' '.$rows_sql_result_student['Lastname'];
                             $email = $rows_sql_result_student['email'];
                             $phone = $rows_sql_result_student['phone'];

                             $Number++;
                             echo "<tr>";
                             echo "<td style='text-align:center'>$Number</td>";
                             echo "<td style='text-align:center'><a href='http://182.93.148.91/files/importpicstd/01/$Username.jpg' title='ดูรูปนักศึกษา' >$Username</a></td>";
                             echo "<td>$Name_ter</td>";
                             echo "<td>$email</td>";
                             echo "<td>$phone</td>";
                             echo "<td style='text-align:center'><a data-toggle='modal' data-target='#edit_tr$ID_tr'><button class='btn btn-primary fa fa-pencil-square-o' type='submit'></button></a>&ensp;<a data-toggle='modal' data-target='#delet_tr$ID_tr'><button class='btn btn-danger fa fa-times' type='submit'></button></a></td>";
                             echo "</tr>";


                       }
                    }else{
                        echo '<tr>';
                        echo"<td style='text-align:center' colspan='6'><font size='3' color='red'>ไม่พบข้อมูลนักศึกษา</font></td>";
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



