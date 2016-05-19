<?php
    include_once 'database.php';
    include_once 'session.php';
    include_once 'header.php';
    
    $id = (int) $_POST['id'];
    
    $query = "SELECT * FROM destinations WHERE id = $id";
    $result = mysqli_query($link, $query);
    $destination = mysqli_fetch_array($result);
    
    echo "<h2>Odločili ste se za potovanje na lokacijo: ".$destination['title']."</h2>";
?>
<div>
    <h3>Preden odpotujete Vas prosimo, da vnesete nekaj podatkov, da bomo lažje organizirali vaše potovanje.</h3>
    <form action="travel_add.php" method="POST">
        Vnesite datum, kdaj nas želite obiskati: <input type="date" name="travel_date" />
        <input type="hidden" name="destination_id" value="<?php echo $id?>"/>
        <input class="btn btn-default" type="submit" value="Rezerviraj!" />
    </form>
</div>
<?php
include_once 'footer.php';
?>