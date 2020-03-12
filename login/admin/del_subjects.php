<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$ID = filter_input(INPUT_GET, 'ID_subjects', FILTER_SANITIZE_SPECIAL_CHARS);
echo $ID;

$result_subjects = mysqli_query($con, "SELECT ID,Teacher_id FROM subjects WHERE ID='$ID' ");
while($rows_result_subjects = mysqli_fetch_array($result_subjects, MYSQLI_ASSOC)){
    $Teacher_id = $rows_result_subjects['Teacher_id'];
}
if(mysqli_num_rows($result_subjects ) >= '1'){
    $result_delet = mysqli_query($con, "DELETE FROM subjects WHERE ID='$ID' ");
    Header("Location: add_subjects_teacher.php?confirm=1&ID_tr=$Teacher_id");
}else{
    Header("Location: add_subjects.php?confirm=0");
}

?>