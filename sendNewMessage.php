<?php

session_start();  
require_once('mainClass.php');
require_once('shopClass.php');
require_once('settings.php');

 $s = new shop();
 $s -> SQLConnect($sqlConfig);



 if(isset($_POST['email_mes']) && isset($_POST['subject_mes']) && isset($_POST['body_mes'])) {

    $to_email = "krzysiek.p97@gmail.com";
    $subject = $_POST['subject_mes'];
    $body = $_POST['body_mes'];
    $headers = "From: ".$_POST['email_mes'];

    echo $headers;


    $sql = "
        INSERT INTO `messages`(
            `id_message`,
            `id_user`,
            `email_user`,
            `subject_message`,
            `text_message`,
            `answer_message`)
        VALUES (
            NULL,
            ".$_SESSION['id'].",
            '".$to_email."',
            '".$subject."',
            '".mysqli_real_escape_string($s->linkSQL, $body)."',
            ''
            )
    ";

    $s->sql($sql);
    
   
    
    if (mail($to_email, $subject, $body, $headers)) {
        header("Location: messages.php");
    } else {
        echo "Email sending failed...";
    }


 }