<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");

if(isset($_SESSION["Userlevel"]) != 'T'){

    Header("Location: ../");

}

require("header.php");
?>



     <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">ตารางสอน</a>
        </li>
      </ol>

<!-- Example Bar Chart Card-->
          <div class="card mb-3">


<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ตารางสอน</div>
          


           <!--<div class="card-body">
             <div class="row">
               <div class="col-sm-2 text-center my-auto">
                  <a  class="fa fa-plus btn btn-primary" href="add_information_subjects.php"> เพิ่มตารางสอน</a>
               </div>           
            </div>
          </div>-->


<script>
// When the user clicks on div, open the popup แสดง pop รหัสนักศึกษา
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");    
}
</script>


        <div class="card-body">
          <div class="table-responsive">
          
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align:center">รหัสวิชา</th>
                  <th style="text-align:center">ชื่อวิชา</th>
                  <th style="text-align:center">ชั้น/ห้อง</th>
                  <th style="text-align:center">วันสอน</th>
                  <th style="text-align:center">เวลาสอน</th>
                  <!--<th style="text-align:center">แก้ไข/ลบ</th>-->
                  <th style="text-align:center">เช็คชื่อ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">รหัสวิชา</th>
                  <th>ชื่อวิชา</th>
                  <th>ชั้น/ห้อง</th>                
                  <th>วันสอน</th>
                  <th>เวลาสอน</th>
                  <!--<th>แก้ไข/ลบ</th>-->
                  <th>เช็คชื่อ</th>
                </tr>
              </tfoot>
              <tbody>

              <!--<div class="popup" onmouseover="myFunction()" onmouseout="myFunction()">3000-2003<span class="popuptext" id="myPopup">A Simple Popup!</span></div>-->

                <!--<tr class="list-group-item-action list-group-item-danger">
                  <td style="text-align:center"><div class="popup" onmouseover="myFunction()" onmouseout="myFunction()">3000-2003<span class="popuptext" id="myPopup">เวลา 10:30-10:40</span></div></td>
                  <td><font size="3" color="red">วิทยาศาสตร์และเทคโนโลยี</font></td>
                  <td>ปวส.2/1</td>
                  <td>10:32:50</td>
                  <td style="text-align:center"><a data-toggle="modal" data-target="#delet"><button class="btn btn-primary fa fa-pencil-square-o" type="submit"></button>&ensp;<a data-toggle="modal" data-target="#delet"><button class="btn btn-danger fa fa-times" type="submit"></button></td>
                  <td><a data-toggle="modal" data-target="#delet"><button class="btn btn-danger btn-block fa fa-arrow-circle-right" type="submit"></button></td>
                </tr>-->

              <?php

              $result_subjects = mysqli_query($con, "SELECT * FROM subjects WHERE Teacher_id='".$_SESSION["ID"]."' ");
                
              if($result_subjects){

                while($row_subjects = mysqli_fetch_array($result_subjects, MYSQLI_ASSOC)){
                  $subjects_ID = $row_subjects['ID'];
                  $subjects_code = $row_subjects['Subjects_code'];
                  $subjects_Name = $row_subjects['Name'];
                  $subjects_Time_start = $row_subjects['Time_start'];
                  $subjects_Time_end = $row_subjects['Time_end'];
                  $subjects_Teacher_id = $row_subjects['Teacher_id'];
                  $subjects_Day = $row_subjects['Day'];
                  $St_class = $row_subjects['St_class'];
                  

                  echo "<tr>";
                  echo '<td style="text-align:center"><div class="popup" onmouseover="myFunction'.$subjects_ID.'()" onmouseout="myFunction'.$subjects_ID.'()">'.$subjects_code.'<span class="popuptext" id="myPopup'.$subjects_ID.'">เวลา '; echo second_cover_return($subjects_Time_start); echo '-'; echo second_cover_return($subjects_Time_end); echo '</span></div></td>';
                  echo "<td>$subjects_Name</td>";
                  echo "<td>$St_class</td>";
                  echo '<td style="text-align:center">'; echo Day_th($subjects_Day); echo'</td>';
                  echo '<td style="text-align:center">'; echo second_cover_return($subjects_Time_start).'-'.second_cover_return($subjects_Time_end); echo'</td>';
                  //echo '<td style="text-align:center"><a data-toggle="modal" data-target="#delet"><button class="btn btn-primary fa fa-pencil-square-o" type="submit"></button></a>&ensp;<a data-toggle="modal" data-target="#delet'.$subjects_ID.'"><button class="btn btn-danger fa fa-times" type="submit"></button></a></td>';
                  echo '<td><a href="index.php?subjects_ID='.$subjects_ID.'"><button class="btn btn-success btn-block fa fa-arrow-circle-right" type="submit"></button></a></td>';
                  echo "</tr>";

                  echo "<script>";
                  echo "function myFunction$subjects_ID() {";
                  echo 'var popup'.$subjects_ID.' = document.getElementById("myPopup'.$subjects_ID.'");';
                  echo 'popup'.$subjects_ID.'.classList.toggle("show");';
                  echo "}";
                  echo "</script>";

                }

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
require("footer.php");
?>
