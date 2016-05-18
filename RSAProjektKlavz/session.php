<?php
session_start();
if(isset($_SESSION['ID'])){
    echo '<div class="top">Prijavljeni ste kot '.$_SESSION['username'];
    echo '  <a href="logout.php">Odjava</a></div>';
}
else{
        ?>
        <form action="login_check.php" method="post">
            <input type="text" name="username" placeholder="Vnesite uporabniško ime">
            <input type="text" name="passwrd" placeholder="Vnesite geslo">
            <input type="submit" name="subm" value="Prijava">
        </form>
        <?php
        }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

