<?php

if (isset($_POST["submit"])) {

    $error = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $programme = $_POST['programme'];    
    $message = $_POST['message'];

    $from = 'Edu Thrive Website';
    $myEmail = 'info@eduthrive.co.zw';
    $subject = 'Website Enquiry';

    $body = "From: $name \n E-Mail: $email Phone: $phone \n Programme: $programme \n Message: $message";

    // Check if name has been entered
    if (!isset($_POST['name']) || strlen($_POST['name']) === 0) {
        $error['name'] = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!isset($_POST['message']) || strlen($_POST['name']) === 0) {
        $error['message'] = 'Please enter your message';
    }


// If there are no errors, send the email
    if (empty($error)) {
            $headers = array("From: info@eduthrive.co.zw",
            "Reply-To: info@eduthrive.co.zw",
            "X-Mailer: PHP/" . PHP_VERSION
        );
        $headers = implode("\r\n", $headers);
        if (mail($myEmail, $subject, $body, $headers)) {
            $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
        } else {
            $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
        }
        
    }
    
    header("Location: index.html?mailSent");

}
?>