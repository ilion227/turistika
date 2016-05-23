<?php
include_once 'header.php';
?>

  
  <link href='css/register_style.css' rel='stylesheet' type='text/css'>
  
  <form action="add_user.php" method="POST">
    <div class="wrap">
        <h1>REGISTRACIJA</h1>
        <div>
          IME:
          <input id="firstname" type="text" class="cool" required />
        </div>
        <div>
          PRIIMEK:
          <input id="lastname" type="text" class="cool" required />
        </div>
        <div>
          UPORABNIŠKO IME:
          <input id="username" type="text" class="cool" required />
        </div>
        <div>
          GESLO:
          <input id="passwrd" type="text" class="cool" required />
        </div>
        <div>
          TELEFONSKA ŠTEVILKA
          <input id="telephone" type="text" class="cool" required />
        </div>
        <div>
          ELEKTRONSKI NASLOV:
          <input id="email" type="text" class="cool" required  />
        </div>
        <div>
            <input id="submit-button" type="submit" value="REGISTRIRAJ SE" />
        </div>
        
    </div>
  </form>
<?php
include_once 'footer.php';
?>