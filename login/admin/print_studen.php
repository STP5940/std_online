<?php
require("header.php");
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_studen.php">จัดการรายชื่อนักศึกษา</a>
        </li>
        <li class="breadcrumb-item active"> พิมพ์รายชื่อนักศึกษา</li>
      </ol>
      
<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-print"></i> พิมพ์รายชื่อนักศึกษา</div>
        <div class="card-body">
          <div class="table-responsive">
          <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                     $St_rfid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">เพิ่มข้อมูลนักศึกษาสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                            echo '<font size="3" color="red">เพิ่มข้อมูลไม่สำเร็จ เนื่องจากมีรหัสนักศึกษา '.$St_id.' ในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">เพิ่มข้อมูลไม่สำเร็จ เนื่องจากมีรหัส RFID: '.$St_rfid.' ในระบบอยู่แล้ว ! </font>';
               }
                     ?>
            




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="print_studen_out.php" method="POST">
    

    <div align="center" >
       <h2>พิมพ์รายชื่อนักศึกษา</h2>
    </div>

       <br>
       <div class="form-group">
       <label>ระดับชั้น </label>
       <select name="St_class_one" required>
       <label class="radio-inline">
            <option value="" disabled selected>กรุณาเลือก</option>
            <option value="ปวช.1">ปวช.1</option>
            <option value="ปวช.2">ปวช.2</option>
            <option value="ปวช.3">ปวช.3</option>
            <option value="ปวส.1">ปวส.1</option>
            <option value="ปวส.2">ปวส.2</option>
       </label>
       </select>

    
       <label>ห้อง </label>
       <select name="St_class_sub" required>
            <option value="" disabled selected>กรุณาเลือก</option>
        <?php
            for ($room = 1; $room <= 10; $room++) { 
                   echo "<option value='".$room."'>".$room."</option>";
            }
        ?>
       </select>


       <label>แผนก </label>
       <select name="St_department" required>
       <label class="radio-inline">
            <option value="" disabled selected>กรุณาเลือก</option>
            <?php $sqli_rusult_department = mysqli_query($con ,"SELECT Name FROM department ORDER BY Name ASC ");
            while($row_sqli_rusult_department = mysqli_fetch_array($sqli_rusult_department, MYSQLI_ASSOC)){
                  $Name_department = $row_sqli_rusult_department['Name'];
                  echo '<option value="'.$Name_department.'">'.$Name_department.'</option>';
            }
            ?>
       </label>
       </select>

       </div>

       
<!-- เวลาจบเรียน -->
    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="พิมพ์รายชื่อ" >
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

<?php
require("footer.php");
?>