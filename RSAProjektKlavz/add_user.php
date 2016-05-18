<?php
include_once 'connection.php';
include_once 'session.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$passwrd = sha1($_POST['passwrd']);
$email = $_POST['email'];
$telephone = $_POST['telephone'];


$query = "INSERT INTO users VALUES (username, first_name, last_name, passwrd, reg_date, telephone, email)
        VALUES ('$username','$first_name','$last_name','','','','')";
        $result = mysqli_query($link, $query);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

