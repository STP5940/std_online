<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$ID = filter_input(INPUT_GET, 'ID_holiday', FILTER_SANITIZE_SPECIAL_CHARS);

$result_holiday = mysqli_query($con, "SELECT ID FROM holiday WHERE ID='$ID' ");
if(mysqli_num_rows($result_holiday ) >= '1'){
    $result_delet = mysqli_query($con, "DELETE FROM holiday WHERE ID='$ID' ");
    Header("Location: add_holiday.php?confirm=1");
}else{
    Header("Location: add_holiday.php?confirm=0");
}

?>