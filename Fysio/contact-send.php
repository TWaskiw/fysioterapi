<?php 
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];

    $email_from = 'thomaswwpedersen@gmail.com';
    $email_subject = "Ny besked på hjemmeside";
    $email_body = "Fra: $name\n". 
                  "Email: $email\n".
                  "Besked: $message\n";

                  $to = "runelehtonen98@gmail.com";
                  $headers = "From: $email_from \r\n";
                  $headers.= "Reply-To: $visitor_email \r\n";
                  mail($to,$email_subject,$email_body,$headers);

                  header("Location: index.php");
    ?>