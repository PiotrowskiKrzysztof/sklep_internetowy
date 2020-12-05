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
            <div class="container__left">

            </div>
            <div class="container__right">
                <form action="login.php" method="post">
                    <img class="logo" src="img/logo.svg" alt="Logo" />
                    <h2>Zaloguj się</h2>
                    <label for="email">E-mail:</label>
                    <input id="email" type="email" name="email" placeholder="email"><br><br>
                    <label for="password">Hasło:</label>
                    <input id="password" type="password" name="password"><br><br>
                    <input type="submit" value="Zaloguj się">
                    <a href="/register_page.php">Zarejestruj się</a>
                </form>
                <?php
                    if(isset($_SESSION['login_error'])) echo$_SESSION['login_error'];
                ?>
            </div>
            
        </div>
    </main>
</body>
</html>