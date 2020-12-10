<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');



$s = new shop();
$s -> SQLConnect($sqlConfig);
$s -> onlyAdmin();

if((!isset($_POST['status'])) && (!isset($_POST['selected_order']))) {
    header('Location: admin_order_status.php');
    exit();
}

$status = $_POST['status'];
$id_order = $_POST['selected_order'];
echo $status." | ".$id_order;

$sql = "UPDATE `order_done`
        SET `order_status`= '".$status."'
        WHERE id_order_done = $id_order";

// $s->debug($sql);
$s->sql($sql);
  
header("Location: admin_order_status.php")
?>