<?php
$email_to = 'pierre.ogeron@gmail.com';

if (isset($_REQUEST['send_mail'])) {

    $form_name = htmlspecialchars($_REQUEST['form_name']);
    $form_email = htmlspecialchars($_REQUEST['form_email']);
    $form_subject = htmlspecialchars($_REQUEST['form_subject']);
    $form_text = htmlspecialchars($_REQUEST['form_text']);

    if (empty($form_name) || empty($form_email) || empty($form_text)) {
        die ('Please fill in all required fields!');
    }

    $message = "
    Name: ".$form_name."<br><br>
    E-mail: ".$form_email."<br><br>
    Comment: ".$form_text;

    $headers = 'From: '. $form_email . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=utf-8' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if(mail($email_to, $form_subject, $message, $headers)) {
        echo 'Done! Thank You!';
    }
}