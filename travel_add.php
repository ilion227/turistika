<?php
    include_once 'database.php';
    include_once 'session.php';
    
    $destination_id = (int) $_POST['destination_id'];
    $user = $_SESSION['user_id'];
    $travel_date = $_POST['travel_date'];
    
    $query = sprintf("INSERT INTO travels (travel_date, user_id, destination_id) 
                   VALUES ('$travel_date','$user','$destination_id');");
    $result = mysqli_query($link, $query);
    
    header("Location: index.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

