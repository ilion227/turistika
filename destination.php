<?php
include_once 'header.php';
include_once 'database.php';

function getCountryName($id) {
    include 'database.php';
    $query = "SELECT * FROM countries
                  WHERE id = $id";
    $result = mysqli_query($link, $query);
    $country = mysqli_fetch_array($result);
    return $country['title'];
}

$id = (int) $_GET['id'];

$query = "SELECT * FROM destinations WHERE id = $id";
$result = mysqli_query($link, $query);
$destination = mysqli_fetch_array($result);
?>
    <h2><?php echo $destination['title'];?>
        <div class="ocena">
            <a href="rate.php?id=<?php echo $id; ?>&rate=1">
                <img src="img/star.png" alt="ocena" />
                <span>1</span>
            </a>
            <a href="rate.php?id=<?php echo $id; ?>&rate=2">
                <img src="img/star.png" alt="ocena" />
                <span>2</span>
            </a>
            <a href="rate.php?id=<?php echo $id; ?>&rate=3">
                <img src="img/star.png" alt="ocena" />
                <span>3</span>
            </a>
            <a href="rate.php?id=<?php echo $id; ?>&rate=4">
                <img src="img/star.png" alt="ocena" />
                <span>4</span>
            </a>
            <a href="rate.php?id=<?php echo $id; ?>&rate=5">
                <img src="img/star.png" alt="ocena" />
                <span>5</span>
            </a>
        </div>
    </h2>
<?php
$query = "SELECT AVG(rate) 
              FROM rates
              WHERE destination_id = $id";
$result = mysqli_query($link, $query);
$avg = mysqli_fetch_array($result);
echo '<h3>'.round($avg[0],2).'</h3>';
?>
    <div>< </div>
    <div class="pictureGallery">
        <?php
        if ($_SESSION['admin'] == 1) {
            ?>
            <form action="picture_insert.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                Napis: <input type="text" name="title" /><br />
                Slika: <input type="file" name="fileToUpload" /><br />
                <input type="submit" value="Dodaj sliko" />
            </form>
            <hr />
            <?php
        }
        ?>


    </div>

    <div class="cont">

        <div class="demo-gallery">
            <ul id="lightgallery">

                <?php
                $query = "SELECT * FROM pictures
                  WHERE destionation_id = $id";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {

                    echo '<li href="'.$row['url'].'" data-src="'.$row['url'].'"
                    data-sub-html="<h4>' . $row['title'] . '</h4>">
                    <a href="">
                        <img class="img-responsive" src="'.$row['url'].'">
                        <div class="demo-gallery-poster">
                            <img src="'.$row['url'].'">
                        </div>
                    </a>
                </li>';
                }
                ?>


            </ul>
        </div>


        <script>
            $(document).ready(function() {
                $('#lightgallery').lightGallery({
                    pager: true
                });
            });
        </script>
    </div>
    <h5><?php echo getCountryName($destination['country_id']);?></h5>
    <a href="<?php echo $destination['www']; ?>" target="_blank">Povezava</a>

    <p>
        <?php echo $destination['description']; ?>
    </p>

    <script>
        function initialize()
        {
            var mapProp = {
                center: new google.maps.LatLng(<?php echo $destination['lat']; ?>,<?php echo $destination['alt']; ?>),
                zoom:12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }

        function loadScript()
        {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "http://maps.googleapis.com/maps/api/js?key=&sensor=false&callback=initialize";
            document.body.appendChild(script);
        }

        window.onload = loadScript;
    </script>
    <div id="googleMap" style="width:500px;height:500px;"></div>

    <div class="comments">
        <h2>Komentarji</h2>
        <form action="comment_insert.php" method="post">
            <input type="hidden" name="destination_id"
                   value="<?php echo $id; ?>" />
            <textarea name="content" cols="5" rows="5"></textarea>
            <input type="submit" value="Pošlji" />
        </form>
        <?php
        $query = "SELECT *, c.id AS cid 
              FROM comments c INNER JOIN
                   users u ON c.user_id=u.id
              WHERE c.destination_id=$id
              ORDER BY c.date_add DESC";
        $result = mysqli_query($link, $query);
        $st = 1;
        while ($row = mysqli_fetch_array($result)) {
            //preverimo ali gre za sodo ali liho
            //vrstico komentarja
            if ($st%2==0) {
                echo '<div class="soda">';
            }
            else {
                echo '<div class="liha">';
            }
            echo '<span class="username">'.
                $row['first_name'].' '.
                $row['last_name'].
                '</span> ';
            echo '<span class="commentdate">'.
                $row['date_add'].'
              </span>';
            echo '<hr />';
            echo $row['content'];
            //preverimo ali je trenutno
            //prijavljena oseba, lastnik komentarja
            if ($row['user_id'] == $_SESSION['user_id']) {
                echo '<a href="comment_delete.php?id='.$row['cid'].'" onclick="return confirm(\'Ste prepričani?\')">
                Briši</a>';        }
            echo '</div>';
            $st++; //števec za sode in lihe komentarje
        }

        ?>
    </div>
<?php
include_once 'footer.php';
?>