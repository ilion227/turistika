<?php
$host="localhost";
$user="root";
$password="";
$link = mysqli_connect($host, $user, $password)or 
        die("Povezava neuspešna: ".  mysqli_connect_error());;
$db_name = "project_klavz";
mysqli_select_db($link, $db_name) or 
        die("Povezava neuspešna: ".  mysqli_connect_error());
mysqli_query($link, "SET NAMES 'utf8'");

?>

