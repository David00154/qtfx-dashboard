<?php

// function mailUser($email, $fname, $amount)
function mailUser($email, $subject, $body)
{

    $subject = "QTFx: $subject";
    $text = nl2br(htmlentities($body, ENT_QUOTES, 'UTF-8'));
    //$email= $mail;
    $msg = '<!DOCTYPE html">
        <html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        </head>
        
        <body style="margin: 0; padding: 0;">
        <p>' . $text . '</p>
        
        
        
        Thank you,<br>
        QTFx Limited <br>
        https://www.qtfx.space/ <br>


        <p style="margin: 0 0 16px">Copyright © 2022 <a style="color: #7f54b3; font-weight: normal; text-decoration: underline" href="https://".$url target="_blank" rel="noreferrer">QTFx.</a> All Rights Reserved.</p>
        
        </body>';

    sendMail($subject, $msg, $email);
}
