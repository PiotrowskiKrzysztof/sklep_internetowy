<?php
  session_start();  
  require_once('mainClass.php');
  require_once('shopClass.php');
  require_once('settings.php');



$s = new shop();
$s -> SQLConnect($sqlConfig);
$s -> onlyAdmin();

if(!isset($_POST['answer'])) {
    header('Location: admin_message.php');
    exit();
}

$answer = $_POST['answer'];
$message_id = $_POST['message_id'];

$sql = "UPDATE `messages`
        SET `answer_message`= '".$answer."'
        WHERE id_message = $message_id";

$s->debug($sql);
$s->sql($sql);
  
header("Location: admin_messages.php")
?>