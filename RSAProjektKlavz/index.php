<?php
include_once 'header.php';

?>
<link href='css/index_style.css' rel='stylesheet' type='text/css'>

<div id="left-nav-menu">
    <div id="categories-nav-menu">
        <h2>Kategorije:</h2>
        <hr>
        <ul>
            <?php
            $query = "SELECT *
                          FROM categories;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<li>'.$row['title'].'</li>';
                }
            ?>
        </ul> 
    </div>
    <div id="categories-nav-menu">
        <hr>
        <h2>Lokacije:</h2>
        <hr>
        <ul>
            <?php
            $query = "SELECT *
                          FROM locations;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<li>'.$row['title'].'</li>';
                }
            ?>
        </ul> 
    </div>
</div>
        <h1>Pozdravljeni!</h1>
        <?php
        
        ?>
        
<?php
include_once 'footer.php';
?>
