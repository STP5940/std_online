<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$ID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$result_student = mysqli_query($con, "SELECT ID FROM student WHERE ID='$ID' ");
if(mysqli_num_rows($result_student ) >= '1'){
    $result_delet = mysqli_query($con, "DELETE FROM student WHERE ID='$ID' ");
    Header("Location: add_studen.php?confirm=1");
}else{
    Header("Location: add_studen.php?confirm=0");
}

?>