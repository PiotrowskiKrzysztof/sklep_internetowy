<?php
    session_start();  
    require_once('../mainClass.php');
    require_once('../shopClass.php');
    require_once('../settings.php');
  
    $s = new shop();
    $s -> SQLConnect($sqlConfig);

    if(!empty($_GET['q'])) {
        $q = $_GET['q'];
        $sql = "
            SELECT
                `id_product`,
                `name_product`,
                `category_product`,
                `price_product`
            FROM `product`
            WHERE name_product LIKE '%$q%'
        ";
        $res = $s->sql($sql);
        while ($row = mysqli_fetch_assoc($res)){
            ?><a href="item.php?product_id=<?php echo $row['id_product'] ?>"><?php echo $row['name_product'] ?></a><?php
        }
    }
    
?>
