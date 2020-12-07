<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');

  $s = new shop();
  $s -> SQLConnect($sqlConfig);
?>
<!DOCTYPE html>
<html lang="pl">
  <?php
    $s->printHtmlHeader();
  ?>
  <body>
    <?php
        $s->printNav();
    ?>
    <section>
      <div class="section__container__ordered">
        <h1>Mój koszyk:</h1>
        <div class="ordered__item">
            <img src="img/img_item.jpg" alt="item.jpg">
            <div class="item__content">
                <h2>Nazwa produktu</h2>
                <p>Cena produktu</p>
            </div>
        </div>
      </div>      
    </section>
    <?php
      $s->printFooter();
    ?>  
    <script src="./js/main.js"></script>
    <script src="./js/dropdown.js"></script>
    </body>    
</html>