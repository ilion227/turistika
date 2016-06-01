<?php
include_once 'header.php';

?>
<link href='css/appartment_add_style.css' rel='stylesheet' type='text/css'>

    <form action="appartment_insert.php" method="POST">
        <div class="wrap">
            <h1>DODAJ APARTMA</h1>
            <div> 
              <input name="title" placeholder="Naslov" type="text" class="cool" required />
            </div>
            <div> 
              Število oseb, ki lahko stanujejo v vašem apartmaju:  <br />
              <input name="persons" type="number"  required />
            </div><br />
            <div> 
              CENA(na dan):
              <input id="price_input"  name="ppd" type="number" required /> €
            </div><br />
            <div style="text-align:center; float:left;margin-right: 20px;"> 
              Število kopalnic  <br />
              <input name="bathrooms" type="number" required />
            </div>
            <div style="float:left; text-align:center;"> 
              Število spalnic  <br />
              <input name="bedrooms" type="number" required />
            </div><br />
            <div style="text-align:center; float:left;margin-right: 20px;"> 
              Leto izgradnje
              <input id="price_input" name="year_made" type="number" required />
            </div>
            <div id="internet-div"style="text-align:center;margin-left: 20px;clear:both;">
                Dostop do interneta:
                <span class="input-group-addon" >
                    <input type="checkbox" name="wi-fi" value="true">
                </span>
              </div>
            <div style="clear:both;"> 
              Opis apartmaja  <br />
              <textarea name="description" cols="45" rows="5"></textarea>
            </div><br />
        </div>
        <div class="wrap2">
            <h1>DODATNE KATEGORIJE</h1>
            <div> 
              <input name="address" placeholder="Ulica" type="text" />
            </div>
            <div class="select_div">
                Mesto: <select name="city_id">
                <?php
                $query = "SELECT *
                          FROM cities;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['ID'].'">'.$row['title'].'</option>';
                }
                ?>
                 </select>
            </div>
            <div class="select_div">
                Lokacija: <select name="location_id">
                <?php
                $query = "SELECT *
                          FROM locations;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['ID'].'">'.$row['title'].'</option>';
                }
                ?>
                 </select>
            </div>
            <div class="select_div">
                Kategorija: <select name="category_id">
                <?php
                $query = "SELECT *
                          FROM categories;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['ID'].'">'.$row['title'].'</option>';
                }
                ?>
                 </select>
            </div>
            <button type="submit" class="submit-button">Ustvari apartma</button>
        </div>
        
    </form>
        
<?php
include_once 'footer.php';
?>


