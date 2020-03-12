<?php
session_start();
require("../../config/connection.php");
if($_SESSION["Userlevel"] == T){

    print_r($_SESSION);
    echo "<a href='../../logout.php'>ออกจากระบบ</a>";

}else{

    Header("Location: ../");
}

?>