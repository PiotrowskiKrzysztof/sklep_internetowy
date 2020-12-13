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
      <div id="section-container">
          <button><a href="new_message.php">Utwórz nową wiadomosć</a></button>            
            <?php
                $s->showMessages($_SESSION['id']);
            ?>
      </div>      
    </section>
    <?php
      $s->printFooter();
    ?>    
    <script src="./js/dropdown.js"></script>
    </body>    
</html>