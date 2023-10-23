<?php

include "../../core/config.php";
if (!isLogged()) {
    header("location: ../../login.php");
    exit;
}

$getlist = "";
$getuser = $royaldb->query("SELECT * FROM user WHERE id > 0 ORDER BY id DESC") or die($royaldb->error);
$getlist .= "<option>--SELECT USER--</option>";
if ($getuser->num_rows > 0) {
    while ($load = $getuser->fetch_object()) {
        $id = $load->id;
        $user = $load->username;
        $getlist .= '<option value="' . $id . '">' . $user . '</option>';
    }
}

$mErr = "";
if (isset($_POST['add'])) {
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $userid = $_POST['userid'];

    $usr = new Royaltechinc\Mailer;
    $usr->mailUser(getUser($userid, "email"), $subject, $body);
    $_SESSION["alert"] = '<div class="alert-box alert-primary">
                            <div class="alert-txt"><em class="ti ti-ok"></em>Email Successfully sent to ' . getUser($userid, "username") . '!</div>
                        </div>';
    header("location: mail-user.php");
    exit;
}

?>




<!DOCTYPE html>
<html lang="zxx" class="js">

<head>

    <!--Start of Tawk.to Script-->

    <!--End of Tawk.to Script-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>QTFx</title>
    <link rel="stylesheet" href="assets/css/ac.vendor.bundle.css">
    <link rel="stylesheet" href="assets/css/ac.style.css">
    <!-- Start of  Zendesk Widget script -->

    <!-- End of  Zendesk Widget script -->
</head>

<body class="user-dashboard">
    <?php

    include "header.php";
    ?>
    <!-- TopBar End -->


    <div class="user-wraper">
        <div class="container">
            <div class="d-flex">
                <?php
                include "sidebar.php";
                ?>

                <div class="user-content">
                    <div class="user-panel">


                        <h2 class="user-panel-title">User Top up</h2>

                        <hr class="linie">


                        <?php
                        if (isset($_SESSION["alert"])) {
                            echo $_SESSION["alert"];
                            unset($_SESSION["alert"]);
                        }
                        ?>
                        <div class="gaps-1x"></div>

                        <form method=post name="spendform">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment-from">
                                        <label for="txtAmount"><strong>Email Subject</strong></label>
                                        <div class="payment-input">
                                            <input class="input-bordered" type="text" id="txtAmount" name="subject" value='' required>
                                            <!-- <span class="payment-from-cur payment-cal-cur">USD</span> -->
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div>


                            <div class="gaps-2x"></div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment-from">
                                        <label for="txtAmount"><strong>Email Body</strong></label>
                                        <div class="payment-input">
                                            <!-- <input class="input-bordered" type="text" id="txtAmount" name="subject" value='' required> -->
                                            <textarea class="input-bordered" name="body" id="" cols="30" rows="10" required></textarea>
                                            <!-- <span class="payment-from-cur payment-cal-cur">USD</span> -->
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div>


                            <div class="gaps-2x"></div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment-from">
                                        <label for="txtAmount"><strong>User Details</strong></label>
                                        <div class="payment-input">
                                            <select name="userid" required>
                                                <?= $getlist ?>

                                            </select>

                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div>
                            <div class="gaps-2x"></div>

                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="payment-from">
                                        <label for="txtAmount"><strong>Method</strong></label>
                                        <div class="payment-input">
                                            <select name="method" required>
                                                <option value="">--SELECT METHOD--</option>
                                                <option value="Bitcoin">Bitcoin</option>
                                                <option value="Paypal">Paypal</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="Money Gram">Money Gram</option>
                                                <option value="Western Union">Western Union</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="gaps-3x"></div>
                            <button name="add" type="submit" class="btn btn-primary payment-btn">Send</button>



                        </form>



                    </div>
                </div><!-- .user-content -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- UserWraper End -->


    <div class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="footer-copyright">Copyright &copy; 2020. All Rights Reserved</span>
                </div><!-- .col -->
                <div class="col-md-5 text-md-right">
                    <ul class="footer-links">
                        <li><a href="">Terms & Conditions</a></li>
                        <li><a href="">Privacy Policy</a></li>
                    </ul>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- FooterBar End -->
    <script src="assets/js/ac.jquery.bundle.js"></script>
    <script src="assets/js/ac.script.js"></script>



</body>

</html>