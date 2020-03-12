<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");

if($_SESSION["Userlevel"] != T){

    Header("Location: ../");

}

$lg_code = $_POST['lg_code'];
$lg_name = $_POST['lg_name'];
$st_class = $_POST['st_class'];
$st_room = $_POST['st_room'];
$lg_days = $_POST['lg_days'];

$lg_start_hour = $_POST['lg_start_hour'];
$lg_start_minute = $_POST['lg_start_minute'];
$lg_stop_hour = $_POST['lg_stop_hour'];
$lg_stop_minute = $_POST['lg_stop_minute'];
$lg_learning_time = $_POST['lg_learning_time'];

$lg_day_end = $_POST['lg_day_end'];
$lg_Month_end = $_POST['lg_Month_end'];
$lg_year_end = $_POST['lg_year_end'];

/*
echo "$lg_code<br>";
echo "$lg_name<br>";
echo "$st_class<br>";
echo "$st_room<br>";
echo "$lg_days<br>";

echo "$lg_start_hour<br>";
echo "$lg_start_minute<br>";
echo "$lg_stop_hour<br>";
echo "$lg_stop_minute<br>";
echo "$lg_learning_time<br>";

echo "$lg_day_end<br>";
echo "$lg_Month_end<br>";
echo "$lg_year_end<br>";
*/

$start_hour = $lg_start_hour.':'.$lg_start_minute.':00<br>';
$start_hour_cover = Time_cover($start_hour);

$stop_hour = $lg_stop_hour.':'.$lg_stop_minute.':00<br>';
$stop_hour_cover = Time_cover($stop_hour);

$id_teacher = $_SESSION["ID"];

$Class = $st_class.'/'.$st_room;


$result_insert_to_record = mysqli_query($con, "INSERT INTO subjects (Subjects_code, Name, Time_start, Time_end, Time_all, Teacher_id, Day, St_class) VALUES ('$lg_code','$lg_name','$start_hour_cover','$stop_hour_cover','$lg_learning_time','$id_teacher','$lg_days','$Class')");

if($result_insert_to_record){
    Header("Location: ../");
}else{
    echo 'เพิ่มข้อมูลไม่สำเร็จ !';
}

?>