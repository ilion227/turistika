<?php
include_once 'header.php';
include_once 'database.php';
$query = "SELECT d.title AS dtitle, d.id AS did, 
          c.title AS ctitle, c.short
          FROM destinations d INNER JOIN countries c 
          ON c.id=d.country_id";
$result = mysqli_query($link, $query);
?>
<?php
if ($_SESSION['admin'] == 1) {
    ?>
    <div id="destinations-container">
    <a class="btn btn-primary btn-block" href="destination_add.php">Dodaj destinacijo</a>
    <?php
}
?>



    <div id="destinations">

        <?php
        while ($row = mysqli_fetch_array($result)) {
            $query = "SELECT * 
                  FROM pictures 
                  WHERE destionation_id=".$row['did'].'
                  LIMIT 1';
            //echo $query;
            $r = mysqli_query($link, $query);
            $picture = mysqli_fetch_array($r);

            echo '<div class="col-md-4">
        <a href="destination.php?id='.$row['did'].'">
            <div class="destination panel panel-default">
            <div class="panel-heading">
                <div><div class="pull-left">'.$row['dtitle'].'</div>
                <div class="pull-right">'.$row['short'].'</div>
                <div class="clearfix"></div>
            </div>
            </div>
            <div class="panel-body">';

            if (empty($picture['url'])) {
                echo '<img src="slike/no-image.jpg" alt="" />';
            }
            else {
                echo '<img src="'.$picture['url'].'" alt=""/>';
            }
            echo '
            </div>
            <div class="panel-footer">
                <div class="pull-left">
                    <a class="btn btn-default" href="destination.php?id=' . $row['did'] . '">Ogled</a>
                </div>';
            if($_SESSION['admin'] === '1'){
                echo '
                <div class="pull-right">
                    <a class="btn btn-default" href="destination_edit.php?id='.$row['did'].'"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-default" href="destination_delete.php?id='.$row['did'].'" onclick="return confirm(\'Ste prepričani?\')"><i class="fa fa-trash"></i></a>
                </div>';
            }
            echo '<div class="clearfix"></div>
            </div>
        </div>
        </div></a>';
        }
        ?>
        <div class="clear"></div>
    </div>
    </div>

<?php
include_once 'footer.php';
?>