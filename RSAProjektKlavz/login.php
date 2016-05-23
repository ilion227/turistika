<?php
include_once 'header.php';
?>
<link href='css/register_style.css' rel='stylesheet' type='text/css'>
<div class="wrap">
    <h1>PRIJAVA</h1>
    <form action="add_user.php" method="POST">
      <hr>
      <div>
        UPORABNIŠKO IME:
        <input id="username" type="text" class="cool" required />
      </div>
      <div>
        GESLO:
        <input id="passwrd" type="text" class="cool" required />
      </div>
      <div>
              <input id="submit-button" type="submit" value="PRIJAVI SE" />
      </div>
    </form>
</div>
<?php
include_once 'footer.php';
?>