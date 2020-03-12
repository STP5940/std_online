<?php
require_once("header.php");

$ID = filter_input(INPUT_GET, 'id_main', FILTER_SANITIZE_SPECIAL_CHARS);

$sql_result_user = mysqli_query($con, "SELECT * FROM user WHERE ID='$ID ' AND Userlevel='T' ");
if(mysqli_num_rows($sql_result_user) >= '1'){
  while($rows_sql_result_user = mysqli_fetch_array($sql_result_user , MYSQLI_ASSOC)){
     $ID = $rows_sql_result_user['ID'];
     $Username = $rows_sql_result_user['Username'];
     $sex = $rows_sql_result_user['sex'];
     $Firstname = $rows_sql_result_user['Firstname'];
     $Lastname = $rows_sql_result_user['Lastname'];
     $email = $rows_sql_result_user['email'];
     $phone = $rows_sql_result_user['phone'];
  }
}
?>

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_teacher.php">จัดการรายชื่อครูผู้สอน</a>
        </li>
        <li class="breadcrumb-item active"> แก้ไขรายชื่อครูผู้สอน</li>
      </ol>
      
<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แบบฟอร์มแก้ไขข้อมูล</div>
        <div class="card-body">
          <div class="table-responsive">
          <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_rfid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">แก้ไขข้อมูลครูผู้สอนสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                            echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ เนื่องจากมีรหัสครูผู้สอน '.$St_id.' ในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ เนื่องจากมีรหัส RFID: '.$St_rfid.' ในระบบอยู่แล้ว ! </font>';
               }
                     ?>
            




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_teacher_record.php?edit=1&id_main=<?php echo $ID; ?>" method="POST">
    

    <div align="center" >
       <h2>แก้ไขข้อมูลครูผู้สอน</h2>
    </div>

       <br>
       <div class="form-group">
       <label >รหัสครูผู้สอน</label>
       <input class="form-control" type="text" name="Username" placeholder="รหัสครูผู้สอน" value="<?php echo $Username; ?>" required>
       </div>

       <div class="form-group">
       <label >อีเมล</label>
       <input class="form-control" type="text" name="email" placeholder="example@gmail.com" value="<?php echo $email; ?>" required>
       </div>

       <div class="form-group">
       <label >เบอร์โทร</label>
       <input class="form-control" type="text" name="phone" placeholder="เบอร์โทรศัพท์" value="<?php echo $phone; ?>" required>
       </div>


       <div class="form-group">
       <label>ชื่อ-นามสกุล</label><br>
       <input class="form-control-name" type="text" name="Firstname" placeholder="ชื่อ" value="<?php echo $Firstname; ?>" required>&nbsp;
       <input class="form-control-name" type="text" name="Lastname" placeholder="นามสกุล" value="<?php echo $Lastname; ?>" required></div>


       <div class="form-group">
       <label>คำนำหน้าชื่อ</label><br>
       <label class="radio-inline">
       <input type="radio" name="sex" value="นาย" <?php if($sex == 'นาย'){ echo 'checked'; } ?> required>&nbsp;นาย</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="sex" value="นาง" <?php if($sex == 'นาง'){ echo 'checked'; } ?> required>&nbsp;นาง</input></label>&nbsp;
       <label class="radio-inline">
       <input type="radio" name="sex" value="นางสาว" <?php if($sex == 'นางสาว'){ echo 'checked'; } ?> required>&nbsp;นางสาว</input></label>&nbsp;
       </div>


       

       
<!-- เวลาจบเรียน -->
    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="แก้ไขข้อมูลครูผู้สอน" >
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



