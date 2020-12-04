<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <title>Zaloguj się</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Krzysztof Piotrowski" />
    <meta name="description" content="Projekt z przedmiotu projektowania aplikacji internetowych" />
    <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time();?>" /> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700;900&display=swap" rel="stylesheet" /> 	
</head>
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