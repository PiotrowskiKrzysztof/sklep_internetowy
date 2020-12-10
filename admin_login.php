<?php
    session_start();

    if((!isset($_POST['admin_email'])) || (!isset($_POST['admin_password']))) {
        header('Location: admin_login.php');
        exit();
    }
    
    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if($connection->connect_errno!=0) {
        echo "Error: ".$connection->connect_errno; //wyświetla błąd połączenia z bazą danych
    } else {
        
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];


        // $admin_email = htmlentities($admin_email, ENT_QUOTES, "UTF-8");
        
        if ($result = @$connection->query(sprintf(
        "SELECT * FROM admin_account WHERE email_admin = '%s'",
        mysqli_real_escape_string($connection, $admin_email)
        ))) {            
            $counter_users = $result->num_rows;
            if($counter_users == 1) {                
                $row = $result->fetch_assoc(); //przechowuje nagłówki tabeli z bazy danych
                //sprawdza czy hasło odpowiada hashowi
                if(password_verify($admin_password, $row['password_admin'])) {
                    $_SESSION['user_logged'] = true; //true tylko wtedy gdy jesteś zalogowany
                    $_SESSION['admin_logged'] = true;
                    $_SESSION['trolley_price'] = 0.00;  // przechowuje wartość koszyka
                    $Session['trolley_products'] = array();
                    unset($_SESSION['login_error']); //usuwa zmienną nieprawidłowego logowania
                    $result->free_result();
                    header('Location: admin.php');
                } else {
                    $_SESSION['login_error'] = '<span style="color:red">Nieprawidłowe hasło!</span>';
                    unset($_SESSION['login_error']);
                    header('Location: admin_signin.php');
                }
            } else {
                $_SESSION['login_error'] = '<span style="color:red">Nieprawidłowy e-mail!</span>';
                unset($_SESSION['login_error']);
                header('Location: admin_signin.php');
            }
        }

        $connection->close();
    }

?>