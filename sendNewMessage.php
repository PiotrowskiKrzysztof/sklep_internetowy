<?php

session_start();  
require_once('mainClass.php');
require_once('shopClass.php');
require_once('settings.php');

 $s = new shop();
 $s -> SQLConnect($sqlConfig);



 if(isset($_POST['email_mes']) && isset($_POST['subject_mes']) && isset($_POST['body_mes'])) {
    //  $email = $_POST['email_mes'];
    //  $subject = $_POST['subject_mes'];
    //  $body = $_POST['body_mes'];
    //  $admin_email = "krzysiek.p97@gmail.com";    

    // $header = "From:".$email." \nContent-Type:".
    // ' text/plain;charset="UTF-8"'.
    // "\nContent-Transfer-Encoding: 8bit";
    // $to = $admin_email;
    // $message = $body;

    $to_email = $_POST['email_mes'];
    $subject = $_POST['subject_mes'];
    $body = $_POST['body_mes'];
    $headers = "krzysiek.p97@gmail.com";


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
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }


 }