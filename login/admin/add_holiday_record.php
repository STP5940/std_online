<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$Day = filter_input(INPUT_POST, 'Day', FILTER_SANITIZE_SPECIAL_CHARS);
$Birthday_date = filter_input(INPUT_POST, 'Birthday_date', FILTER_SANITIZE_SPECIAL_CHARS);
$Birthday_month = filter_input(INPUT_POST, 'Birthday_month', FILTER_SANITIZE_SPECIAL_CHARS);
$Birthday_year = filter_input(INPUT_POST, 'Birthday_year', FILTER_SANITIZE_SPECIAL_CHARS);
$Detail_holiday = filter_input(INPUT_POST, 'Detail_holiday', FILTER_SANITIZE_SPECIAL_CHARS);

$edit = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_SPECIAL_CHARS);
$ID_holiday = filter_input(INPUT_GET, 'ID_holiday', FILTER_SANITIZE_SPECIAL_CHARS);




/* echo $Day;
echo $Birthday_date;
echo $Birthday_month;
echo $Birthday_year;
echo $Detail_holiday; */

$Day_holiday = $Birthday_date.'/'.$Birthday_month.'/'.$Birthday_year;

echo $Day_holiday;


if($edit == '1'){
    $sql_result_holiday = mysqli_query($con, "SELECT * FROM holiday WHERE Day_holiday='$Day_holiday' ");
    if(mysqli_num_rows($sql_result_holiday) == '0'){
        $sqli_insert_holiday = mysqli_query($con, "UPDATE holiday SET Day='$Day', Day_holiday='$Day_holiday', Detail_holiday='$Detail_holiday' WHERE ID='$ID_holiday' ");
        Header("Location: edit_holiday_new.php?confirm=1&ID_holiday=$ID_holiday");
    }else{
        while($rows_sqli_insert_holiday = mysqli_fetch_array($sql_result_holiday, MYSQLI_ASSOC)){
        $ID_Check = $rows_sqli_insert_holiday['ID'];
        if($ID_Check == $ID_holiday){
            $sqli_insert_holiday = mysqli_query($con, "UPDATE holiday SET Day='$Day', Day_holiday='$Day_holiday', Detail_holiday='$Detail_holiday' WHERE ID='$ID_holiday' ");
            Header("Location: edit_holiday_new.php?confirm=1&ID_holiday=$ID_holiday");
        }else {
            Header("Location: edit_holiday_new.php?confirm=0&Day_holiday=$Day_holiday&ID_holiday=$ID_holiday");
        }
    }

    }
}else{

    $sql_result_holiday = mysqli_query($con, "SELECT * FROM holiday WHERE Day_holiday='$Day_holiday' ");
    if(mysqli_num_rows($sql_result_holiday) == '0'){
        $sqli_insert_holiday = mysqli_query($con, "INSERT INTO holiday (Day, Day_holiday, Detail_holiday) VALUES ('$Day','$Day_holiday','$Detail_holiday') ");
        Header("Location: add_holiday_new.php?confirm=1");
    }else{
        Header("Location: add_holiday_new.php?confirm=0&Day_holiday=$Day_holiday");
    }
}


#$sqli_insert_holida = mysqli_query($con, "UPDATE holiday SET Day='$Day', Day_holiday='$Day_holiday', Detail_holiday='$Detail_holiday' ");
?>

