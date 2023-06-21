<?php
    // $name = $_POST['name'];
    // $visitor_email = $_POST['email'];
    // $subject = $_POST['subject'];
    // $message = $_POST['message'];

    // $email_from = 'EZ-Computer.com';
    // $email_subject = 'Pesan baru dari Ez - Computer';
    // $email_body = "User Name: $name.\n".
    //                 "User Email: $visitor_email.\n".
    //                 "Subject: $subject.\n".
    //                 "User Message: $message .\n";

    // $to = 'romeoaditya22@gmail.com';

    // $headers = "From: $email_from \r\n";

    // // $headers .= "Reply-To: $visitor_email \r\n";

    // mail($to,$email_subject,$email_body,$headers);

    // header("Location:contact.html");

    // 111111

    // $errors = [];
    // $errorMessage = '';
    
    // if (!empty($_POST)) {
    //    $name = $_POST['name'];
    //    $email = $_POST['email'];
    //    $subject = $_POST['subject']
    //    $message = $_POST['message'];
    
    //    if (empty($name)) {
    //        $errors[] = 'Name is empty';
    //    }
    
    //    if (empty($email)) {
    //        $errors[] = 'Email is empty';
    //    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //        $errors[] = 'Email is invalid';
    //    }
    
    //    if (empty($message)) {
    //        $errors[] = 'Message is empty';
    //    }
    
    //    if (empty($errors)) {
    //        $toEmail = 'romeoaditya22@gmail.com';
    //        $emailSubject = 'New email from your contact form';
    //        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
    //        $bodyParagraphs = ["Name: {$name}", "Email: {$email}","Subject: {$subject}", "Message:", $message];
    //        $body = join(PHP_EOL, $bodyParagraphs);
    
    //        if (mail($toEmail, $emailSubject, $body, $headers)) {
    
    //            header('Location: contact.html');
    //        } else {
    //            $errorMessage = 'Oops, something went wrong. Please try again later';
    //        }
    
    //    } else {
    
    //        $allErrors = join('<br/>', $errors);
    //        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    //    }
    // }

    // 222222

    $name = $_POST['name'];
    $email = $_POST['email'];
    $usermessage = $_POST['message'];
    
    $message ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $usermessage; 
    
    $subject ="My email subject";
    $fromname ="My Website Name";
    $fromemail = 'noreply@codeconia.com';  //if u dont have an email create one on your cpanel

    $mailto = 'romeoaditya22@gmail.com';  //the email which u want to recv this email




    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo "mail send ... OK"; // do what you want after sending the email
        
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
    
?>