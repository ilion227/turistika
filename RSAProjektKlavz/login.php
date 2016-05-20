<?php
include_once 'header.php';
?>
<h1>PRIJAVA</h1>
  <form action="add_user.php" method="POST">
  <hr>
            <br />Uporabniško ime: <input type="text" name="username" />
            <br />Geslo: <input type="text" name="passwrd" />
            <br /><input type="submit" name="subm" value="Prijava" />
  </form>
<?php
include_once 'footer.php';
?>