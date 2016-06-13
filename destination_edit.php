<?php
    include_once 'header.php';
    include_once 'database.php';
    
    $id = (int) $_GET['id']; //id destinacije, ki jo urejamo
    $query = "SELECT * FROM destinations WHERE id = $id";
    $result = mysqli_query($link, $query);
    //si shranimo v spremenljivko 
    //vse podatke o destinaciji, ki jo urejamo
    $destination = mysqli_fetch_array($result);
?>

<div id="edit-destination-container">
    <form action="destination_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $destination['id']; ?>" />
        Ime: <input type="text" name="title" value="<?php echo $destination['title']; ?>" /><br />
        Država:
        <select name="country_id">
            <?php
                $query = "SELECT * FROM countries ORDER BY title";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['id'] == $destination['country_id']) {
                        echo '<option value="'.$row['id'].'" selected="selected">'.$row['title'].'</option>';
                    }
                    else {
                        echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                }
            ?>
        </select>
        Opis: <textarea name="description" cols="5" rows="10"><?php echo $destination['description']; ?></textarea><br />
        Spletna stran: <input type="text" name="www" value="<?php echo $destination['www']; ?>" /><br />

        <?php
        $query = "SELECT * FROM pictures
                  WHERE destionation_id = $id";
        $result = mysqli_query($link, $query);
        echo "<div class='list-group'>";
        while ($row = mysqli_fetch_array($result)) {

            echo '<div class="list-group-item"><div class="pull-left"><img id="small-image" src="'. $row['url'] . '"><p></div>
            <div class="pull-right"><a href="picture_delete.php?id=' . $row['id'] . '"><i class="fa fa-times"></i></a></div>
            <b>Naslov: </b><br>' . $row['title'] . '
            <div class="clearfix"></div>
            </div>';
        }
        echo "</div>";
        ?>


        <input type="submit" value="Posodobi" />
        <input type="reset" value="Prekliči" />
    </form>
</div>

<?php
    include_once 'footer.php';
?>