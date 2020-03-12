
    <!-- /.content-wrapper-->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>สงวนลิขสิทธิ์เนื้อหาทั้งหมด พ.ศ. 2560 จัดทำโดย นักศึกษาวิทยาลัยเทคนิคราชบุรี <br>
          </small>
           <!--<font color='#FFFFFF'>Copyright © By Sitthipong And Tanapon</font></small>-->
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบใช้หรือไม่?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่างเพื่อยืนยันการออกจากระบบของคุณ</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="../logout.php">ออกจากระบบ</a>
          </div>
        </div>
      </div>
    </div>

   <!-- DELET Studen Modal-->
   <?php

   $sql_studen_lis = mysqli_query($con, "SELECT * FROM student");
   while($row_sql_studen_lis = mysqli_fetch_array($sql_studen_lis, MYSQLI_ASSOC)){
        $St_id = $row_sql_studen_lis['St_id'];
        $ID = $row_sql_studen_lis['ID'];
  
    echo '<div class="modal fade" id="delet'.$ID.'" tabindex="-1" role="dialog" aria-labelledby="deletLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deletLabel">คุณต้องการลบข้อมูลใช้หรือไม่?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อลบรหัสนักศึกษา '.$St_id.'</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="del_std.php?id='.$ID.'">ยืนยัน</a>
          </div>
        </div>
      </div>
    </div>';

    echo '<div class="modal fade" id="edit'.$ID.'" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editLabel">คุณต้องการแก้ไขข้อมูลใช้หรือไม่?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อแก้ไขรหัสนักศึกษา '.$St_id.'</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="edit_student_new.php?id_main='.$ID.'">ยืนยัน</a>
          </div>
        </div>
      </div>
    </div>';

  }
  ?>

  <!-- DELET teacher Modal-->
  <?php

$sql_teacher_lis = mysqli_query($con, "SELECT * FROM user WHERE Userlevel='T' ");
while($row_sql_teacher_lis = mysqli_fetch_array($sql_teacher_lis, MYSQLI_ASSOC)){
     $ID_tr_record = $row_sql_teacher_lis['ID'];
     $Username = $row_sql_teacher_lis['Username'];

 echo '<div class="modal fade" id="delet_tr'.$ID_tr_record.'" tabindex="-1" role="dialog" aria-labelledby="deletLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="deletLabel">คุณต้องการลบข้อมูลใช้หรือไม่?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อลบชื่อผู้ใช้งาน '.$Username.'</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
         <a class="btn btn-primary" href="del_teacher.php?id='.$ID_tr_record.'">ยืนยัน</a>
       </div>
     </div>
   </div>
 </div>';

 echo '<div class="modal fade" id="edit_tr'.$ID_tr_record.'" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="editLabel">คุณต้องการแก้ไขข้อมูลใช้หรือไม่?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อแก้ไขชื่อผู้ใช้งาน '.$Username.'</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      <a class="btn btn-primary" href="edit_teacher_new.php?id_main='.$ID_tr_record.'">ยืนยัน</a>
    </div>
  </div>
</div>
</div>';

}

?>


  <!-- DELET subjects Modal-->

<?php
$sql_subjects = @mysqli_query($con, "SELECT * FROM subjects WHERE Teacher_id='$ID_tr' ");
while($row_sql_subjects = mysqli_fetch_array($sql_subjects, MYSQLI_ASSOC)){
     $ID_subjects = $row_sql_subjects['ID'];
     $Name_subjects = $row_sql_subjects['Name'];
     $Teacher_id_subjects = $row_sql_subjects['Teacher_id'];
     

     echo '<div class="modal fade" id="delet_subjects'.$ID_subjects.'" tabindex="-1" role="dialog" aria-labelledby="deletsubjectsLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="deletsubjectsLabel">คุณต้องการลบตารางสอนใช้หรือไม่?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อลบตารางสอน วิชา '.$Name_subjects.'</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
         <a class="btn btn-primary" href="del_subjects.php?ID_subjects='.$ID_subjects.'">ยืนยัน</a>
       </div>
     </div>
   </div>
 </div>';


echo '<div class="modal fade" id="edit_subjects'.$ID_subjects.'" tabindex="-1" role="dialog" aria-labelledby="editsubjectsLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="editsubjectsLabel">คุณต้องการแก้ไขตารางสอนใช้หรือไม่?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body"><font size="3" color="red"><h5 style="display:inline">คำเตือน: </h5>การแก้ไขข้อมูลระหว่างเทิม อาจทำให้ระบบผิดพลาด !</font><br><br>เลือก "ยืนยัน" ด้านล่างเพื่อแก้ไขตารางสอน วิชา '.$Name_subjects.'</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      <a class="btn btn-primary" href="edit_subjects_new.php?ID_subjects='.$ID_subjects.'&ID_tr='.$Teacher_id_subjects.'">ยืนยัน</a>
    </div>
  </div>
</div>
</div>';

}



?>


 <!-- DELET holiday Modal-->
<?php
$sql_result_holiday = mysqli_query($con, "SELECT * FROM holiday");
              while($rows_sql_result_holiday = mysqli_fetch_array($sql_result_holiday, MYSQLI_ASSOC)){
                $ID_holiday = $rows_sql_result_holiday['ID'];
                $Day_holiday = $rows_sql_result_holiday['Day_holiday'];
                $Detail_holiday = $rows_sql_result_holiday['Detail_holiday'];

                echo '<div class="modal fade" id="delet_holiday'.$ID_holiday.'" tabindex="-1" role="dialog" aria-labelledby="deletholidayLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deletholidayLabel">คุณต้องการลบรายการวันหยุดใช้หรือไม่?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อลบรายการวันหยุด วันที่ '.$Day_holiday.'</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                      <a class="btn btn-primary" href="del_holiday.php?ID_holiday='.$ID_holiday.'">ยืนยัน</a>
                    </div>
                  </div>
                </div>
                </div>';


                echo '<div class="modal fade" id="edit_holiday'.$ID_holiday.'" tabindex="-1" role="dialog" aria-labelledby="editholidayLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editholidayLabel">คุณต้องการแก้ไขรายการวันหยุดใช้หรือไม่?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อแก้ไขรายการวันหยุด วันที่ '.$Day_holiday.'</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                      <a class="btn btn-primary" href="edit_holiday_new.php?ID_holiday='.$ID_holiday.'">ยืนยัน</a>
                    </div>
                  </div>
                </div>
                </div>';

              }

            

?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
