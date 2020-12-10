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
    <main id="signin">
        <div class="main__container__log">
            <div class="container__right">
                <form action="admin_login.php" method="post">
                    <img class="logo" src="img/logo.svg" alt="Logo" />
                    <h2>Zaloguj się</h2>
                    <label for="admin_email">E-mail:</label>
                    <input id="admin_email" type="email" name="admin_email" placeholder="admin_email"><br><br>
                    <label for="admin_password">Hasło:</label>
                    <input id="admin_password" type="password" name="admin_password"><br><br>
                    <input type="submit" value="Zaloguj się">
                </form>
                <?php
                    if(isset($_SESSION['login_error'])) echo$_SESSION['login_error'];
                ?>
            </div>
            
        </div>
    </main>
</body>
</html>