<?php
    include_once 'header.php';
    include_once 'database.php';
?>

    <div id="list-destinations">
    <div class="container">
        <div class="">
            <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
                    <?php
                    $query = "SELECT d.title AS dtitle, d.id AS did, d.description,
                                c.title AS ctitle, c.short
                                FROM destinations d INNER JOIN countries c
                                ON c.id=d.country_id";

                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        $title = $row['dtitle'];
                        $desc = $row['description'];

                        $query = "SELECT * 
                                  FROM pictures 
                                  WHERE destionation_id=" . $row['did'] . '
                                  LIMIT 1';
                        $r = mysqli_query($link, $query);
                        $picture = mysqli_fetch_array($r);

                        echo '<div class="item">
                                <div class="col-md-4">
                                    <a href="destination.php?id=' . $row['did'] . '"><div class="img-container">';
                        if (empty($picture['url'])) {
                            echo '<img src="slike/no-image.jpg" alt="" class="img-responsive" />';
                        } else {
                            echo '<img src="' . $picture['url'] . '" alt="" class="img-responsive" />';
                        }
                        echo "<div class='info'><span class='item-title'>$title</div></div>
                                    </a>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
                <a class="left-float carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right-float carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.carousel-inner .item:first').addClass('active');

            $('#myCarousel').carousel({
                interval: 10000
            });

            $('.carousel .item').each(function(){
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                if (next.next().length>0) {
                    next.next().children(':first-child').clone().appendTo($(this));
                }
                else {
                    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
                }
            });
        });

    </script>

<?php
    include_once 'footer.php';
?>