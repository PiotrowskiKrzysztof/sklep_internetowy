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
$answer = mysqli_real_escape_string($s->linkSQL, $answer);
$message_id = $_POST['message_id'];

$sql = "UPDATE `messages`
        SET `answer_message`= '".$answer."'
        WHERE id_message = $message_id";

$s->debug($sql);
$s->sql($sql);

$sql_mail = "
  SELECT 
      `id_message`,
      `email_user`,
      `subject_message`,
      `text_message`
  FROM `messages`
  WHERE `id_message` = $message_id;
";
$res = $s->sql($sql_mail);
$row = mysqli_fetch_assoc($res);

$to_email = "krzysiek.p97@gmail.com";
$subject = $row['subject_message'];
$body = $row['email_user']." napisał:\n\n".$row['text_message']."\n\nOdpowiedź:".$answer;
$headers = "From: ".$row['email_user'];

if (mail($to_email, $subject, $body, $headers)) {
  header("Location: admin_messages.php");
} else {
  echo "Email sending failed...";
}
?>