<!DOCTYPE html>
<?php
include_once 'connection.php';
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija</title>
        <script type="text/javascript">
        function checkUsername() {
            jQuery.ajax({
            url: "check_availability.php",
            data:'username='+$("#username").val(),
            type: "POST",
            success:function(data){
            $("#availability-status").html(data);
            },
            error:function (){$("#availability-status").html("not succesful");}
            });
            echo "dgfdfg"
            }
        </script>
    </head>
    <body>
        <form action="add_user.php" method="POST">
            <br />Ime: <input type="text" name="first_name" />
            <br />Priimek: <input type="text" name="last_name" />
            <br />Uporabniško ime: <input type="text" name="username" id="username" onClick="checkUsername()"/><span id="availability-status"></span>
            <br />Geslo: <input type="text" name="passwrd" />
            <br />Elektronski naslov: <input type="text" name="email" />
            <br />Telefonska številka: <input type="text" name="telephone" />
            <br /><input type="submit" name="subm" value="Registriraj se!" />
        </form>
    </body>
</html>
