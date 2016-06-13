<?php
include_once 'database.php';
include_once 'session.php';
    
    $id = (int) $_GET['id'];
    $user = $_SESSION['user_id'];
    
    $query = sprintf("DELETE FROM travels WHERE id=$id AND user_id=$user;");
    $result = mysqli_query($link, $query);
    
    header("Location: travels.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

