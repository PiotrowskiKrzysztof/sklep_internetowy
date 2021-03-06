<?php
    session_start();  
    require_once('mainClass.php');
    require_once('shopClass.php');
    require_once('settings.php');
  
    $s = new shop();
    $s -> SQLConnect($sqlConfig);

    isSet($_GET['page']) ? intval($_GET['page'] - 1) : 1;
    
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
    <main>       
      <div class="main__container">       
      <?php
        $s->printMenuLeft();
      ?>  
        <section class="section__shop">
          <div class="shop__options">
            <?php
              $s->showPathProducts();
            ?>
          </div>         
          <?php    
            // $s->debug($_REQUEST);
            $s->showProducts(); 
          ?>          
        </section>
      </div>
    </main>
    <?php
      $s->printFooter();
    ?>
    <script src="./js/dropdown.js"></script>
    </body>    
</html>