<?php
    session_start();  
    require_once('mainClass.php');
    require_once('shopClass.php');
    require_once('settings.php');
  
    $s = new shop();
    $s -> SQLConnect($sqlConfig);    

    if(isset($_POST['email'])) {
        //walidacja
        $all_ok = true;

        //sprawdz poprawność emaila
        $email = $_POST['email'];
        //sanityzacja sprawdza, czy email zawiera dopuszczalne znaki
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
            $all_ok = false;
            $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
        }
        //hasło
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        if((strlen($password1) < 8)) {
            $all_ok = false;
            $_SESSION['e_password'] = "Hasło musi posiadać co najmniej 8 znaków!";
        }
        if($password1 != $password2) {
            $all_ok = false;
            $_SESSION['e_password'] = "Podane hasła nie są identyczne!";
        }
        $password_hash = password_hash($password1, PASSWORD_DEFAULT);
        //checkbox
        if(!isset($_POST['rules'])) {
            $all_ok = false;
            $_SESSION['e_rules'] = "Potwierdź akceptację regulaminu";
        }
        //recaptcha
        $secret_key = "6LdL5d4ZAAAAABbA2l5lfKY5ENPE2RJcMGdsyWwb";
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
        $answer = json_decode($check);

        if($answer -> success == false) {
            $all_ok = false;
            $_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem!";
        }

        require_once "connect.php";
        //do przechwytywania wyjątków
        mysqli_report(MYSQLI_REPORT_STRICT);        
        try {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection -> connect_errno != 0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                //sprawdz czy istnieje już taki email w bazie danych
                $result = $connection -> query("SELECT user_email FROM user WHERE user_email='$email'");
                if(!$result) throw new Exception($connection -> error);
                $counter_email = $result -> num_rows;
                if($counter_email > 0) {
                    $all_ok = false;
                    $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu email!";
                }

                if($all_ok == true) {
                    if($connection->query("INSERT INTO user VALUES (NULL, '$email', '$password_hash')")) {
                        header('Location: signin_page.php');
                        
                    } else {
                        throw new Exception($connection -> error);
                        echo $password_hash;
                    }
                }

                $connection -> close();
            }            
        } catch(Exception $e) {
            echo '<span>Błąd serwera, zarejestrój się później</span>';
            echo $e;
        }
    }

?>
<!DOCTYPE html>
<html lang="pl">
<?php
    $s->printHtmlHeader();
?>
<body>
    <main id="signin">
        <div class="main__container__log">
            <div class="container__left"></div>
            <div class="container__right">
                <form method="post">
                    <img class="logo" src="img/logo.svg" alt="Logo" />
                    <h2>Rejestracja</h2>

                    <label for="email">E-mail:</label>
                    <input id="email" type="email" name="email" placeholder="email"><br><br>
                    <?php
                        if(isset($_SESSION['e_email'])) {
                            echo '<span style="color:red">'.$_SESSION['e_email'].'</span><br>';
                            unset($_SESSION['e_email']);
                        }
                    ?>

                    <label for="password1">Hasło:</label>
                    <input id="password1" type="password" name="password1"><br><br>
                    <label for="password2">Powtórz hasło:</label>
                    <input id="password2" type="password" name="password2"><br><br>
                    <?php
                        if(isset($_SESSION['e_password'])) {
                            echo '<span style="color:red">'.$_SESSION['e_password'].'</span><br>';
                            unset($_SESSION['e_password']);
                        }
                    ?>
                    
                    <label><input type="checkbox" name="rules"> Akceptuję regulamin</label>
                    <?php
                        if(isset($_SESSION['e_rules'])) {
                            echo '<span style="color:red">'.$_SESSION['e_rules'].'</span><br>';
                            unset($_SESSION['e_rules']);
                        }
                    ?>
                    <div class="g-recaptcha" data-sitekey="6LdL5d4ZAAAAALSETAqFhp-gsUv7NJ-7bsY0skQT"></div>
                    <?php
                        if(isset($_SESSION['e_bot'])) {
                            echo '<span style="color:red">'.$_SESSION['e_bot'].'</span><br>';
                            unset($_SESSION['e_bot']);
                        }
                    ?>
                    <input type="submit" value="Zarejestruj się">
                    <a href="signin_page.html">Zaloguj się</a>
                </form>
            </div>
            
        </div>
    </main>
</body>
</html>