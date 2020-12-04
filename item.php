<?php
  session_start();  
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <title>Sklep internetowy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Krzysztof Piotrowski" />
    <meta name="description" content="Projekt z przedmiotu projektowania aplikacji internetowych" />
    <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time();?>" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700;900&display=swap" rel="stylesheet" /> 	
  </head>
  <body>
    <header>
      <div id="header__container">
        <a href="index.php"><img class="logo" src="img/logo.svg" alt="Logo" /></a>
        <div class="account__menu">                     
          <?php
            if((isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true)) {              
              echo '
                <div class="menu__trolley">
                    <img src="img/trolley.svg" alt="Trolley" />
                    <p>Mój koszyk: 0.00zł</p>  
                </div>
                <div class="dropdown">
                    <img class="dropdown__btn" src="img/avatar.svg" alt="Avatar" />
                    <div class="dropdown__menu">
                        <a href ="my_orders.php">Zamówienia</a>
                        <a href ="logout.php">Wyloguj</a>
                    </div> 
                </div>  ';
            } else {
              echo '<a class="btn_log" href="register_page.php">Zarejestruj się</a>';
              echo '<a class="btn_log" href="signin_page.php">Zaloguj się</a>';
            }
          ?>
        </div>
      </div>
    </header>
    <nav>
      <div id="nav-container">
        <ul id="menu">
          <li class="menu-element"><a href="index.php">Strona główna</a></li>
          <li class="menu-element">
            <a href="#">Psy</a>
            <div class="dropdown__menu">
              <div class="dropdown__element">
                <a class="element__title" href="#"> Karma dla psa </a>
                <ul>
                  <li><a href="#">Sucha karma dla psa</a></li>
                  <li><a href="#">Mokra karma dla psa</a></li>
                  <li><a href="#">Witaminy i sumplementy</a></li>
                  <li><a href="#">Przysmaki</a></li>
                </ul>
              </div>
              <div class="dropdown__element">
                <a class="element__title" href="#"> Transport psa </a>
                <ul>
                  <li><a href="#">Transportery dla psów</a></li>
                  <li><a href="#">Klatki i akcesoria</a></li>
                  <li><a href="#">Miski i poidła podróżne</a></li>
                  <li><a href="#">Akcesoria samochodowe</a></li>
                </ul>
              </div>
              <div class="dropdown__element">
                <a class="element__title" href="#"> Spacer z psem </a>
                <ul>
                  <li><a href="#">Obroże</a></li>
                  <li><a href="#">Smycze</a></li>
                  <li><a href="#">Szelki</a></li>
                  <li><a href="#">Kagańce</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="menu-element">
            <a href="#">Koty</a>
            <div class="dropdown__menu">
              <div class="dropdown__element">
                <a class="element__title" href="#"> Karma dla kota </a>
                <ul>
                  <li><a href="#">Sucha karma dla kota</a></li>
                  <li><a href="#">Mokra karma dla kota</a></li>
                  <li><a href="#">Witaminy i sumplementy</a></li>
                  <li><a href="#">Przysmaki</a></li>
                </ul>
              </div>
              <div class="dropdown__element">
                <a class="element__title" href="#"> Transport kota </a>
                <ul>
                  <li><a href="#">Transportery dla kotów</a></li>
                  <li><a href="#">Środki uspokajające do podróży</a></li>
                  <li><a href="#">Szelki i smycze dla kotów</a></li>
                  <li><a href="#">Akcesoria samochodowe</a></li>
                </ul>
              </div>
              <div class="dropdown__element">
                <a class="element__title" href="#"> Zabawa i sport </a>
                <ul>
                  <li><a href="#">Kocimiętka</a></li>
                  <li><a href="#">Grzechotki i maskotki</a></li>
                  <li><a href="#">Wskaźniki laserowe</a></li>
                  <li><a href="#">Tunele</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="menu-element"><a href="#">Promocje</a></li>
        </ul>
        <div id="menu-bot">
          <div class="menu-bot-element">
            <img src="img/trucksmall.svg" alt="trucksmall" />
            <p>dostawa gratis od 99zł</p>
          </div>
          <div class="menu-bot-element">
            <img src="img/return.svg" alt="trucksmall" />
            <p>30 dni na zwrot towaru</p>
          </div>
          <div class="menu-bot-element">
            <img src="img/pawsmall.svg" alt="trucksmall" />
            <p>program lojalnościowy</p>
          </div>
          <div class="menu-bot-element">
            <img src="img/moneysmall.svg" alt="trucksmall" />
            <p>TERMIN PŁATNOŚCI DO 30 DNI</p>
          </div>
        </div>
      </div>
    </nav>
    <section>
        <div class="section__container__products">
            <p>KOTY -> Mokra karma dla kotów -> to jest ta karma</p>
            <div class="products__item">
                <img src="img/img_item.jpg" alt="item">
                <div class="item__content">
                    <h1>Nazwa produktu</h1>
                    <p>Opis produktu. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h3>Cena</h3>
                    <button>Dodaj do koszyka</button>
                </div>
            </div>
            <h1>Polecane produkty:</h1>
            <div class="products__recommended">
                <div class="recommended__item">
                    <img src="img/img_item.jpg" alt="item">
                    <div class="item__content">
                        <h1>Nazwa produktu</h1>                        
                        <h3>Cena</h3>
                        <button>Dodaj do koszyka</button>
                    </div>
                </div>
                <div class="recommended__item">
                    <img src="img/img_item.jpg" alt="item">
                    <div class="item__content">
                        <h1>Nazwa produktu</h1>                        
                        <h3>Cena</h3>
                        <button>Dodaj do koszyka</button>
                    </div>
                </div>
                <div class="recommended__item">
                    <img src="img/img_item.jpg" alt="item">
                    <div class="item__content">
                        <h1>Nazwa produktu</h1>                        
                        <h3>Cena</h3>
                        <button>Dodaj do koszyka</button>
                    </div>
                </div>
                <div class="recommended__item">
                    <img src="img/img_item.jpg" alt="item">
                    <div class="item__content">
                        <h1>Nazwa produktu</h1>                        
                        <h3>Cena</h3>
                        <button>Dodaj do koszyka</button>
                    </div>
                </div>
            </div>
        </div>      
    </section>
    <footer>
      <div id="footer-container">
        <div id="footer-container-socialmedia">
          <p>Znajdziesz nas na</p>
          <img src="img/fbwhite.svg" alt="banner_dostawa" />
          <img src="img/instawhite.svg" alt="banner_dostawa" />
        </div>
        <div id="footer-container-info">
          <div class="footer-container-info-element">
            <h3>informacje</h3>
            <ul>
              <li>O nas</li>
              <li>Regulamin</li>
              <li>Lorem Ipsum</li>
              <li>Lorem Ipsum</li>
            </ul>
          </div>
          <div class="footer-container-info-element">
            <h3>Obsługa klienta</h3>
            <ul>
              <li>Zwroty</li>
              <li>Reklamacje</li>
              <li>Lorem Ipsum</li>
              <li>Lorem Ipsum</li>
            </ul>
          </div>
          <div class="footer-container-info-element">
            <h3>moje konto</h3>
            <ul>
              <li>Ustawienia konta</li>
              <li>Moje zamówienia</li>              
              <li>Lorem Ipsum</li>
              <li>Lorem Ipsum</li>
            </ul>
          </div>
          <div class="footer-container-info-element">
            <h3>kontakt</h3>
            <ul>
              <li>tel</li>
              <li>email</li>
              <li>adres</li>
            </ul>
          </div>

        </div>        
      </div>    
    </footer>
    <script src="./js/main.js"></script>
    <script src="./js/dropdown.js"></script>
    </body>    
</html>