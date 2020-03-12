<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");

if($_SESSION["Userlevel"] != T){

  Header("Location: ../");

}

$subjects_ID = "1";

$result_subjects_ID = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID='".$subjects_ID."' ");

if($result_subjects_ID){
    while ($row_subjects_ID = mysqli_fetch_array($result_subjects_ID, MYSQLI_ASSOC)) {
         $St_id  =  $row_subjects_ID['St_id'];

         //echo $St_id."<br><hr> ";
         $result_student_St_id = mysqli_query($con, "SELECT * FROM student WHERE St_id='$St_id' ");
         if($result_student_St_id){
            while ($row_student_St_id = mysqli_fetch_array($result_student_St_id, MYSQLI_ASSOC)) {
                 $student_St_id  =  $row_student_St_id['St_id'];
                 $student_Name_studen = $row_student_St_id['St_sex'].$row_student_St_id['St_firstname'].$row_student_St_id['St_lastname'];
                 $student_St_class = $row_student_St_id['St_class'];
        
                 echo $student_St_id." ".$student_Name_studen." ".$student_St_class."<br><hr> ";
                 
            }
          }
            
           #กรณีที่ไม่มีชื่อนักศึกษาในระบบ#
           if($St_id != $student_St_id){
                 echo $St_id."  ไม่มีชื่อนักศึกษาอยู่ในระบบ<br><hr> ";
           }

    }
  }

?>