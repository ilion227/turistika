<?php
include_once 'connection.php';

echo $first_name = $_POST['first_name'];
echo $last_name = $_POST['last_name'];
echo $username = $_POST['username'];
echo $passwrd = sha1($_POST['passwrd']);
echo $email = $_POST['email'];
echo $telephone = $_POST['telephone'];
echo $reg_date= date('Y-m-d');

$query = "INSERT INTO users (username, first_name, last_name, passwrd, reg_date, telephone, email)
        VALUES ('$username','$first_name','$last_name','$passwrd','$reg_date','$telephone','$email');";
$result = mysqli_query($link, $query);

session_start();
$query = "SELECT * FROM users WHERE username='$username';";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);

header('Location: login.php');
 
