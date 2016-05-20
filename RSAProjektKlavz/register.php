<?php
include_once 'header.php';
?>

<div>
  <h1>REGISTRACIJA</h1>
  <form action="add_user.php" method="POST">
  <hr>
            <br />Ime: <input type="text" name="first_name" />
            <br />Priimek: <input type="text" name="last_name" />
            <br />Uporabniško ime: <input type="text" name="username" id="username" onClick="checkUsername()"/><span id="availability-status"></span>
            <br />Geslo: <input type="text" name="passwrd" />
            <br />Elektronski naslov: <input type="text" name="email" />
            <br />Telefonska številka: <input type="text" name="telephone" />
            <br /><input type="submit" name="subm" value="Registracija" />
  </form>
</div>
<?php
include_once 'footer.php';
?>