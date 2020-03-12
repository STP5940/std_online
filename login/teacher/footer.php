
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


    <!-- Logout Modal ป็อบอัปออกจากระบบ-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบใช้หรือไม่?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่างเพื่อยืนยันการออกจากระบบ</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="../logout.php">ออกจากระบบ</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Delet Modal ป็อบอัปลบข้อมูล-->
    <div class="modal fade" id="delet" tabindex="-1" role="dialog" aria-labelledby="deletLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deletLabel">คุณต้องการลบข้อมูลใช้หรือไม่?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ยืนยัน" ด้านล่างเพื่อยืนยันการลบข้อมูลของคุณ</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="../../delet_table.php">ยืนยัน</a>
          </div>
        </div>
      </div>
    </div>

<?php

$result_del_record = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID='".$subjects_ID."' ");

if($result_del_record){
  while ($row_del_record = mysqli_fetch_array($result_del_record, MYSQLI_ASSOC)) {
        
    $record_ID  =  $row_del_record['ID'];
    $St_id  =  $row_del_record['St_id'];
    
        #Delet Modal ป็อบอัปลบข้อมูล#
        echo '<div class="modal fade" id="delet'.$record_ID.'" tabindex="-1" role="dialog" aria-labelledby="deletLabel" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="deletLabel">คุณต้องการลบข้อมูลใช้หรือไม่?</h5>';
        echo '<button class="close" type="button" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">×</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">ยืนยันการลบรหัสนักศึกษา '.$St_id.' ออกจากระบบ</div>';
        echo '<div class="modal-footer">';
        echo '<button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>';
        echo "<a class=\"btn btn-primary\" href=\"delet_table.php?subjects_ID=$subjects_ID&delete=$record_ID \">ยืนยัน</a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

  }
}

?>

<?php
/*
$result_del_subjects = mysqli_query($con, "SELECT * FROM subjects WHERE Teacher_id='".$_SESSION["ID"]."' ");

if($result_del_subjects){
  while ($row_del_subjects = mysqli_fetch_array($result_del_subjects, MYSQLI_ASSOC)) {
        
    $subjects_ID  =  $row_del_subjects['ID'];
        #Delet Modal ป็อบอัปลบข้อมูล#
        echo '<div class="modal fade" id="delet'.$subjects_ID.'" tabindex="-1" role="dialog" aria-labelledby="deletLabel" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="deletLabel">คุณต้องการลบข้อมูลใช้หรือไม่?</h5>';
        echo '<button class="close" type="button" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">×</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">ยืนยันการลบรหัสนักศึกษา '.$St_id.' ออกจากระบบ</div>';
        echo '<div class="modal-footer">';
        echo '<button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>';
        echo "<a class=\"btn btn-primary\" href=\"delet_subjects.php?delete_subjects=$subjects_ID \">ยืนยัน</a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

  }
}
*/
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