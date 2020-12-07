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
        <div class="section__container__products">            
            <?php
              $s -> showSelectedProduct();
            ?>
            <!-- <div class="products__item">
                <img src="img/img_item.jpg" alt="item">
                <div class="item__content">
                    <h1>Nazwa produktu</h1>
                    <p>Opis produktu. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h3>Cena</h3>
                    <button>Dodaj do koszyka</button>
                </div>
            </div> -->
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
    <?php
      $s->printFooter();
    ?>  
    </body>    
</html>