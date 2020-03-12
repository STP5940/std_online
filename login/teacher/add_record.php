<?php
session_start();
require("../../config/connection.php");
require("../../config/function.php");
require("../../config/function_time.php");
Checkteacher();
 
$ID_Studen = filter_input(INPUT_POST, 'ID_Studen', FILTER_SANITIZE_SPECIAL_CHARS);
$subjects_ID = filter_input(INPUT_GET, 'subjects_ID', FILTER_SANITIZE_SPECIAL_CHARS);

date_default_timezone_set("Asia/Bangkok");

$timestamp = time();

$date_time = date("l-d-m-Y H:i:s", $timestamp);

$date_day =  date("l", $timestamp);
$date_date =  date("d", $timestamp);
$date_month =  date("m", $timestamp);
$date_year =  date("Y", $timestamp);
$date_hour =  date("H", $timestamp);
$date_minute =  date("i", $timestamp);
$date_second =  date("s", $timestamp);


$Date_database = $date_year."-".$date_month."-".$date_date;
$Time_database = $date_hour.":".$date_minute.":".$date_second;

echo $Date_database;
echo "<br>";
echo $Time_database;


$sql_result_subjects = mysqli_query($con, "SELECT Day,Time_start,Time_end FROM subjects WHERE ID='$subjects_ID' ");
while($rows_sql_result_subjects = mysqli_fetch_array($sql_result_subjects, MYSQLI_ASSOC)){
     $Day = $rows_sql_result_subjects['Day'];
     $Time_start = $rows_sql_result_subjects['Time_start'];
     $Time_end = $rows_sql_result_subjects['Time_end'];
     $Time_learn = ($Time_end-$Time_start);
}

if($Day != $date_day){
    Header("Location: index.php?subjects_ID=$subjects_ID&confirm=5");
}else{

    $sql_result_record_new = mysqli_query($con, "SELECT * FROM record WHERE Date='$Date_database' AND Subjects_ID='$subjects_ID' ");
    if(mysqli_num_rows($sql_result_record_new) == '0'){
        $status = '5';
        $sql_insert_to_record = "INSERT INTO record (Date,Subjects_ID,Status,Hours) VALUES ('$Date_database','$subjects_ID','$status','$Time_learn')";
        $result_insert_to_record = mysqli_query($con, $sql_insert_to_record);
        Header("Location: index.php?subjects_ID=$subjects_ID&confirm=6");
    }else {



$resout_check_studen = mysqli_query($con, "SELECT * FROM student WHERE St_rfid='$ID_Studen' OR St_id='$ID_Studen' ");
print_r($resout_check_studen);
if(mysqli_num_rows($resout_check_studen) == '1'){
###################################   นักศึกษาที่มีข้อมูลในระบบ   ###################################

    while($row_check_studen = mysqli_fetch_array($resout_check_studen, MYSQLI_ASSOC)){
        $check_studen_St_rfid = $row_check_studen ['St_rfid'];
        $check_studen_ID_Studen = $row_check_studen ['St_id'];

        $check_record_one = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID ='$subjects_ID' AND Date='$Date_database' AND St_id='$check_studen_ID_Studen' ");

        if(mysqli_num_rows($check_record_one) >= '1'){
            #มีข้อมูลเคยถูกบันทึกแล้ว
            Header("Location: index.php?subjects_ID=$subjects_ID&confirm=3");
        }else{
            #เช็คชื่อนักศึกษาสำเร็จ
            $sql_result_time = mysqli_query($con,"SELECT Time_start,Time_end,Late FROM subjects WHERE ID='$subjects_ID' ");
            if(mysqli_num_rows($sql_result_time) == '1'){
             while($rows_record_time = mysqli_fetch_array($sql_result_time, MYSQLI_ASSOC)){
                 $time_start = $rows_record_time['Time_start'];
                 $time_end = $rows_record_time['Time_end'];
                 $time_Late = $rows_record_time['Late'];
                 $time_start_Late = $time_start+$time_Late ;
                 $time_add_hours = $time_end-$time_start;
                 }
             }
             $Time_database_now = Time_cover($Time_database);
             if($Time_database_now <= $time_start_Late){
                 #ทันเวลา
                 $status = '1';
             }
             if( $Time_database_now > $time_start_Late){
                 #สาย
                 $status = '2';
             }
             if($Time_database_now > $time_end){
                 #ขาดเรียน
                 $status = '0';
                 $time_add_hours = '0';
             }
            
             if($status != '0'){
                #####################################################
                $sql_insert_to_record = "INSERT INTO record (St_id, Date, Time, Subjects_ID,Status,Hours) VALUES ('$ID_Studen','$Date_database','$Time_database','$subjects_ID','$status','$time_add_hours')";
                $result_insert_to_record = mysqli_query($con, $sql_insert_to_record);
                Header("Location: index.php?subjects_ID=$subjects_ID&confirm=1");
            }else{
                Header("Location: index.php?subjects_ID=$subjects_ID&confirm=4");
            }
        }

    }
}elseif(mysqli_num_rows($resout_check_studen) > '1'){
    echo 'เกิดข้อผิดผลาด: เนื่อจากรหัสนักศึกษาในฐานข้อมูลนักศึกษาซ้ำกัน โปรดตรวจสอบ Table "student" ว่ามี St_id ที่ซ้ำกันหรือไม่ หากพบให้ทำการเปลี่ยนข้อมูลให้ไม่ซ้ำกัน';
    //Header("Location: index.php?subjects_ID=$subjects_ID&confirm=0");

}elseif(mysqli_num_rows($resout_check_studen) == '0'){
###################################   นักศึกษาที่ไม่มีข้อมูลในระบบ   ###################################

           #ตรวจสอบว่าเคยเป็นนักศึกษาที่เคยถูกเช็คไปแล้วหรือเปล่า
           $check_record_one = mysqli_query($con, "SELECT * FROM record WHERE Subjects_ID ='$subjects_ID' AND Date='$Date_database' AND St_id='$ID_Studen' ");
   
           if(mysqli_num_rows($check_record_one) >= '1'){
               #มีข้อมูลเคยถูกบันทึกแล้ว
               Header("Location: index.php?subjects_ID=$subjects_ID&confirm=3");
           }else{
               #เช็คชื่อนักศึกษาสำเร็จ
               $sql_result_time = mysqli_query($con,"SELECT Time_start,Time_end,Late FROM subjects WHERE ID='$subjects_ID' ");
               if(mysqli_num_rows($sql_result_time) == '1'){
                while($rows_record_time = mysqli_fetch_array($sql_result_time, MYSQLI_ASSOC)){
                    $time_start = $rows_record_time['Time_start'];
                    $time_end = $rows_record_time['Time_end'];
                    $time_Late = $rows_record_time['Late'];
                    $time_start_Late = $time_start+$time_Late ;
                    $time_add_hours = $time_end-$time_start;
                    }
                }
                $Time_database_now = Time_cover($Time_database);
                if($Time_database_now <= $time_start_Late){
                    #ทันเวลา
                    $status = '1';
                }
                if( $Time_database_now > $time_start_Late){
                    #สาย
                    $status = '2';
                }
                if($Time_database_now > $time_end){
                    #ขาดเรียน
                    $status = '0';
                    $time_add_hours = '0';
                }

                if($status != '0'){
                    #####################################################
                    $sql_insert_to_record = "INSERT INTO record (St_id, Date, Time, Subjects_ID,Status,Hours) VALUES ('$ID_Studen','$Date_database','$Time_database','$subjects_ID','$status','$time_add_hours')";
                    $result_insert_to_record = mysqli_query($con, $sql_insert_to_record);
                    Header("Location: index.php?subjects_ID=$subjects_ID&confirm=1");
                }else{
                    Header("Location: index.php?subjects_ID=$subjects_ID&confirm=4");
                }
           }
        
}

}
}
