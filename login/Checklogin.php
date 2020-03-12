<?php require_once('../config/connection.php'); ?>

<?php

//$st_code = filter_input(INPUT_POST, 'st_code', FILTER_SANITIZE_SPECIAL_CHARS);
//$Username = mysqli_real_escape_string($con,$_POST['Username']);
//$text = htmlspecialchars("Hello ><");
//get_magic_quotes_gpc(true); // หากค่าที่ได้เป็น 1 หมายความว่า ค่าที่ส่งจากตัวแปรจะเลือกอักขระพิเศษโดยอัตโนมัติ


#----------- ป้องกัน sql injection -----------#
$Username = mysqli_real_escape_string($con,$_POST['username']);
$Password = mysqli_real_escape_string($con,$_POST['password']);

#----------- ทำการ hash รหัสผ่านเพื่อความปลอดภัย -----------#
$salt = "nkldsfgioetgeiqe-qfm94mfr9gf0d_masmf%$#af@!#?>L0)*&JJ(&&GDE%EADS^";
$hash256 = hash_hmac(sha256,$Password,$salt);
$hashmd5 = md5($hash256);

#----------- ทำการ prepared statement เพื่อเพิ่มความปลอดภัยในการ Query Database -----------#
/*$sql = "SELECT * FROM User Where Username=? and Password=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt,"ss", $Username, $hashmd5);
mysqli_execute($stmt);
$result_user = mysqli_stmt_get_result($stmt);*/

$result_user = mysqli_query($con,"SELECT * FROM user WHERE Username='$Username' AND Password='$hashmd5' ");


if($result_user->num_rows == 1){

    session_start();
    $row = mysqli_fetch_array($result_user,MYSQLI_ASSOC);

    //print_r($row);
    
    #---------- กำหนดค่า SESSION ให้กับ Admin ----------#
    $_SESSION["ID"] = $row["ID"];
    $_SESSION["Username_admin"] = $row["Username"];
    $_SESSION["nameUser"] = $row["Firstname"]." ".$row["Lastname"];
    $_SESSION["Userlevel"] = $row["Userlevel"];
    $_SESSION["Hello"] = "Hello Word";

    if($_SESSION["Userlevel"] == "T"){
        Header("Location: teacher/");
    }elseif($_SESSION["Userlevel"] == "A"){
        Header("Location: admin/");
    }

}else{
    $sql_std_login = mysqli_query($con, "SELECT * FROM student WHERE St_id='$Username' AND Pw='$hashmd5' ");
    print_r($sql_std_login);
    if(mysqli_num_rows($sql_std_login) == '1'){
        while($rows_sql_std_login = mysqli_fetch_array($sql_std_login, MYSQLI_ASSOC)){
            session_start();
            $_SESSION["St_id"] = $rows_sql_std_login["St_id"];
            $_SESSION["St_rfid"] = $rows_sql_std_login["St_rfid"];
            $_SESSION["Name"] = $rows_sql_std_login["St_sex"].' '.$rows_sql_std_login["St_firstname"].' '.$rows_sql_std_login["St_lastname"];
            $_SESSION["St_class"] = $rows_sql_std_login["St_class"];
            $_SESSION["St_department"] = $rows_sql_std_login["St_department"];
            $_SESSION["Userlevel"] = $rows_sql_std_login["Userlevel"];

            if($_SESSION["Userlevel"] == "S"){
                Header("Location: student/");
            }

        }
    }else{
        Header("Location: index.php?login=login_fall");
    }

    /*
    echo "<script>";
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
    echo "</script>";
    */

  }

  //echo $hashmd5;