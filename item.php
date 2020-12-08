<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');

  $s = new shop();
  $s -> SQLConnect($sqlConfig); 

  if(!isset($_SESSION['user_logged'])) {
    echo '<script>
    alert("Zaloguj się, żeby podejrzeć wybrany produkt.");
    window.location = "shop.php";
    </script>';
  }
  
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
        <div class="section__container__products">            
            <?php
              $s -> showSelectedProduct();
            ?>        
        </div>      
    </section>
    <?php
      $s->printFooter();
    ?>
    <script src="./js/dropdown.js"></script>  
    </body>    
</html>