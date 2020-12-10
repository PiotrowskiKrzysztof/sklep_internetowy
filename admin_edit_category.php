<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');

  $s = new shop();
  $s -> SQLConnect($sqlConfig);
  $s -> onlyAdmin();

  
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
        <aside class="aside__admin">
            <a href="admin_order_status.php">Ustaw status zamówienia</a>
            <a href="admin_edit_category.php">Edytuj kategorie</a>
        </aside>
        <section class="section__admin">        
            <div id="section-container">
                <?php
                    $s->editCategory();
                ?>
            </div>      
        </section>
    </main>  
    <script src="./js/dropdown.js"></script>
    </body>    
</html>