<?php
include_once 'header.php';
include_once 'database.php';
$query = "SELECT * FROM countries";
$result = mysqli_query($link, $query);
?>

<div id="countries-container" class="container">
  <?php  if($_SESSION['admin'] === '1'){ ?>
    <a class="btn btn-default btn-block" href="country_add.php">Dodaj državo</a>
  <?php } ?>
<table class="table" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <td>ID</td>
        <td>Naslov</td>
        <td>Kratica</td>
        <td> <?php if($_SESSION['admin'] === '1'){ echo "Akcije";} ?> </td>
    </tr>

<?php
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>';
    echo $row['id'];
    echo '</td>';
    echo '<td>';
    echo $row['title'];
    echo '</td>';
    echo '<td>';
    echo $row['short'];
    echo '</td>';

    echo '<td>';
    if($_SESSION['admin'] === '1'){
    echo '<a href="country_delete.php?id='.$row['id'].'" 
                onclick="return confirm(\'Ste prepričani?\')">Izbriši</a>';
    echo ' <a href="country_edit.php?id='.$row['id'].'">Uredi</a>';}
    echo '</td>';
    
    echo '</tr>';
}
?>
</table>
</div>

<?php
include_once 'footer.php';
?>