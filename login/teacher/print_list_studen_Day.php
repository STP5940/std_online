<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");

date_default_timezone_set("Asia/Bangkok");
$timestamp = time();
$date_time = date("Y-m-d", $timestamp);


if($_SESSION["Userlevel"] != T){
  
      Header("Location: ../");
  
  }
  $subjects_ID = filter_input(INPUT_GET, 'Subjects_ID', FILTER_SANITIZE_SPECIAL_CHARS);

  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
.titleheader {
	font-size: 24px;
	font-weight: bold;
}
.titleheader2 {
	font-size: 20px;
	font-weight: bold;
}
 </style>
</head>

<body>
<table width="85%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center">

<script>
myFunction()

function myFunction() {
    window.print();
}
</script>
<?php
$sqli_result_subjects = mysqli_query($con,"SELECT * FROM subjects WHERE ID='$subjects_ID ' ");
while($sqli_result_subjects = mysqli_fetch_array($sqli_result_subjects, MYSQLI_ASSOC)){
     $St_department = $sqli_result_subjects['St_department'];
     $St_class = $sqli_result_subjects['St_class'];
     $Name = $sqli_result_subjects['Name'];
     $Subjects_code = $sqli_result_subjects['Subjects_code'];
     $Teacher_id = $sqli_result_subjects['Teacher_id'];

     $sqli_result_user = mysqli_query($con,"SELECT Firstname,Lastname FROM user WHERE ID='$Teacher_id ' ");
     while($rows_result_user = mysqli_fetch_array($sqli_result_user, MYSQLI_ASSOC)){
          $Firstname = $rows_result_user['Firstname'];
          $Lastname = $rows_result_user['Lastname'];
     }
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40"><div align="center" class="titleheader">วิทยาลัยเทคนิคราชบุรี</div></td>
  </tr>
  </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  align="center" width="22%" rowspan="5"><img src="img/logo.png" width="140" height="140" /></td>
  </tr>
  <tr>
    <td height="42" colspan="2">ใบเช็คชื่อนักศึกษาประจำ <?php Time_th(); ?></td>
  </tr>
  <tr>
    <td colspan="2"  valign="top">รายชื่อนักศึกษาแผนกวิชา <?php echo $St_department; ?> ระดับชั้น <?php echo $St_class; ?></td>
  </tr>
  <tr>
    <td colspan="2" valign="top">วิชา <?php echo "$Name ($Subjects_code)"; ?><td>
  </tr>
  <tr>
    <td colspan="2" valign="top">อาจารย์ <?php echo $Firstname.' '.$Lastname; ?> </td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60"><div class="titleheader2">&nbsp;รายชื่อนักศึกษาที่เข้าเรียน</div></td>
  </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <td width="6%" height="70"><div align="center">ลำดับ</div></td>
  <td width="17%"><div align="center">รหัสประจำตัว</div></td>
  <td width="41%"><div align="center">ชื่อ-นามสกุล</div></td>
  <td width="19%"><div align="center">เวลาเข้าเรียน</div></td>
  <td width="17%"><div align="center">สถานะ</div></td>
  </tr>


<?php
$number = '0';
$result_subjects_ID = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID='$subjects_ID' AND Date='$date_time' ");

if(mysqli_num_rows($result_subjects_ID) >= '1'){
    while ($row_subjects_ID = mysqli_fetch_array($result_subjects_ID, MYSQLI_ASSOC)) {
      $number++;
         $St_id  =  $row_subjects_ID['St_id'];
         $record_ID  =  $row_subjects_ID['ID'];
         $record_Date = $row_subjects_ID['Date'];
         $record_Time = $row_subjects_ID['Time'];
         $record_Status = $row_subjects_ID['Status'];
         switch ($record_Status) {
          case "0":
              $record_Status = 'ขาด';
              break;
          case "1":
              $record_Status = 'เข้าเรียน';
              break;
          case "2":
              $record_Status = 'สาย';
              break;
          case "5":
              $record_Status = '';
              break;    
          default:
              //echo "ไม่มีสถานะการเข้าเรียน";
        }


         //echo $St_id."<br><hr> ";
         $result_student_St_id = mysqli_query($con, "SELECT * FROM student WHERE St_id='$St_id' OR St_rfid='$St_id' ");
         if($result_student_St_id){
            while ($row_student_St_id = mysqli_fetch_array($result_student_St_id, MYSQLI_ASSOC)) {
                 $student_St_id  =  $row_student_St_id['St_id'];
                 $student_St_rfid  =  $row_student_St_id['St_rfid'];
                 $student_Name_studen = $row_student_St_id['St_sex'].' '.$row_student_St_id['St_firstname'].' '.$row_student_St_id['St_lastname'];
                 $student_St_class = $row_student_St_id['St_class'];
                 $student_St_department = $row_student_St_id['St_department'];
                 

                 echo "<tr>";
                 echo '<td align="center" height="28">'.$number.'</td>';
                 echo "<td style=\"text-align:center\">$student_St_id</td>";
                 echo "<td>&nbsp;$student_Name_studen</td>";
                 echo "<td style=\"text-align:center\">$record_Time</td>";
                 echo "<td style='text-align:center'>$record_Status</td>";
                 echo "</tr>";

            }
          }
            
           #กรณีที่ไม่มีชื่อนักศึกษาในระบบ#
           if($St_id != $student_St_id && mysqli_num_rows($result_student_St_id) == '0'){
                 echo "<tr>";
                 echo '<td align="center" height="28">'.$number.'</td>';
                 echo "<td style=\"text-align:center\">$St_id</td>";
                 echo "<td><font size=\"3\" color=\"red\">&nbsp;ไม่พบข้อมูลนักศึกษา</font></td>";
                 echo "<td style='text-align:center'>$record_Time</td>";
                 echo "<td style='text-align:center'>$record_Status</td>";
                 echo "</tr>";
           }

    }

    $sql_no_std = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID='$subjects_ID' AND Date='$date_time' ");
    if(mysqli_num_rows($sql_no_std ) == '1'){
         echo "<tr>";
         echo "<td style='text-align:center' colspan='5'><font size='3' color='red'>ไม่พบข้อมูลนักศึกษา</font></td>";
         echo '</tr>';
        }

  }else{
    echo "<tr>";
    echo "<td style='text-align:center' colspan='5'><font size='3' color='red'>ไม่พบข้อมูลนักศึกษา</font></td>";
    echo '</tr>';
  }
  

?>
</table>
<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60"><div class="titleheader2">&nbsp;รายชื่อนักศึกษาที่ขาดเรียน</div></td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <td width="6%" height="70"><div align="center">ลำดับ</div></td>
  <td width="17%"><div align="center">รหัสประจำตัว</div></td>
  <td width="41%"><div align="center">ชื่อ-นามสกุล</div></td>
  <td width="19%"><div align="center">เวลาเข้าเรียน</div></td>
  <td width="17%"><div align="center">สถานะ</div></td>
  </tr>
<?php


$number = '0';
$sql_result_std = mysqli_query($con,"SELECT * FROM student WHERE St_class='$St_class' AND St_department='$St_department' ORDER BY St_id ASC");
while($row_sql_result_std = mysqli_fetch_array($sql_result_std, MYSQLI_ASSOC)){

  $std_inclass  = $row_sql_result_std['St_id'];
  $St_rfid  = $row_sql_result_std['St_rfid'];
  $St_sex  = $row_sql_result_std['St_sex'];
  $St_firstname  = $row_sql_result_std['St_firstname'];
  $St_lastname  = $row_sql_result_std['St_lastname'];


    $sql_result_studen_no_class = mysqli_query($con,"SELECT St_id FROM record  WHERE Subjects_ID='$subjects_ID' AND Date='$date_time' AND St_id='$std_inclass' ");
    if(mysqli_num_rows($sql_result_studen_no_class) == '0'){
      $sql_result_studen_no_class = mysqli_query($con,"SELECT St_id FROM record  WHERE Subjects_ID='$subjects_ID' AND Date='$date_time' AND St_id='$St_rfid' ");
      if(mysqli_num_rows($sql_result_studen_no_class) == '0'){
         $number++;
         echo "<tr>";
         echo '<td align="center" height="28">'.$number.'</td>';
         echo "<td style=\"text-align:center\">$std_inclass</td>";
         echo "<td><font size=\"3\" color=\"red\">&nbsp;$St_sex $St_firstname $St_lastname</font></td>";
         echo "<td style='text-align:center'>-</td>";
         echo "<td style='text-align:center'>ขาดเรียน</td>";
         echo "</tr>";
        
      }
    }


}

if($number == '0'){
  echo "<tr>";
  echo "<td style='text-align:center' colspan='5'><font size='3' color='red'>ไม่พบข้อมูลนักศึกษา</font></td>";
  echo '</tr>';
}

?>

</table>
</td>
  </tr>
</table>
</br></br></br></br>
</body>
</html>