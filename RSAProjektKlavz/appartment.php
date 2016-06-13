<?php
include_once 'header.php';
?>
<link href='css/index_style.css' rel='stylesheet' type='text/css'>
<link href='css/product_style.css' rel='stylesheet' type='text/css'>
<?php
if(isset($_GET['id'])){
    $appartment_id=$_GET['id'];
    $query = "SELECT a.*
            FROM appartments a INNER JOIN categories c ON a.category_id=c.id
                                INNER JOIN locations l ON l.id=a.location_id
                                
            WHERE a.id=$appartment_id;";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        ?>
    <div id="product_div">
        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="#desc">Opis</a></li>
          <li role="presentation" class="active"><a href="#data">Podatki</a></li>
          <li role="presentation" class="active"><a href="#reserve">Rezerviraj</a></li>
        </ul>
        <div class="img-div">
            <?php
            $query = "SELECT *
            FROM images WHERE appartment_id=$appartment_id;";
            $result2 = mysqli_query($link, $query);
            ?>
        </div>
        <div id="desc">
            <?php
            echo $row['description'];
            ?>
        </div>
        <div id="data">
            <ul>
            <?php
            echo "<li> Leto: ".$row['year_made']."</li>";
            echo "<li> Spalnice: ".$row['bedrooms']."</li>";
            echo "<li> Kopalnic: ".$row['bathrooms']."</li>";
            echo "<li> Osebe: ".$row['persons']."</li>";
            echo "<li> Cena: ".$row['ppd']."€</li>";
            ?>
            </ul>
        </div>
    </div>
<?php
    }
    
}
    
?>
    
<?php
include_once 'footer.php';

