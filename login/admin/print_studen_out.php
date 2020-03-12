<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");

date_default_timezone_set("Asia/Bangkok");
$timestamp = time();
$date_time = date("Y-m-d", $timestamp);


if($_SESSION["Userlevel"] != A){
  
      Header("Location: ../");
  
  }
  $St_class_one = filter_input(INPUT_POST, 'St_class_one', FILTER_SANITIZE_SPECIAL_CHARS);
  $St_class_sub = filter_input(INPUT_POST, 'St_class_sub', FILTER_SANITIZE_SPECIAL_CHARS);
  $St_class = $St_class_one.'/'.$St_class_sub;
  $St_department = filter_input(INPUT_POST, 'St_department', FILTER_SANITIZE_SPECIAL_CHARS);

  if($St_class_one == '' || $St_class_sub == '' || $St_department == ''){
    Header("Location: print_studen.php");
  }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ใบรายชื่อนักศึกวิทยาลัยเทคนิคราชบุรี</title>

<style type="text/css">
.titleheader {
	font-size: 24px;
	font-weight: bold;
}
.titleheader2 {
	font-size: 18px;
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<br>
  <tr>
    <td colspan="2"  align="center" ><img src="img/logo.png" width="140" height="140" /></td>
  </tr>
  </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" class="titleheader"><div align="center">วิทยาลัยเทคนิคราชบุรี</div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60"><div class="titleheader2">&nbsp;รายชื่อนักศึกระดับชั้น <?php echo $St_class ?> แผนกวิชา <?php echo $St_department; ?></div></td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="6%" height="70"><div align="center">ลำดับ</div></td>
     <td width="17%"><div align="center">รหัสประจำตัว</div></td>
     <td width="39%"><div align="center">ชื่อ - นามสกุล</div></td>
     <td width="14%"><div align="center">ระชั้นการศึกษา</div></td>
    <td width="24%"><div align="center">แผนกวิชา</div></td>
  </tr>

<?php
$sql_result_student = mysqli_query($con, "SELECT * FROM student WHERE St_class='$St_class' AND St_department='$St_department' ORDER BY St_id ASC");
if(mysqli_num_rows($sql_result_student) == 0){
    echo '<tr><td style="text-align:center" colspan="5"><font size="3" color="red">ไม่พบข้อมูลนักศึกษา</font></td></tr>';
}else{
    $Number = 0;
    while($rows_sql_result_student = mysqli_fetch_array($sql_result_student,MYSQLI_ASSOC)){
        $Number++;
        $St_id = $rows_sql_result_student['St_id'];
        $St_sex = $rows_sql_result_student['St_sex'];

        if($St_sex == 'นางสาว'){
            $St_sex = 'น.ส.';
        }

        $St_firstname = $rows_sql_result_student['St_firstname'];
        $St_lastname = $rows_sql_result_student['St_lastname'];
        $Name_studen = $St_sex.'&nbsp;&nbsp;'.$St_firstname;
        $St_class = $rows_sql_result_student['St_class'];
        $St_department = $rows_sql_result_student['St_department'];

        echo '<tr>';
        echo '  <td align="center" height="28">'.$Number.'</td>';
        echo '  <td style="text-align:center">'.$St_id.'</td>';
        echo '  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                         <td width="47%">'.$Name_studen.'</td>
                         <td width="53%">'.$St_lastname.'</td>
                     </tr>
                </table></td>';
        echo '  <td style="text-align:center">'.$St_class.'</td>';
        echo '  <td style="text-align:center">'.$St_department.'</td>';
        echo '</tr>';
    }
}
?>

</table>

</td>
  </tr>
</table>
</br></br></br></br>
</body>
</html>