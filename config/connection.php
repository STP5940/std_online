<?php
$con = mysqli_connect("localhost","root","","std_online") or die("Connect Database error: ".mysqli_error($con));
mysqli_query($con,"SET NAMES 'utf8' ");
?>