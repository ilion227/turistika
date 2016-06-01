<?php
include_once 'session.php';
include_once 'connection.php';

$user_id = $_SESSION['ID'];
$city_id = $_POST['city_id'];
$location_id = $_POST['location_id'];
$category_id = $_POST['category_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$persons = $_POST['persons'];
$ppd = $_POST['ppd'];
$year_made = $_POST['year_made'];
$address = $_POST['address'];

if(isset($_POST['wi-fi']))
    $wifi_available = TRUE;
else 
    $wifi_available = FALSE;

$query = "INSERT INTO appartments(user_ID, city_ID, location_ID, category_ID, title, description, bedrooms, bathrooms, persons, ppd, year_made, address, wifi_available)
                           VALUES($user_id, $city_id, $location_id, $category_id, '$title', '$description',$bedrooms,$bathrooms, $persons, $ppd, $year_made, '$address', $wifi_available);";
$result = mysqli_query($link, $query);


header("Location: index.php");

