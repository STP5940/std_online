<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$St_id = filter_input(INPUT_POST, 'St_id', FILTER_SANITIZE_SPECIAL_CHARS);
$St_rfid = filter_input(INPUT_POST, 'St_rfid', FILTER_SANITIZE_SPECIAL_CHARS);
$St_sex = filter_input(INPUT_POST, 'St_sex', FILTER_SANITIZE_SPECIAL_CHARS);
$St_firstname = filter_input(INPUT_POST, 'St_firstname', FILTER_SANITIZE_SPECIAL_CHARS);
$St_lastname = filter_input(INPUT_POST, 'St_lastname', FILTER_SANITIZE_SPECIAL_CHARS);
$St_class_one = filter_input(INPUT_POST, 'St_class_one', FILTER_SANITIZE_SPECIAL_CHARS);
$St_class_sub = filter_input(INPUT_POST, 'St_class_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$St_department = filter_input(INPUT_POST, 'St_department', FILTER_SANITIZE_SPECIAL_CHARS);

$Birthday_date = filter_input(INPUT_POST, 'Birthday_date', FILTER_SANITIZE_SPECIAL_CHARS);
$Birthday_month = filter_input(INPUT_POST, 'Birthday_month', FILTER_SANITIZE_SPECIAL_CHARS);
$Birthday_year = filter_input(INPUT_POST, 'Birthday_year', FILTER_SANITIZE_SPECIAL_CHARS);

$edit = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_SPECIAL_CHARS);
$id_main = filter_input(INPUT_GET, 'id_main', FILTER_SANITIZE_SPECIAL_CHARS);

$Birthday = $Birthday_date.'/'.$Birthday_month.'/'.$Birthday_year;
$St_class = $St_class_one.'/'.$St_class_sub;

$salt = "nkldsfgioetgeiqe-qfm94mfr9gf0d_masmf%$#af@!#?>L0)*&JJ(&&GDE%EADS^";
$hash256 = hash_hmac(sha256,$Birthday,$salt);
$hashmd5 = md5($hash256);

/*
echo $St_id;
echo $St_rfid;
echo $St_sex;
echo $St_firstname;
echo $St_lastname;
echo $St_class;
echo $St_department;
echo $Birthday;*/

if($edit == '1'){




$result_id = mysqli_query($con, "SELECT * FROM student WHERE St_id='$St_id' ");
//print_r($result_id);
if(mysqli_num_rows($result_id) >= '1'){
    //echo 'มีแล้ว';
    while($rows_result_id = mysqli_fetch_array($result_id, MYSQLI_ASSOC)){
        $ID_result = $rows_result_id['ID'];
        if($ID_result == $id_main){
            $result_rfid = mysqli_query($con, "SELECT * FROM student WHERE St_rfid='$St_rfid' ");
            //print_r($result_id);
            if(mysqli_num_rows($result_rfid) >= '1'){
                //echo 'มีแล้ว';
                while($rows_result_id = mysqli_fetch_array($result_rfid, MYSQLI_ASSOC)){
                    $ID_result_rfid = $rows_result_id['ID'];
                    //echo 'มีแล้ว';
                    if($ID_result_rfid == $id_main){
                        $result_insert_to_record = mysqli_query($con, "UPDATE student SET St_id='$St_id' , St_rfid='$St_rfid' , St_sex='$St_sex' , St_firstname='$St_firstname' , St_lastname='$St_lastname' , St_class='$St_class' , St_department='$St_department' , Birthday='$Birthday' , Pw='$hashmd5' , Userlevel='S' WHERE id='$id_main' ");
                        Header("Location: edit_student_new.php?confirm=1&id_main=$id_main");
                    }else {
                        Header("Location: edit_student_new.php?confirm=2&id_main=$id_main&id=$St_rfid");
                    }
                }
            }else {
                $result_insert_to_record = mysqli_query($con, "UPDATE student SET St_id='$St_id' , St_rfid='$St_rfid' , St_sex='$St_sex' , St_firstname='$St_firstname' , St_lastname='$St_lastname' , St_class='$St_class' , St_department='$St_department' , Birthday='$Birthday' , Pw='$hashmd5' , Userlevel='S' WHERE id='$id_main' ");
                Header("Location: edit_student_new.php?confirm=1&id_main=$id_main");
            }
            
        }else{
            Header("Location: edit_student_new.php?confirm=0&id_main=$id_main&id=$St_id");
        }
    }
    
}else{
    $result_rfid = mysqli_query($con, "SELECT * FROM student WHERE St_rfid='$St_rfid' ");
    //print_r($result_id);
    if(mysqli_num_rows($result_rfid) >= '1'){
        //echo 'มีแล้ว';
        while($rows_result_id = mysqli_fetch_array($result_rfid, MYSQLI_ASSOC)){
            $ID_result_rfid = $rows_result_id['ID'];
            if($ID_result_rfid == $id_main){
                $result_insert_to_record = mysqli_query($con, "UPDATE student SET St_id='$St_id' , St_rfid='$St_rfid' , St_sex='$St_sex' , St_firstname='$St_firstname' , St_lastname='$St_lastname' , St_class='$St_class' , St_department='$St_department' , Birthday='$Birthday' , Pw='$hashmd5' , Userlevel='S' WHERE id='$id_main' ");
                Header("Location: edit_student_new.php?confirm=1&id_main=$id_main");
            }else {
                Header("Location: edit_student_new.php?confirm=2&id_main=$id_main&id=$St_rfid");
            }
        }

    }else{
        $result_insert_to_record = mysqli_query($con, "UPDATE student SET St_id='$St_id' , St_rfid='$St_rfid' , St_sex='$St_sex' , St_firstname='$St_firstname' , St_lastname='$St_lastname' , St_class='$St_class' , St_department='$St_department' , Birthday='$Birthday' , Pw='$hashmd5' , Userlevel='S' WHERE id='$id_main' ");
        Header("Location: edit_student_new.php?confirm=1&id_main=$id_main");
    }
}



    /*$result_insert_to_record = mysqli_query($con, "UPDATE student SET St_id='$St_id' , St_rfid='$St_rfid' , St_sex='$St_sex' , St_firstname='$St_firstname' , St_lastname='$St_lastname' , St_class='$St_class' , St_department='$St_department' , Birthday='$Birthday' , Pw='$hashmd5' , Userlevel='S' WHERE id='$id_main' ");
    Header("Location: edit_student_new.php?confirm=1&id_main=$id_main");
    
    Header("Location: edit_student_new.php?confirm=0&id_main=$id_main&id=$St_id");

    Header("Location: edit_student_new.php?confirm=2&id_main=$id_main&id=$St_rfid ");
    */

}else{
    
$result_std = mysqli_query($con, "SELECT St_id FROM student WHERE St_id='$St_id' ");
$result_rfid = mysqli_query($con, "SELECT St_id FROM student WHERE St_rfid='$St_rfid' ");

if(mysqli_num_rows($result_std) >= '1'){
    Header("Location: add_student_new.php?confirm=0&id=$St_id");
}elseif(mysqli_num_rows($result_rfid) >= '1'){
    Header("Location: add_student_new.php?confirm=2&id=$St_rfid");
}else{
    $result_insert_to_record = mysqli_query($con, "INSERT INTO student (St_id, St_rfid, St_sex, St_firstname, St_lastname, St_class, St_department, Birthday, Pw, Userlevel) VALUES ('$St_id','$St_rfid','$St_sex','$St_firstname','$St_lastname','$St_class','$St_department','$Birthday','$hashmd5','S')");
    
     if($result_insert_to_record){
         Header("Location: add_student_new.php?confirm=1");
     }else{
         echo 'เพิ่มข้อมูลไม่สำเร็จ !';
     }
}

}

?>