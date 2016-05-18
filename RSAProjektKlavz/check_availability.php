<?php
require_once("connection.php");
if(!empty($_POST["username"])) {
$query = "SELECT count(*) FROM users WHERE username='" . $_POST["username"] . "'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$user_count = $row[0];
if($user_count>0) 
    echo "<span>Username Not Available.</span>";
else 
    echo "<span>Username Available.</span>";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

