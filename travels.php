<?php
include_once 'header.php';
include_once 'database.php';
include_once 'session.php';
$user_id = $_SESSION['user_id'];

$query = "SELECT d.title AS dtitle, d.id AS did, t.travel_date AS travel_date,
          c.title AS ctitle, c.short
          FROM countries c INNER JOIN destinations d 
          ON c.id=d.country_id
          INNER JOIN travels t ON t.destination_id=d.id
          INNER JOIN users u ON t.user_id=u.id
          WHERE u.id=$user_id";
$result = mysqli_query($link, $query);
?>

<div id="destinations"> 
<?php
while ($row = mysqli_fetch_array($result)) {
    echo '<div class="destination">';
        echo '<div>';
            $originalDate = $row['travel_date'];
            $newDate = date("d. M Y - D", strtotime($originalDate));
            echo $newDate;
        echo '</div>';
        echo '<a href="destination.php?id='.$row['did'].'">';
        $query = "SELECT * 
                  FROM pictures 
                  WHERE destionation_id=".$row['did'].'
                  LIMIT 1'; 
        //echo $query;
        $r = mysqli_query($link, $query);
        $picture = mysqli_fetch_array($r);
        if (empty($picture['url'])) {
            echo '<img src="slike/no-photo.jpg" alt="" />';
        }
        else {
            echo '<img src="'.$picture['url'].'" alt="" />';
        }        
        echo '</a>';
        echo '<span class="destination_name">'.$row['dtitle'].'</span>';
        echo '<span class="destination_country">'.$row['short'].'</span>';
    echo '</div>';    
}
?>
<div class="clear"></div>
</div>

<?php
include_once 'footer.php';
?>


