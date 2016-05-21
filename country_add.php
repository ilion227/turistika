<?php
    include_once 'header.php';
?>

<div id="add-country-container">
    <form action="country_insert.php" method="post">
        Ime države: <input required type="text" name="title" placeholder="Vnesi državo ..." /><br />
        Kratica: <input required type="text" name="short" placeholder="Vnesi kratico ..." /><br />
        <input type="submit" value="Vnesi" />
        <input type="reset" value="Počisti" />
        <a class="btn btn-default pull-right" href="countries.php">Nazaj</a>
    </form>
</div>

<?php 
    include_once 'footer.php';
?>