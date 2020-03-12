<?php
require_once("header.php");
?>

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_teacher.php">จัดการรายชื่อครูผู้สอน</a>
        </li>
        <li class="breadcrumb-item active"> เพิ่มรายชื่อครูผู้สอน</li>
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
                            echo '<font size="3" color="#008000">เพิ่มข้อมูลครูผู้สอนสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                            echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ เนื่องจากมีรหัสครูผู้สอน '.$St_id.' ในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ ! </font>';
                     }
                     ?>
            




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_teacher_record.php" method="POST">
    

    <div align="center" >
       <h2>เพิ่มข้อมูลครูผู้สอน</h2>
    </div>

       <br>
       <div class="form-group">
       <label >รหัสครูผู้สอน</label>
       <input class="form-control" type="text" name="Username" placeholder="รหัสครูผู้สอน" required>
       </div>

       <div class="form-group">
       <label >อีเมล</label>
       <input class="form-control" type="text" name="email" placeholder="example@gmail.com" required>
       </div>

       <div class="form-group">
       <label >เบอร์โทร</label>
       <input class="form-control" type="text" name="phone" placeholder="เบอร์โทรศัพท์" required>
       </div>


       <div class="form-group">
       <label>ชื่อ-นามสกุล</label><br>
       <input class="form-control-name" type="text" name="Firstname" placeholder="ชื่อ" required>&nbsp;
       <input class="form-control-name" type="text" name="Lastname" placeholder="นามสกุล" required></div>

       <div class="form-group">
       <label>คำนำหน้าชื่อ</label><br>
       <label class="radio-inline">
       <input type="radio" name="sex" value="นาย" required>&nbsp;นาย</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="sex" value="นาง" required>&nbsp;นาง</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="sex" value="นางสาว" required>&nbsp;นางสาว</input></label>&nbsp;
       </div>


       

       
<!-- เวลาจบเรียน -->
    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="บันทึกข้อมูลครูผู้สอน" >
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



