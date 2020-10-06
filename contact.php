<?php

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $phone = $_POST['phone_number'];
    $programme = $_POST['programme'];
    $message = $_POST['message'];

    $mailTo = "info@eduthrive.co.zw";
    $headers = "From: ".$mailFrom;
    $txt = "There is a new website enquiry from ".$name.".\n\n".$message;

    mail($mailTo,"Website Enquiry",$txt,$headers);
    header("Location: index.php?mailSent");
}
?>