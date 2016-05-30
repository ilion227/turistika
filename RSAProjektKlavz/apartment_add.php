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
              <input name="persons" type="number" class="cool" required />
            </div><br />
            <div> 
              CENA(na dan):
              <input id="price_input"  name="ppd" type="number" class="cool" required /> €
            </div><br />
            <div style="text-align:center; float:left;margin-right: 20px;"> 
              Število kopalnic  <br />
              <input name="bathrooms" type="number" class="cool" required />
            </div>
            <div style="float:left; text-align:center;"> 
              Število spalnic  <br />
              <input name="bedrooms" type="number" class="cool" required />
            </div><br />
        </div>
        <div class="wrap2">
            <h1>DODATNE KATEGORIJE</h1>
        </div>
    </form>
        
<?php
include_once 'footer.php';
?>


