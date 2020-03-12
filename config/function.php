<?php

function Checkadmin() {
    if($_SESSION["Userlevel"] != A){
        Header("Location: ../");
    }
}

function Checkteacher() {
    if($_SESSION["Userlevel"] != T){
        Header("Location: ../");
    }
}

?>