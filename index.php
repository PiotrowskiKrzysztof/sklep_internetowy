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
      <div id="section-container">
        <div class="slider__container">
          <button class="slider__button slider__button--prev" data-button-prev></button>
          <figure class="slide" data-slide></figure>
          <button class="slider__button slider__button--next" data-button-next></button>
        </div>        
          <div id="section-container-content">
            <div class="section-container-content-element">
              <img class="section-container-content-element-img" src="img/truck.svg" alt="banner_dostawa" />
              <div class="section-container-content-element-text">
                <h2>darmowa dostawa</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <button>Lorem Ipsum</button>
              </div>
            </div>
            <div class="section-container-content-element">
              <img class="section-container-content-element-img" src="img/money.svg" alt="banner_dostawa" />
              <div class="section-container-content-element-text">
                <h2>termin płatności</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <button>lorem ipsum</button>
              </div>
            </div>
            <div class="section-container-content-element">
              <img class="section-container-content-element-img" src="img/paw.svg" alt="banner_dostawa" />
              <div class="section-container-content-element-text">
                <h2>program lojalnościowy</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <button>lorem ipsum</button>
              </div>
            </div> 
          </div>          
      </div>      
    </section>
    <?php
      $s->printFooter();
    ?>    
    <script src="./js/main.js"></script>
    <script src="./js/dropdown.js"></script>
    </body>    
</html>