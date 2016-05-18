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
        <title>Registracija</title>
    </head>
    <body>
        <form action="add_user.php" method="post">
            <br />Ime: <input type="text" name="first_name" />
            <br />Priimek: <input type="text" name="last_name" />
            <br />Uporabniško ime: <input type="text" name="username" />
            <br />Geslo: <input type="text" name="passwrd" />
            <br />Elektronski naslov: <input type="text" name="email" />
            <br />Telefonska številka: <input type="text" name="telephone" />
            <br /><input type="submit" name="subm" value="Registriraj se!" />
        </form>
    </body>
</html>
