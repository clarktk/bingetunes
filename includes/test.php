<?php

/**
 * mymail function
 * This funciton will implement the PHPMailer Third Party class to allow
 * SMTP from authenticated host <br>
 * 
 * Notes:  Need PHPMailer from Worxware @link http://phpmailer.worxware.com
 *         Mail Host:  GMAIL
 *         Mail Account:  yourgmail.com
 * 
 */


function mymail($replyToEmail='daniel.bujold.0719@gmail.com',
                $replyToName='BingeTunes',
                $mailSubject='BingeTunes Email',
                $messageHTML='This is the test HTML message body <b>in bold!</b>',
                $messageTEXT='This is the test body in plain text for non-HTML mail clients',
                $fromEmail='daniel.bujold.0719@gmail.com', 
                $fromName='BingeTunes', 
                $toEmail='daniel.bujold.0719@gmail.com',
                $toName='Your Name'

                
){    
    //get required files
    require 'PHPMailerAutoload.php';

    //Instantiate object
    $mail = new PHPMailer;

    $mail->isSMTP();                                      	 // Set mailer to use SMTP
    $mail->SMTPDebug = 1;               			 // debugging 1=errors and messages, 2=messages only
    $mail->Host = 'smtp.gmail.com';                      // Specify mail server
    $mail->Port = 465;                 				 // Gmail mail port  
    $mail->SMTPAuth = true;                               	 // Enable SMTP authentication
    $mail->Username = 'daniel.bujold.0719@gmail.com';        // SMTP username
    $mail->Password = 'oulton1234';                           	 // SMTP password
    $mail->SMTPSecure = 'ssl';                           	 // Enable encryption, 'ssl', ,'tsl' also accepted

    $mail->From = $fromEmail;     //who mail is from
    $mail->FromName = $fromName;
    $mail->addAddress($toEmail, $toName);                        // Add a recipient
    //$mail->addAddress('ellen@example.com');              	 // Name is optional
    //
    if (!empty($replyToEmail)){
        $mail->addReplyTo($replyToEmail, $replyToName);
    }
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    /*
    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    */

    $mail->isHTML(true);                      // Set email format to HTML

    $mail->Subject = $mailSubject;            //the email subject
    $mail->Body    = $messageHTML;            //the HTML message body
    $mail->AltBody = $messageTEXT;            //Alternate message (text only version)

    //Send the Email
    if($mail->send()){
        return true;
    }else {
        return false;
    }
//    if(!$mail->send()) {
//       echo 'Message could not be sent.';
//       echo 'Mailer Error: ' . $mail->ErrorInfo;
//       exit;
//    }
//
//    echo 'Message has been sent';

}

$result = mymail('daniel.bujold.0719@gmail.com',
                'CoffeeBuzz',
                'CoffeeBuzz Email',
                'This is the test HTML message body <b>in bold!</b>',
                'This is the test body in plain text for non-HTML mail clients',
                'daniel.bujold.0719@gmail.com', 
                'CoffeeBuzz', 
                'daniel.bujold.0719@gmail.com',
                'Your Name');


