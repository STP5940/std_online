<?php
session_start();
require("../../config/connection.php");
require("../../config/function.php");

Checkteacher();

$delete_subjects = filter_input(INPUT_GET, 'delete_subjects', FILTER_SANITIZE_SPECIAL_CHARS);

$id_user = $_SESSION["ID"];

$result_del_subjects = mysqli_query($con, "DELETE FROM subjects WHERE Teacher_id = '$id_user' AND ID='$delete_subjects' ");

if($result_del_subjects){
    Header("Location: index.php");
}else{
    echo "คุณไม่มีสิทธิในการลบตารางนี้";
}

?>