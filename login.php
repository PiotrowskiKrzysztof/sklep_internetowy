<?php
    session_start();

    if((!isset($_POST['email'])) || (!isset($_POST['password']))) {
        header('Location: login.php');
        exit();
    }

    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0) {
        echo "Error: ".$connection->connect_errno; //wyświetla błąd połączenia z bazą danych
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = htmlentities($email, ENT_QUOTES, "UTF-8");

        if ($result = @$connection->query(sprintf(
        "SELECT * FROM user WHERE user_email = '%s'",
        mysqli_real_escape_string($connection, $email)
        ))) {
            $counter_users = $result->num_rows;
            if($counter_users == 1) {
                $row = $result->fetch_assoc(); //przechowuje nagłówki tabeli z bazy danych
                //sprawdza czy hasło odpowiada hashowi
                if(password_verify($password, $row['user_password'])) {
                    $_SESSION['user_logged'] = true; //true tylko wtedy gdy jesteś zalogowany                
                    $_SESSION['id'] = $row['user_id']; //przechowuje id usera
                    $_SESSION['email'] = $row['user_email']; //przechowuje email usera
                    $_SESSION['trolley_price'] = 0.00;  // przechowuje wartość koszyka
                    $Session['trolley_products'] = array();
                    unset($_SESSION['login_error']); //usuwa zmienną nieprawidłowego logowania
                    $result->free_result();
                    header('Location: shop.php');
                } else {
                    $_SESSION['login_error'] = '<span style="color:red">Nieprawidłowe hasło!</span>';
                    unset($_SESSION['login_error']);
                    header('Location: signin_page.php');
                }
            } else {
                $_SESSION['login_error'] = '<span style="color:red">Nieprawidłowy e-mail!</span>';
                unset($_SESSION['login_error']);
                header('Location: signin_page.php');
            }
        }

        $connection->close();
    }

?>