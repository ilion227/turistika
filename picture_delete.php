<?php
/**
 * Created by PhpStorm.
 * User: janli
 * Date: 2. 06. 2016
 * Time: 11:12
 */

include ('database.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM pictures WHERE id = $id";

    $result = mysqli_query($link, $query);
}

header("Location: " . $_SERVER['HTTP_REFERER']);