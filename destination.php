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

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <link href="css/mail.css" rel="stylesheet">
        <form id="form1" action="destination_mail.php" method="POST" >
            <h2 id="title">Povpraševanje</h2>
            <p type="Message:"><input name="sporocilo" placeholder="What would you like to tell us.."></input></p>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="submit" id="button">Send Message</button>
        </form>
    </div>


    <div id="destination-container">
        <div id="title-container">
            <h2><?php echo $destination['title'];?></h2>

            <div class="ocena">
                <a href="rate.php?id=<?php echo $id; ?>&rate=1">
                    <img src="img/star.png" alt="ocena" />
                </a>
                <a href="rate.php?id=<?php echo $id; ?>&rate=2">
                    <img src="img/star.png" alt="ocena" />
                </a>
                <a href="rate.php?id=<?php echo $id; ?>&rate=3">
                    <img src="img/star.png" alt="ocena" />
                </a>
                <a href="rate.php?id=<?php echo $id; ?>&rate=4">
                    <img src="img/star.png" alt="ocena" />
                </a>
                <a href="rate.php?id=<?php echo $id; ?>&rate=5">
                    <img src="img/star.png" alt="ocena" />
                </a>

                <?php
                $query = "SELECT AVG(rate) 
              FROM rates
              WHERE destination_id = $id";
                $result = mysqli_query($link, $query);
                $avg = mysqli_fetch_array($result);
                echo '<h3>'.round($avg[0],2).'</h3>';
                ?>
            </div>
        </div>
        <div id="content-container">
            <div class="pull-left">
                <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Kontakt</button>
            </div>
            <div class="pull-right">
                <form action="travel.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input class="btn btn-default" type="submit" value="Rezerviraj!" />
                </form>
            </div>
            <div class="clearfix"></div>

        <h2>Slike:</h2>
    <div class="cont">
        <div class="demo-gallery">
            <ul id="lightgallery">
                <?php
                $query = "SELECT * FROM pictures
                  WHERE destionation_id = $id";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {

                    echo '<li data-responsive="'.$row['url'].'" data-src="'.$row['url'].'"
          data-sub-html="<h4>'.$row['title'].'</h4>">
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
        <?php
        if ($_SESSION['admin'] == 1) {
            ?>
            <div id="add-image">
                <form class="form" action="picture_insert.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    Napis: <input type="text" name="title" /><br />
                    Slika: <input type="file" name="fileToUpload" /><br />
                    <input type="submit" value="Dodaj sliko" />
                </form>
            </div>
            <?php
        }
        ?>
    <h5><?php echo getCountryName($destination['country_id']);?></h5>
    <a href="<?php echo $destination['www']; ?>" target="_blank">Povezava</a>

    <p>
        <?php echo $destination['description']; ?>
    </p>

    <div class="comments">
        <h2>Komentarji</h2>
        <form action="comment_insert.php" method="post">
            <input type="hidden" name="destination_id"
                   value="<?php echo $id; ?>" />
            <textarea name="content" cols="5" rows="5" required="required"></textarea>
            <input type="submit" value="Komentiraj" />
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
                echo '<div class="comment soda">';
            }
            else {
                echo '<div class="comment liha">';
            }
            if ($row['user_id'] == $_SESSION['user_id']) {
                echo '<div class="pull-right"><a id="delete-comment" href="comment_delete.php?id='.$row['cid'].'" onclick="return confirm(\'Ste prepričani?\')">
                <i class="fa fa-times fa-lg"></i></a></div>';        }
            echo '<div class="content" class="pull-left"><span class="username">'.
                $row['first_name'].' '.
                $row['last_name'].
                '</span> ';
            echo '<span class="commentdate pull-right">'.
                $row['date_add'].'
              </span>';
            echo '<hr/>';
            echo $row['content'];
            //preverimo ali je trenutno
            //prijavljena oseba, lastnik komentarja
            echo '</div><div class="clearfix"></div></div>';
            $st++; //števec za sode in lihe komentarje
        }

        ?>
    </div>
    </div>
<?php
include_once 'footer.php';
?>