<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');

  $s = new shop();
  $s -> SQLConnect($sqlConfig);

  if(!isset($_SESSION['user_logged'])) {
    echo '<script>
    alert("Zaloguj się, żeby wysyłać wiadomości.");
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
      <div id="section-container">
        <form class="container__email" method="POST" action="sendNewMessage.php">
            <input id="email_mes" name="email_mes" placeholder="Email" type="email" value=<?php echo $_SESSION['email'] ?>>            
            <input id="subject_mes" name="subject_mes" placeholder="Tytuł wiadomości" type="text">
            <textarea id="body_mes" name="body_mes" placeholder="Treść wiadomości" cols="30" rows="15"></textarea>
            <input class="email__btn" type="submit" value="Wyślij email">
        </form>
      </div>      
    </section>
    <?php
      $s->printFooter();
    ?>    
    <script src="./js/dropdown.js"></script>
    </body>    
</html>