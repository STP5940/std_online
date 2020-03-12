<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$ID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$result_teacher = mysqli_query($con, "SELECT ID FROM user WHERE ID='$ID' AND Userlevel='T' ");
if(mysqli_num_rows($result_teacher ) >= '1'){
    $result_delet = mysqli_query($con, "DELETE FROM user WHERE ID='$ID' ");
    Header("Location: add_teacher.php?confirm=1");
}else{
    Header("Location: add_teacher.php?confirm=0");
}

?>