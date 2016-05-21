<?php
include_once 'header.php';
?>

    <div class="login-container">
        <div class="login"><h1>Prijava</h1>

        <form action="login_check.php" method="post">
            e-pošta: <input type="email" name="email"/><br/>
            geslo: <input type="password" name="pass"/><br/>
            <input type="submit" value="Prijava"/>
        </form></div>
    </div>

<?php
include_once 'footer.php';
?>