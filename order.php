<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');


  class order extends shop{

    function processPOST(){
       
         $this->debug($_POST);
        //dodwanie koszyka do bazy
       

        if (!empty($_SESSION['trolley_products']) && isset($_POST['makeorder']) && $_POST['makeorder']==1) {
            $items = array();
            $trolley = $_SESSION['trolley_products'];
            $id_product = 0;
            $iter = 0;
            foreach ($trolley as $id=>$product) {
                $id_product = $product['id'];
                $sql = "
                SELECT 
                    `id_product`, 
                    `name_product`, 
                    `img_product`, 
                    `price_product`,
                    `desc_product`
                FROM `product`
                WHERE `id_product` = $id_product;
                ";
                $res = $this->sql($sql);
                $row = mysqli_fetch_assoc($res);

                $items[] = array(
                    'id_product'=>$row['id_product'],
                    'price_product'=>$row['price_product'],
                );
            
            }
            //$this->debug($items);
            
            $json = json_encode($items);
            $user_id = (int) $_SESSION['id'];
            $this->debug($json);

            $sql = "INSERT INTO `order_done`(`id_order_done`, `id_user_order_done`, `content_order_done`, `data_order_done`) 
                VALUES (
                    NULL,
                    ".$user_id.",
                    '".mysqli_real_escape_string($this->linkSQL,$json)."',
                    NOW()                    
                    )";
             $this->debug($sql);       
            
            $this->sql($sql);
             
            
            $_SESSION['trolley_products'] = array();
            $_SESSION['trolley_price'] = 0;
            
        } else {
            header('Location: shop.php');
        }  

    }

  }  

  $s = new order();
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
        <h1>Dziękujemy za zakupy w naszym sklepie!</h1>
        <p>Zapraszamy ponownie.</p>          
      </div>      
    </section>
    <?php
      $s->printFooter();
    ?>
    <script src="./js/dropdown.js"></script>
    </body>    
</html>