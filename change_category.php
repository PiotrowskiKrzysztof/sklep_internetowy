<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');



$s = new shop();
$s -> SQLConnect($sqlConfig);
$s -> onlyAdmin();

if((isset($_POST['selected_cat'])) && (isset($_POST['new_cat']))) {

    $id_cat = $_POST['selected_cat'];
    $new_name_cat = $_POST['new_cat'];

    $sql = "UPDATE `category`
        SET `name_Category`= '".$new_name_cat."'
        WHERE id_category = $id_cat";

    $s->sql($sql);
    // echo $id_cat."  ".$new_name_cat;

    header('Location: admin_edit_category.php');
}

if((isset($_POST['selected_main_cat'])) && (isset($_POST['new_main_cat']))) {

    $id_main_cat = $_POST['selected_main_cat'];
    $new_name_main_cat = $_POST['new_main_cat'];

    $sql = "UPDATE `main_category`
        SET `name_main_category`= '".$new_name_main_cat."'
        WHERE id_main_category = $id_main_cat";

    $s->sql($sql);
    // echo $id_main_cat."  ".$new_name_main_cat;

    header('Location: admin_edit_category.php');
}

if((isset($_POST['selected_sec_cat'])) && (isset($_POST['new_sec_cat']))) {

    $id_sec_cat = $_POST['selected_sec_cat'];
    $new_name_sec_cat = $_POST['new_sec_cat'];

    $sql = "UPDATE `second_category`
        SET `name_second_category`= '".$new_name_sec_cat."'
        WHERE id_second_category = $id_sec_cat";

    // $s->debug($sql);
    $s->sql($sql);
    // echo $id_sec_cat."  ".$new_name_sec_cat;

    header('Location: admin_edit_category.php');
}
  

?>