<?php

        include_once 'database.php';
        $id=(int) $_POST ['id'];
        $youtube_link = $_POST['url'];

        $ftext = str_replace("watch?v=", 'embed/', $youtube_link);

        $query = sprintf("UPDATE destinations SET iframe = '$ftext' WHERE id = $id;");
        $result=mysqli_query($link,$query);
        
        header("Location: destination.php?id=$id");
        
    
      
?>