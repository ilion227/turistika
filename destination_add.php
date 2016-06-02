<?php
    include_once 'header.php';
    include_once 'database.php';
?>

    <div id="add-destination-container">
        <form action="destination_insert.php" method="post">
            Ime: <input type="text" name="title" placeholder="Vnesi destinacijo ..."/><br/>
            Država:
            <select name="country_id">
                <?php
                $query = "SELECT * FROM countries ORDER BY title";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                }
                ?>
            </select>
            Opis: <textarea name="description" cols="5" rows="10" placeholder="Vnesi opis ..."></textarea><br/>
            Spletna stran: <input type="text" name="www"/><br/>
            <input type="submit" value="Vnesi"/>
            <input type="reset" value="Počisti"/>
            <a class="btn btn-default pull-right" href="destinations.php">Nazaj</a>
        </form>
    </div>

<?php
    include_once 'footer.php';
?>