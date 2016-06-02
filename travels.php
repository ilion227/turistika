<?php
include_once 'header.php';
include_once 'database.php';
include_once 'session.php';
$user_id = $_SESSION['user_id'];

$query = "SELECT d.title AS dtitle, d.id AS did, t.travel_date AS travel_date,
          c.title AS ctitle, c.short, t.id AS tid
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
            $query = "SELECT * 
                  FROM pictures 
                  WHERE destionation_id=" . $row['did'] . '
                  LIMIT 1';
            //echo $query;
            $r = mysqli_query($link, $query);
            $picture = mysqli_fetch_array($r);

            echo '<div class="col-md-4">
        <a href="destination.php?id=' . $row['did'] . '">
            <div class="destination panel panel-default">
            <div class="panel-heading">
                <div><div class="pull-left">' . $row['dtitle'] . '</div>
                <div class="pull-right">' . $row['short'] . '</div>
                <div class="clearfix"></div>
            </div>
            </div>
            <div class="panel-body">';

            if (empty($picture['url'])) {
                echo '<img src="slike/no-image.jpg" alt="" />';
            } else {
                echo '<img src="' . $picture['url'] . '" alt=""/>';
            }
            echo '
            </div>
            <div class="panel-footer">
                <div class="pull-left">
                    <a class="btn btn-default" href="destination.php?id=' . $row['did'] . '">Ogled</a>
                    <a class="btn btn-default" href="destination_mail.php?id=' . $row['did'] . '"><i class="fa fa-envelope"></i></a>
                    <a class="btn btn-default" href="travel_delete.php?id=' . $row['tid'] . '"><i class="glyphicon glyphicon-remove"></i></a>
                </div>';
            echo '
                <div class="pull-right">';
            $originalDate = $row['travel_date'];
            $newDate = date("d. M Y - D", strtotime($originalDate));
            echo $newDate;
            echo '</div>';
            echo '<div class="clearfix"></div>
            </div>
        </div>
        </div></a>';
        }
        echo '</a>';
        echo '<span class="destination_name">'.$row['dtitle'].'</span>';
        echo '<span class="destination_country">'.$row['short'].'</span>';
    echo '</div>';
        
if(mysqli_num_rows($result) === 0){
    echo '<h1>Niste prijavljeni na nobeno destinacijo';
}
?>
<div class="clear"></div>
</div>

<?php
include_once 'footer.php';
?>


