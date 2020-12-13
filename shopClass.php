<?php

class shop extends main{

    function printHtmlHeader(){
    
        $this->processPOST();
    
    
    ?>
    <head>
        <meta charset="UTF-8" />
        <title><?php echo ($this->shopName)?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Krzysztof Piotrowski" />
        <meta name="description" content="Projekt z przedmiotu projektowania aplikacji internetowych" />
        <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time();?>" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700;900&display=swap" rel="stylesheet" /> 	
          <script src="js/jquery-3.5.1.min.js"></script>   
          <script src="js/functions.js?v=<?php echo time();?>"></script>        
    </head>
    <?php

    }

    function printNav() {
    ?>
        <header>
            <div id="header__container">
                <a href="index.php"><img class="logo" src="img/logo.svg" alt="Logo" /></a>
                <div class="account__menu">
                    <input class="menu__search" type="search" name="search" id="search" placeholder="Wyszukaj przedmiot">
                    <div id="search__results"></div>
                    <?php
                        if((isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] == true)) {              
                            echo '                                
                                <div class="dropdown">
                                    <img class="dropdown__btn" src="img/avatar.svg" alt="Avatar" />
                                    <div class="dropdown__menu">
                                        <a href ="admin.php">Admin panel</a>
                                        <a href ="logout.php">Wyloguj</a>
                                    </div> 
                                </div>  ';
                        } else if((isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true)) {              
                        echo '
                            <div class="menu__trolley">
                                <a href="my_trolley.php"><img src="img/trolley.svg" alt="Trolley" /></a>
                                <p>Mój koszyk: </p> 
                                <div id="basketInfo">'.$_SESSION['trolley_price'].' zł</div>
                            </div>
                            <div class="dropdown">
                                <img class="dropdown__btn" src="img/avatar.svg" alt="Avatar" />
                                <div class="dropdown__menu">
                                    <a href ="messages.php">Wiadomości</a>
                                    <a href ="my_orders.php">Zamówienia</a>
                                    <a href ="logout.php">Wyloguj</a>
                                </div> 
                            </div>  ';
                        } else {
                            echo '<a class="btn_log" href="register_page.php">Zarejestruj się</a>';
                            echo '<a class="btn_log" href="signin_page.php">Zaloguj się</a>';
                        }                        
                    ?>
                    <nav class="site-nav">
                        <button class="site-nav-trigger">Menu</button>
                        <div class="site-menu">
                        <ul>
                            <li><a href="index.php">STRONA GŁÓWNA</a></li>
                            <li><a href="shop.php?level1=2">KOTY</a></li>
                            <li><a href="shop.php?level1=1">PSY</a></li>                            
                            <li><a href="shop.php?level1=3">PROMOCJE</a></li>
                            <?php
                            if((isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true)) {              
                                echo '
                                <li class="line"></li>
                                <li><a href="messages.php">WIADOMOŚCI</a></li>
                                <li><a href="my_orders.php">ZAMÓWIENIA</a></li>
                                <li><a href="logout.php">WYLOGUJ</a></li>
                                ';
                            }  else {
                                echo '
                                <li><a href="register_page.php">ZAREJESTRUJ SIĘ</a></li>
                                <li><a href="signin_page.php">ZALOGUJ SIĘ</a></li>
                                ';
                            }
                            ?>                
                        </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <nav>
            <div id="nav-container">
                <ul id="menu">
                <li class="menu-element"><a href="index.php">Strona główna</a></li>
                <li class="menu-element">
                    <a href="shop.php?level1=2">Koty</a>
                    <div class="dropdown__menu">
                    <div class="dropdown__element">
                        <a class="element__title" href="shop.php?level1=2&level2=1"> Karma dla kota </a>
                        <ul>
                        <li><a href="shop.php?level1=2&level2=1&level3=1">Sucha karma dla kota</a></li>
                        <li><a href="shop.php?level1=2&level2=1&level3=2">Mokra karma dla kota</a></li>
                        <li><a href="shop.php?level1=2&level2=1&level3=3">Witaminy i sumplementy</a></li>
                        <li><a href="shop.php?level1=2&level2=1&level3=4">Przysmaki</a></li>
                        </ul>
                    </div>
                    <div class="dropdown__element">
                        <a class="element__title" href="shop.php?level1=2&level2=3"> Transport kota </a>
                        <ul>
                        <li><a href="shop.php?level1=2&level2=3&level3=5">Transportery dla kotów</a></li>
                        <li><a href="shop.php?level1=2&level2=3&level3=6">Środki uspokajające do podróży</a></li>
                        <li><a href="shop.php?level1=2&level2=3&level3=7">Szelki i smycze dla kotów</a></li>
                        <li><a href="shop.php?level1=2&level2=3&level3=8">Akcesoria samochodowe</a></li>
                        </ul>
                    </div>
                    <div class="dropdown__element">
                        <a class="element__title" href="shop.php?level1=2&level2=4"> Zabawa i sport </a>
                        <ul>
                        <li><a href="shop.php?level1=2&level2=4&level3=9">Kocimiętka</a></li>
                        <li><a href="shop.php?level1=2&level2=4&level3=10">Grzechotki i maskotki</a></li>
                        <li><a href="shop.php?level1=2&level2=4&level3=11">Wskaźniki laserowe</a></li>
                        <li><a href="shop.php?level1=2&level2=4&level3=12">Tunele</a></li>
                        </ul>
                    </div>
                    </div>
                </li>
                <li class="menu-element">
                    <a href="shop.php?level1=1">Psy</a>
                    <div class="dropdown__menu">
                    <div class="dropdown__element">
                        <a class="element__title" href="shop.php?level1=1&level2=5"> Karma dla psa </a>
                        <ul>
                        <li><a href="shop.php?level1=1&level2=5&level3=13">Sucha karma dla psa</a></li>
                        <li><a href="shop.php?level1=1&level2=5&level3=14">Mokra karma dla psa</a></li>
                        <li><a href="shop.php?level1=1&level2=5&level3=15">Witaminy i sumplementy</a></li>
                        <li><a href="shop.php?level1=1&level2=5&level3=16">Przysmaki</a></li>
                        </ul>
                    </div>
                    <div class="dropdown__element">
                        <a class="element__title" href="shop.php?level1=1&level2=6"> Transport psa </a>
                        <ul>
                        <li><a href="shop.php?level1=1&level2=6&level3=17">Transportery dla psów</a></li>
                        <li><a href="shop.php?level1=1&level2=6&level3=18">Klatki i akcesoria</a></li>
                        <li><a href="shop.php?level1=1&level2=6&level3=19">Miski i poidła podróżne</a></li>
                        <li><a href="shop.php?level1=1&level2=6&level3=20">Akcesoria samochodowe</a></li>
                        </ul>
                    </div>
                    <div class="dropdown__element">
                        <a class="element__title" href="shop.php?level1=1&level2=7"> Spacer z psem </a>
                        <ul>
                        <li><a href="shop.php?level1=1&level2=7&level3=21">Obroże</a></li>
                        <li><a href="shop.php?level1=1&level2=8&level3=22">Smycze</a></li>
                        <li><a href="shop.php?level1=1&level2=9&level3=23">Szelki</a></li>
                        <li><a href="shop.php?level1=1&level2=10&level3=24">Kagańce</a></li>
                        </ul>
                    </div>
                    </div>
                </li>                
                <li class="menu-element"><a href="shop.php?level1=3">Promocje</a></li>
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
    <?php    
    }

    function printFooter() {
    ?>
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
    <?php
    }
    


function printMenuLeft(){

    $sql = "
        SELECT 
            C.`id_category` as `cat_id`,
            C.`name_Category` as `cat_name`,

            MC.`id_main_category` as `main_id`,
            MC.`name_main_category` as `main_name`,

            SC.`id_second_category` as `sec_id`,
            SC.`name_second_category` as `sec_name`
        
        FROM `category` C
        LEFT JOIN `main_category` MC ON MC.`id_category` = C.`id_category`
        LEFT JOIN `second_category` SC ON SC.`id_main_category` = MC.`id_main_category`

        WHERE C.`active` = 1
    ";

    $res = $this->sql($sql);

    $menu = array();
    while ($row = mysqli_fetch_assoc($res)){
        if(!isset($menu[$row['cat_id']])){
            $menu[$row['cat_id']] = array(
                'id'=>$row['cat_id'],
                'name'=>$row['cat_name'],
                'category'=>array(),
            );
        }
        if(!isset($menu[$row['cat_id']]['category'][$row['main_id']])){
            $menu[$row['cat_id']]['category'][$row['main_id']] = array(
                'id'=>$row['main_id'],
                'name'=>$row['main_name'],
                'subcategory'=>array(),
            );
        }
        if(!isset($menu[$row['cat_id']]['category'][$row['main_id']]['subcategory'][$row['sec_id']])){    
            $menu[$row['cat_id']]['category'][$row['main_id']]['subcategory'][$row['sec_id']] = array(
                'id'=>$row['sec_id'],
                'name'=>$row['sec_name'],            
            );
        }
    }   
    
    
    ?>
    <aside>
    <?php
    foreach($menu as $id1=>$level1){
       
        ?><h3><a href="shop.php?level1=<?php echo $id1 ?>&page=1"><?php echo $level1['name']?></a></h3><?php
        foreach($level1['category'] as $id2=>$level2){
         ?><h4><a href="shop.php?level1=<?php echo $id1 ?>&level2=<?php echo $id2 ?>&page=1"><?php echo $level2['name'] ?></a></h4><?php
       
         foreach($level2['subcategory'] as $id3=>$level3){
            ?><a href="shop.php?level1=<?php echo $id1 ?>&level2=<?php echo $id2 ?>&level3=<?php echo $id3 ?>&page=1"><?php echo $level3['name'] ?></a><?php
         }   
       
        }
    }   
    ?>
    </aside>
    <?php
        
}

function blockEntrace() {
    
    if(!isset($_SESSION['user_logged'])) {
        ob_start();
        header("Location: shop.php");
        exit();
    }
    
}

function onlyAdmin() {
    if(!isset($_SESSION['admin_logged'])) {
        ob_start();
        header("Location: shop.php");
        exit();
    }
}

function showProducts(){

    $level1 = (isset($_REQUEST['level1']) && preg_match('/^[0-9]+$/',$_REQUEST['level1'])) ? $_REQUEST['level1'] : 0;
    $level2 = (isset($_REQUEST['level2']) && preg_match('/^[0-9]+$/',$_REQUEST['level2'])) ? $_REQUEST['level2'] : 0;
    $level3 = (isset($_REQUEST['level3']) && preg_match('/^[0-9]+$/',$_REQUEST['level3'])) ? $_REQUEST['level3'] : 0;

    $page = isSet($_GET['page']) ? intval($_GET['page'] - 1) : 1;
    $limit = 9;
    $from = $page * $limit;
    $count = 0;
    $count_l1 = 0;
    $count_l2 = 0;
    $count_l3 = 0;

    if($level1 > 0){
        $count_l2 = $this->sql('SELECT 
                                    COUNT(P.`id_product`) as cnt,                                
                                    MC.`id_main_category` as `level2`,
                                    C.`id_category` as `level1`
                                FROM `product` P
                                JOIN `second_category` SC ON SC.id_second_category = P.`category_product`
                                JOIN `main_category` MC ON MC.`id_main_category` = SC.`id_main_category`
                                JOIN `category` C ON MC.`id_category` = C.`id_category`
                                WHERE C.`id_category`='.$level1);
        
        $count_l2 = mysqli_fetch_assoc($count_l2);
        $count_l2 = $count_l2['cnt'];
    }

    if($level2 > 0){
        $count_l1 = 0;
        $count_l2 = $this->sql('SELECT 
                                    COUNT(P.`id_product`) as cnt,                                
                                    MC.`id_main_category` as `level2`,
                                    C.`id_category` as `level1`
                                FROM `product` P
                                JOIN `second_category` SC ON SC.id_second_category = P.`category_product`
                                JOIN `main_category` MC ON MC.`id_main_category` = SC.`id_main_category`
                                JOIN `category` C ON MC.`id_category` = C.`id_category`
                                WHERE MC.`id_main_category`='.$level2);
        
        $count_l2 = mysqli_fetch_assoc($count_l2);
        $count_l2 = $count_l2['cnt'];
    }

    if($level3 > 0){
        $count_l1 = 0;
        $count_l2 = 0;
        $count_l3 = $this->sql('SELECT COUNT(id_product) as cnt FROM product WHERE category_product='.$level3);
        $count_l3 = mysqli_fetch_assoc($count_l3);
        $count_l3 = $count_l3['cnt'];
    }

    if($level1 != 0 || $level2 != 0 || $level3 != 0){
        $count = $count_l1 + $count_l2 + $count_l3;
    } else {
        $count = $this->sql('SELECT COUNT(id_product) as cnt FROM product');
        $count = mysqli_fetch_assoc($count);
        $count = $count['cnt'];
    }

    $allPage = ceil($count / $limit);
    
    $sql = '
        SELECT 
            P.`id_product`, 
            P.`name_product`, 
            P.`category_product` as `level3`, 
            P.`img_product`, 
            P.`price_product`,
            P.`sellout_product`,
            P.`count_product`, 

            MC.`id_main_category` as `level2`,
            C.`id_category` as `level1`         

        FROM `product` P
        JOIN `second_category` SC ON SC.id_second_category = P.`category_product`
        JOIN `main_category` MC ON MC.`id_main_category` = SC.`id_main_category`
        JOIN `category` C ON MC.`id_category` = C.`id_category`
        WHERE 1=1
           
    ';

    if($level1 > 0) {
        $sql .= " AND  C.`id_category` = ".$level1." ";
    }

    if($level2 > 0) {
        $sql .= " AND  MC.`id_main_category` = ".$level2." ";
    }

    if($level3 > 0) {
        $sql .= " AND  SC.`id_second_category` = ".$level3." ";
    }

    // echo 'PAGE: '.$page.'<br>';
    // echo 'COUNT: '.$count.'<br>';
    // echo 'ALL PAGE: '.$allPage.'<br>';
    // echo 'LIMIT: '.$limit.'<br>';
    // echo 'FROM: '.$from.'<br>';

    $sql .= 'LIMIT '.$from.','.$limit;

    // $this->debug($sql);

    ?>
    <div class="shop__products">         
        <?php
        $res = $this->sql($sql);
        while ($row = mysqli_fetch_assoc($res)){

            $this->showOneTile($row);
        }         
        ?>         
    </div>
    <?php
    $this->pagination($level1, $level2, $level3, $allPage, $page);

}


function pagination($id_cat, $id_main_cat, $id_sec_cat, $allPage, $page) {
    function sector($val, $min, $max) {
        return ($val >= $min && $val <= $max);
    }
    
    ?>
    <div class="shop__pagination">        
        <?php
        if($page > 3) {        
            ?> <a href="shop.php?level1=<?php echo $id_cat ?>&level2=<?php echo $id_main_cat ?>&level3=<?php echo $id_sec_cat ?>&page=1"><<</a> <?php
        }        
        for($i = 1; $i <= $allPage; $i++) {
            $bold = ($i == ($page + 1)) ? 'style="font-weight:700 !important;' : '';
            if(sector($i, ($page - 2), ($page + 4))) {
                ?><a <?php echo $bold ?> href="shop.php?level1=<?php echo $id_cat ?>&level2=<?php echo $id_main_cat ?>&level3=<?php echo $id_sec_cat ?>&page=<?php echo $i ?>"><?php echo $i ?></a><?php
            }
        }
        if($page < $allPage - 4) {        
            ?> <a href="shop.php?level1=<?php echo $id_cat ?>&level2=<?php echo $id_main_cat ?>&level3=<?php echo $id_sec_cat ?>&page=<?php echo $allPage ?>">>></a> <?php
        }
        ?>
    </div>
    <?php
}

    function showOneTile($info){
        ?>
        <div onclick="window.open('item.php?product_id=<?php echo $info['id_product'] ?>','mywindow')" class="shop__item">
                    <img src=<?php echo $info['img_product'] ?> alt="img_item">
                    <h3><?php echo $info['name_product'] ?></h3>
                    <p><?php echo $info['price_product']." zł" ?></p>
                    </div>
        <?php
    }

    function showSelectedProduct() {

        $product_id= $_REQUEST['product_id'];

        $sql = "
        SELECT 
            P.`id_product`, 
            P.`name_product`, 
            P.`category_product` as `level3`, 
            P.`img_product`, 
            P.`price_product`,
            P.`desc_product`,
            P.`sellout_product`,
            P.`count_product`, 

            MC.`id_main_category` as `level2`,
            MC.`name_main_category`,
            C.`id_category` as `level1`,
            C.`name_Category`,
            SC.`name_second_category`         

        FROM `product` P
        JOIN `second_category` SC ON SC.id_second_category = P.`category_product`
        JOIN `main_category` MC ON MC.`id_main_category` = SC.`id_main_category`
        JOIN `category` C ON MC.`id_category` = C.`id_category`
        
        WHERE
            P.`id_product` = $product_id;   
        ";

        $res = $this->sql($sql);
        $row = mysqli_fetch_assoc($res);

        $patchProduct = $row['name_Category']." -> ".$row['name_main_category']." -> ".$row['name_second_category']." -> ".$row['name_product'];

        ?>
        <p><?php echo $patchProduct ?></p>
        <div class="products__item">
            <img src=<?php echo $row['img_product'] ?> alt="item">
            <div class="item__content">
                <h1><?php echo $row['name_product'] ?></h1>
                <p><?php echo $row['desc_product'] ?></p>
                <h3><?php echo $row['price_product']." zł" ?></h3>
                
                <button onclick="addToBasket(<?php echo $row['id_product']?>,<?php echo $row['price_product']?>)" >Dodaj do koszyka</button>
                
            </div>
        </div>
        <?php
    }

    function addToTrolley($id,$price) {
        $_SESSION['trolley_price'] += $price;
        $_SESSION['trolley_products'][] = array(
                'id'=>$id,
                'price'=>$price,
        ) ;
    }


    function showMyTrolley() {
        //$this->debug($_SESSION['trolley_products']);
        

        if (!empty($_SESSION['trolley_products'])) {
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

                ?>
                <div class="ordered__item">                             
                    <img src=<?php echo $row['img_product'] ?> alt="item.jpg">
                    <div class="item__content">
                        <h2><?php echo $row['name_product'] ?></h2>
                        <p><?php echo $row['price_product']." zł" ?></p>
                        
                        <form method="POST">
                            <input type="hidden" name="id_del" value="<?php echo $id?>">
                            <button type="submit" class="item__content--delete">Usuń przedmiot z koszyka</button>
                        </form>   
                        
                    </div>
                </div>
                <?php
                $iter++;
            
                $items[] = array(
                    'id_product'=>$row['id_product'],
                    'price_product'=>$row['price_product'],
                );
            
            }
            //$this->debug($items);
            
            $json = json_encode($items);
            // $this->debug($json);

            ?>
            <form method="POST" action="order.php">
                <input type="hidden" name="makeorder" value="1">
                <button>Złóż zamówienie</button>
            </form>    
            <?php
        }  else {
            echo "Twój koszyk jest pusty!";
        }
    }    
    

    function processPOST(){
       
        // $this->debug($_POST);
        //usuwanie elementu z koszyka
        if(isset($_POST['id_del']) && isset($_SESSION['trolley_products'][ $_POST['id_del']])){
            $id_del = $_POST['id_del'];

            $price_del = $_SESSION['trolley_products'][$id_del]['price'];
            $_SESSION['trolley_price'] -= $price_del;
            unset($_SESSION['trolley_products'][$id_del]);
        }

        


    }

    function showPathProducts() {

        $level1 = (isset($_REQUEST['level1']) && preg_match('/^[0-9]+$/',$_REQUEST['level1'])) ? $_REQUEST['level1'] : 0;
        $level2 = (isset($_REQUEST['level2']) && preg_match('/^[0-9]+$/',$_REQUEST['level2'])) ? $_REQUEST['level2'] : 0;
        $level3 = (isset($_REQUEST['level3']) && preg_match('/^[0-9]+$/',$_REQUEST['level3'])) ? $_REQUEST['level3'] : 0;

        $sql = "
            SELECT 
                C.`id_category` as `cat_id`,
                C.`name_Category` as `cat_name`,

                MC.`id_main_category` as `main_id`,
                MC.`name_main_category` as `main_name`,
                
                SC.`id_second_category` as `sec_id`,
                SC.`name_second_category` as `sec_name`
            
            FROM `category` C
            LEFT JOIN `main_category` MC ON MC.`id_category` = C.`id_category`
            LEFT JOIN `second_category` SC ON SC.`id_main_category` = MC.`id_main_category`

            WHERE 1=1
         ";

        if($level1 > 0) {
            $sql .= " AND  C.`id_category` = ".$level1." ";
        }
    
        if($level2 > 0) {
            $sql .= " AND  MC.`id_main_category` = ".$level2." ";
        }
    
        if($level3 > 0) {
            $sql .= " AND  SC.`id_second_category` = ".$level3." ";
        }
        $sql .= "LIMIT 1"; // ograniczenie wyniku zapytania do jednego wyniku

        $res = $this->sql($sql);
        $row = mysqli_fetch_assoc($res);

        $path= '';
        if($level1 > 0) {
            $path .= $row['cat_name'];
        }
        if($level2 > 0) {
            $path .= ' -> '.$row['main_name'];
        }
        if($level3 > 0) {
            $path .= ' -> '.$row['sec_name'];
        }

        ?>
        <div class="shop__path">
              <p><?php echo $path?></p>
        </div>
        <?php
    }

    function showOrderDone($user_id) {

        $sql = "
        SELECT 
            `id_order_done`,
            `id_user_order_done`,
            `content_order_done`,
            `data_order_done`
        FROM `order_done`
        WHERE `id_user_order_done` = $user_id;
        ";

        $res = $this->sql($sql);
        while ($row = mysqli_fetch_assoc($res)){

            // $this->debug($row);
            
            ?>
            <p><?php echo $row['data_order_done']; ?></p>
            <?php
                
                // $this->debug($row['content_order_done']);                
                $items = json_decode($row['content_order_done'],true);
                // $this->debug($items);
                foreach($items as $item){
                    $sql_sub = "
                        SELECT 
                            `id_product`, 
                            `name_product`, 
                            `img_product` 
                        FROM `product`
                        WHERE `id_product` = ".$item['id_product']."
                    ";

                    $res_sub = $this->sql($sql_sub);
                    $row_sub = mysqli_fetch_assoc($res_sub);
                    
                ?>                
                <div class="ordered__item">                    
                    <img src=<?php echo $row_sub['img_product'] ?> alt="item.jpg">
                    <div class="item__content">
                        <h2><?php echo $row_sub['name_product'] ?></h2>
                        <p><?php echo $item['price_product'] ?></p>
                    </div>
                </div>                
                <?php
                }          
        }
    }

    function showMessages($user_id) {
        $sql = "
        SELECT 
            `id_message`,
            `id_user`,
            `email_user`,
            `subject_message`,
            `text_message`,
            `answer_message`
        FROM `messages`
        WHERE `id_user` = $user_id;
        ";

        $res = $this->sql($sql);
        while ($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="container__message">
                <div class="message__user">   
                    <h2><?php echo $row['subject_message'] ?></h2>
                    <p><?php echo $row['text_message'] ?></p>
                </div>
                <div class="message__admin">
                    <p>Odpowiedź:</p>
                    <p><?php echo $row['answer_message'] ?></p>
                </div>
            </div>
            <?php
        }
    }
    
    function editCategory() {

        $sql_cat = "
        SELECT 
            `id_category`,
            `name_Category`
        FROM `category`
        ";
        $res_cat = $this->sql($sql_cat);
        ?>
        <div class="container__element">
            <form method="POST" action="change_category.php">
            <select name="selected_cat" size="5">    
            <?php        
            while ($row_cat = mysqli_fetch_assoc($res_cat)){
            ?>
                <option value=<?php echo $row_cat['id_category'] ?>><?php echo $row_cat['name_Category'] ?></option>
            <?php } ?>
            </select>
            <input type="text" id="new_cat" name="new_cat">
            <button type="submit">Potwierdź zmianę nazwy</button>
            </form>
        </div>
        <?php
        $sql_main_cat = "
        SELECT 
            `id_main_category`,
            `name_main_category`
        FROM `main_category`
        ";
        $res_main_cat = $this->sql($sql_main_cat);
        ?>
        <div class="container__element">
            <form method="POST" action="change_category.php">
            <select name="selected_main_cat" size="5">    
            <?php        
            while ($row_main_cat = mysqli_fetch_assoc($res_main_cat)){
            ?>
                <option value=<?php echo $row_main_cat['id_main_category'] ?>><?php echo $row_main_cat['name_main_category'] ?></option>
            <?php } ?>
            </select>
            <input type="text" id="new_main_cat" name="new_main_cat">
            <button>Potwierdź zmianę nazwy</button>
            </form>
        </div>
        <?php
        $sql_sec_cat = "
        SELECT 
            `id_second_category`,
            `name_second_category`
        FROM `second_category`
        ";
        $res_sec_cat = $this->sql($sql_sec_cat);
        ?>
        <div class="container__element">
            <form method="POST" action="change_category.php">
            <select name="selected_sec_cat" size="5">    
            <?php        
            while ($row_sec_cat = mysqli_fetch_assoc($res_sec_cat)){
            ?>
                <option value=<?php echo $row_sec_cat['id_second_category'] ?>><?php echo $row_sec_cat['name_second_category'] ?></option>
            <?php } ?>
            </select>
            <input type="text" id="new_sec_cat" name="new_sec_cat">
            <button>Potwierdź zmianę nazwy</button>
            </form>
        </div>
        <?php        
    }

    function editOrderStatus() {
        $sql ="
            SELECT 
                `id_order_done`,
                `order_status`
            FROM `order_done`
            ";
    
        $res = $this->sql($sql);
        ?>
        <div class="container__element">
            <form method="POST" action="change_status.php">
            <select name="selected_order" size="5">    
            <?php                  
            while ($row = mysqli_fetch_assoc($res)){
                if($row['order_status'] != "Dostarczone") {
            ?>
                <option value=<?php echo $row['id_order_done'] ?>><?php echo $row['id_order_done']."| ".$row['order_status'] ?></option>
            <?php }} ?>
            </select>            
                <label><input type="radio" name="status" value="Przekazane kurierowi" checked>Przekazane kurierowi</label>
                <label><input type="radio" name="status" value="W drodze do klienta">W drodze do klienta</label>
                <label><input type="radio" name="status" value="Dostarczone">Dostarczone</label>
                <button type="submit">Potwierdź zmianę stanu zamówienia</button>
            </form>
        </div>
        <?php
    }

    function showMessagesAdmin() {
        $sql = "
        SELECT 
            `id_message`,
            `email_user`,
            `subject_message`,
            `answer_message`
        FROM `messages`
        ";

        $res = $this->sql($sql);
        while ($row = mysqli_fetch_assoc($res)){            
            if(strlen($row['answer_message']) == 0) {
                ?>
                <div class="messages__admin" onclick="window.open('admin_message.php?message_id=<?php echo $row['id_message'] ?>','mywindow')">
                    <p><?php echo $row['email_user'] ?></p>
                    <h4><?php echo $row['subject_message'] ?></h4>
                </div>
                <?php
            }
        }
    }

    function answerMessage() {

        $message_id= $_REQUEST['message_id'];

        $sql = "
        SELECT 
            `id_message`,
            `email_user`,
            `subject_message`,
            `text_message`,
            `answer_message`
        FROM `messages`
        WHERE `id_message` = $message_id;
        ";

        $res = $this->sql($sql);
        $row = mysqli_fetch_assoc($res);

        ?>
        <div class="message__admin">
            <p><?php echo $row['email_user'] ?></p>
            <h2><?php echo $row['subject_message'] ?></h2>
            <p><?php echo $row['text_message'] ?></p>
            <form method="POST" action="answer_message.php">
                <input type="hidden" id="message_id" name="message_id" value="<?php echo $message_id ?>">
                <textarea name="answer" id="answer" cols="30" rows="10"></textarea>
                <button type="submit">Odpowiedz</button>
            </form>
        </div>
        <?php
    }

    
}
?>