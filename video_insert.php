<?php

        include_once 'database.php';
        $id=(int) $_POST ['id'];
        $ftext= $_POST['url'];
        $query = sprintf("UPDATE destinations SET iframe = '$ftext' WHERE id = $id;");
        $result=mysqli_query($link,$query);
        
        header("Location: destination.php?id=$id");
        
    
      
?>