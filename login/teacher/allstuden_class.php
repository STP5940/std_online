<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
Checkteacher();
function numstd($ID){
    
    $subjects_ID = filter_input(INPUT_GET, 'subjects_ID', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $sql_subjects = "SELECT St_class FROM subjects WHERE ID='$subjects_ID' ";
    $result_subjects = mysqli_query($con,$sql_subjects);
    //print_r($result_subjects);
    if($result_subjects){
        while($row_result_subjects = mysqli_fetch_array($result_subjects, MYSQLI_ASSOC)){
                $St_class =  $row_result_subjects['St_class'];
    
                ##################  ดึงรายชื่อนักเรียนที่ตรงกับตารางสอน  ##################
                $result_list_studen = mysqli_query($con, "SELECT ID FROM student WHERE St_class='$St_class' ");
                //print_r($result_list_studen);
                if(mysqli_num_rows($result_list_studen) >= '1'){
                    echo mysqli_num_rows($result_list_studen);
                }else{
                    echo 'ไม่พบรายชื่อนักศึกษาชั้นนี้';
                }
    
            }
    }else{
        echo 'ไม่พบข้อมูล';
    }

}
?>