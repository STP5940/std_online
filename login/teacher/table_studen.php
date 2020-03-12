<?php
if($_SESSION["Userlevel"] != T){

  Header("Location: ../");

}
$subjects_ID = filter_input(INPUT_GET, 'subjects_ID', FILTER_SANITIZE_SPECIAL_CHARS);

$result_subjects_ID = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID='".$subjects_ID."' ");

if($result_subjects_ID){
    while ($row_subjects_ID = mysqli_fetch_array($result_subjects_ID, MYSQLI_ASSOC)) {
         $St_id  =  $row_subjects_ID['St_id'];

         //echo $St_id."<br><hr> ";
         $result_student_St_id = mysqli_query($con, "SELECT * FROM student WHERE St_id='$St_id' ");
         if($result_student_St_id){
            while ($row_student_St_id = mysqli_fetch_array($result_student_St_id, MYSQLI_ASSOC)) {
                 $student_St_id  =  $row_student_St_id['St_id'];
                 $student_Name_studen = $row_student_St_id['St_sex'].$row_student_St_id['St_firstname'].$row_student_St_id['St_lastname'];
                 $student_St_class = $row_student_St_id['St_class'];
        
                 echo $student_St_id." ".$student_Name_studen." ".$student_St_class."<br><hr> ";
                 
            }
          }
            
           #กรณีที่ไม่มีชื่อนักศึกษาในระบบ#
           if($St_id != $student_St_id){
                 echo $St_id."  ไม่มีชื่อนักศึกษาอยู่ในระบบ<br><hr> ";
           }

    }
  }

?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th style="text-align:center">ชื่อ-นามสกุล</th>
                  <th style="text-align:center">ชั้น/ห้อง</th>
                  <th style="text-align:center">สาขา</th>
                  <th style="text-align:center">วัน-เวลา</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ชั้น/ห้อง</th>
                  <th>สาขา</th>
                  <th>วัน-เวลา</th>
                </tr>
              </tfoot>
              <tbody>




                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041001.jpg" title="ดูรูปนักศึกษา" >5932041001</a></td>
                  <td>นายกรอบทอง ศรีพิจารย์</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:50</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041002.jpg" title="ดูรูปนักศึกษา" >5932041002</a></td>
                  <td>นางสาวกัญญารัตน์ เกิดดี</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:40</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041003.jpg" title="ดูรูปนักศึกษา" >5932041003</a></td>
                  <td>นายจิติวัฒนา รุ่งพิทยานนท์</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:45</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041004.jpg" title="ดูรูปนักศึกษา" >5932041004</a></td>
                  <td>นางสาวจิราภรณ์ พวงเข็มแดง</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:50</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041027.jpg" title="ดูรูปนักศึกษา" >5932041027</a></td>
                  <td>นายสิทธิพงษ์ เส็งดอนไพร</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-success">
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041028.jpg" title="ดูรูปนักศึกษา" >5932041028</td>
                  <td >นางสาวสิริภัทร เถาว์น้อย</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:20</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041029.jpg" title="ดูรูปนักศึกษา" >5932041029</td>
                  <td>นางสาวสิริรักษ์ ทับแก้ว</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:30</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041030.jpg" title="ดูรูปนักศึกษา" >5932041030</td>
                  <td>นางสาวสุชาดา เต็กสุวรรณ</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:31:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-warning">
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
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041033.jpg" title="ดูรูปนักศึกษา" >5932041033</td>
                  <td>นายอริญชย์ ทองจาด</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:32:50</td>
                </tr>


              </tbody>
            </table>