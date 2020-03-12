<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkteacher();

$subjects_ID = filter_input(INPUT_GET, 'subjects_ID', FILTER_SANITIZE_SPECIAL_CHARS);
$delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_SPECIAL_CHARS);
$result_delet = mysqli_query($con, "DELETE FROM record WHERE ID='".$delete."' ");
if($result_delet){
    echo '1';
}else{
    echo '0';
}
Header("Location: index.php?subjects_ID=$subjects_ID");
?>