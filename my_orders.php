<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');

  $s = new shop();
  $s -> SQLConnect($sqlConfig);
  $s->blockEntrace();
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
        <h1>Moje zamówienia:</h1>
        <?php
          $s->showOrderDone($_SESSION['id']);
        ?>
        
      </div>      
    </section>
    <?php
      $s->printFooter();
    ?>
    <script src="./js/dropdown.js"></script>
    </body>    
</html>