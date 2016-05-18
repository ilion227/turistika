<!DOCTYPE html>
<?php
include_once 'connection.php';
include_once 'session.php';
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $username=$_POST['username'];
        $passwrd=sha1($_POST['passwrd']);
        $query = "SELECT *
                    FROM users u 
                    WHERE u.username='$username' AND u.passwrd='$password';";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $_SESSION['id']=$row['ID'];
            $_SESSION['name']=$row['username'];
            header('Location: index.php');
        }
        else
            echo 'Vaše geslo ali uporabniško ime je neveljavno <br/>';
        
        ?>
        
    </body>
</html>


