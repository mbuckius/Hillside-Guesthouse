<?php
    
    // echo "<pre>";
    //     print_r($_POST);
    // echo '</pre>';

    if (isset($_POST['submit'])) {
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "m.buckius@yahoo.com";
        $headers = "From: ".$userEmail;
        $txt = "You have recieved an email from ".$userName.".\n\n".$message;

        mail($to, $messageSubject, $txt, $headers);

        header("Location: index.php?mailsend");

    }
 
    //check to see if the email is not empty
    if(isset($_POST['email']) && $_POST['email'] != '') {

        //check to see if email is valid
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            
            //set up email
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

            $to = "mayuribuckius@gmail.com";
            $body = "";

            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            //mail email
            mail($to, $messageSubject, $body);

            $message_sent = true;
        }
        else {
            $invalid = "form-invalid";
        }
    }

?>