<?php
include_once 'header.php';
?>
<link href='css/products_style.css' rel='stylesheet' type='text/css'>



<div id="products_list">
    <h1>Najboljši apartmaji</h1>
    <?php
        $query = "SELECT *
                FROM appartments;";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
            ?>
    <div class="product_div">
        <div class="product_info_div">
            <h3><a href="appartment.php?id=<?php echo $row['ID']; ?>"><?php echo $row['title']; ?></a></h3>
            <p>Število oseb: <?php echo $row['persons']; ?></p>
            <p><?php echo $row['description']; ?></p>
        </div>
        <div class="img_div"></div>
    </div>
    <?php
        }
?>
</div>
        <?php
        
        ?>
<?php
include_once 'footer.php';
?>
