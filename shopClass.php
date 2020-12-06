<?php

class shop extends main{

function printHtmlHeader(){
?>
<head>
    <meta charset="UTF-8" />
    <title><?php echo ($this->shopName)?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Krzysztof Piotrowski" />
    <meta name="description" content="Projekt z przedmiotu projektowania aplikacji internetowych" />
    <link rel="stylesheet" type="text/css" href="styles/style.css?v=<?php echo time();?>" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700;900&display=swap" rel="stylesheet" /> 	
  </head>
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
       
        ?><h3><a href="shop.php?level1=<?php echo $id1 ?>"><?php echo $level1['name']?></a></h3><?php
        foreach($level1['category'] as $id2=>$level2){
         ?><a href="shop.php?level1=<?php echo $id1 ?>&level2=<?php echo $id2 ?>"><?php echo $level2['name'] ?></a><?php
       
         foreach($level2['subcategory'] as $id3=>$level3){
            ?><a href="shop.php?level1=<?php echo $id1 ?>&level2=<?php echo $id2 ?>&level3=<?php echo $id3 ?>">--<?php echo $level3['name'] ?></a><?php
         }   
       
        }
    }   
    ?>
    </aside>
    <?php
        
}



function showProducts(){

    $level1 = (isset($_REQUEST['level1']) && preg_match('/^[0-9]+$/',$_REQUEST['level1'])) ? $_REQUEST['level1'] : 0;
    $level2 = (isset($_REQUEST['level2']) && preg_match('/^[0-9]+$/',$_REQUEST['level2'])) ? $_REQUEST['level2'] : 0;
    $level3 = (isset($_REQUEST['level3']) && preg_match('/^[0-9]+$/',$_REQUEST['level3'])) ? $_REQUEST['level3'] : 0;


    $sql = "
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
        
        WHERE
            1=1   
    ";

    if($level1 > 0){
        $sql .= " AND  C.`id_category` = ".$level1." ";
    }

    if($level2 > 0){
        $sql .= " AND  MC.`id_main_category` = ".$level2." ";
    }

    if($level3 > 0){
        $sql .= " AND  SC.`id_second_category` = ".$level3." ";
    }

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

}

    function showOneTile($info){
        ?>
        <div class="shop__item">
                    <img src=<?php echo $info['img_product'] ?> alt="img_item">
                    <h3><?php echo $info['name_product'] ?></h3>
                    <p><?php echo $info['price_product']." zł" ?></p>
                    </div>
        <?php
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

        if($level1 > 0){
            $sql .= " AND  C.`id_category` = ".$level1." ";
        }
    
        if($level2 > 0){
            $sql .= " AND  MC.`id_main_category` = ".$level2." ";
        }
    
        if($level3 > 0){
            $sql .= " AND  SC.`id_second_category` = ".$level3." ";
        }

        $sql .= "LIMIT 1"; // ograniczenie wyniku zapytania do jednego wyniku
        $res = $this->sql($sql);
        // $this->debug($sql);

        $row = mysqli_fetch_assoc($res);
        // $this->debug($row);

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
}
?>