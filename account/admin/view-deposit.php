<?php

include "../../core/config.php";
if (!isLogged()) {
    header("location: ../../login.php");
    exit;
}
if (isset($_GET['id'])) {
    $depo = $_GET['id'];
    $ptype = 1;
    if ($ptype == 1) {
        $pntype = 5;
        $pntypen = "5 Days";
    } else {
        $pntype = 5;
        $pntypen = "5 Weeks (35 Days)";
    }
    $profit = round(getDepo($depo, "t_profit") / $pntype, 2);
}


if (isset($_POST['deposit'])) {
    $amount = $_POST['amount'];
    $p_profit = $_POST['pprofit'];
    $t_profit = $p_profit - $amount;
    $type = 1;
    $interest = round($t_profit / $pntype, 2);
    $userid = getDepo($depo, "user_id");
    if ($type == 1) {
        $i_time = generateTime("+1 day");
        $p_time = 5;
        $mailtype = "5 Days";
        $profittype = "weekly";
    } else {
        $i_time = generateTime("+7 days");
        $p_time = 5;
        $mailtype = "5 Weeks (35 Days)";
        $profittype = "monthly";
    }
    echo $amount;
    echo $p_profit;
    $updateDepo = $royaldb->query("UPDATE deposit SET amount='$amount', status=1, interest=$interest, t_profit='$t_profit' WHERE id=$depo");
    $updateUser = $royaldb->query("UPDATE user SET deposit= deposit + $amount, interest='$interest', interest_time='$i_time', profit_times='$p_time', status=1 WHERE id=$userid") or die($royaldb->error);
    $usr = new Royaltechinc\Mailer;
    $usr->mailUserDepo(getUser($userid, "email"), getUser($userid, "full_name"), $amount, $mailtype, $t_profit);
    $_SESSION["alert"] = '<div class="alert-box alert-primary">
                            <div class="alert-txt"><em class="ti ti-ok"></em>Deposit Successful!</div>
                        </div>';
    header("location: deposit.php");
    exit;
}



?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>QTFx Trade</title>
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

                        <h2 class="user-panel-title">User Deposits</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tile-item title-item3 tile-primary">
                                    <div class="tile-bubbles"></div>
                                    <h6 class="tile-title">Total Invested</h6>
                                    <h1 class="tile-info"><?= totalAdminDeposit() ?> USD</h1>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tile-item title-item3 tile-light">
                                    <div class="tile-bubbles"></div>
                                    <h6 class="tile-title">Total Profit</h6>
                                    <h1 class="tile-info" style="color:#4d54f6;"><?= $UserDetails->earnings ?> USD</h1>
                                </div>
                            </div>
                        </div>
                        <hr class="linie">



                        <div class="gaps-1x"></div>

                        <form method=post name="spendform">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment-from">
                                        <label for="txtAmount"><strong>Deposit Amount</strong></label>
                                        <div class="payment-input">
                                            <input class="input-bordered" type="number" id="txtAmount" name="amount" value='<?= getDepo($depo, "amount") ?>'>
                                            <span class="payment-from-cur payment-cal-cur">USD</span>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div>
                            <div class="gaps-2x"></div>

                            <div class="payment-summary">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="payment-summary-item payment-summary-final">
                                            <h6 class="payment-summary-title">Plan type</h6>
                                            <div class="payment-summary-info">
                                                <input name="plantype" class="input-bordered" type="text" id="lblHourlyProfit" value='<?= $pntypen ?>' readonly>
                                                <span id="lblHourlyProfit" class="payment-summary-amount"></span>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-md-4">
                                        <div class="payment-summary-item payment-summary-bonus">
                                            <h6 class="payment-summary-title">Deposit Profit</h6>
                                            <div class="payment-summary-info">
                                                <input name="wprofit" class="input-bordered" type="number" id="lblWeeklyProfit" value='<?= $profit ?>' readonly>
                                                <span id="lblDailyProfit" class="payment-summary-amount"></span> <span>USD</span>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-md-4">
                                        <div class="payment-summary-item payment-summary-tokens">
                                            <h6 class="payment-summary-title">Total Profit</h6>
                                            <div class="payment-summary-info">
                                                <input name="pprofit" class="input-bordered" type="number" id="lblMonthlyProfit" value='<?= getDepo($depo, "t_profit") + getDepo($depo, "amount") ?>'>
                                                <span id="lblMonthlyProfit" class="payment-summary-amount"></span> <span>USD</span>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                            <div class="gaps-2x"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment-from">
                                        <label for="txtWallet"><strong>Paid Wallet</strong></label>
                                        <div class="payment-input">
                                            <input class="input-bordered" type="text" id="txtWallet" name="wallet" value='<?= getDepo($depo, "wallet") ?>' readonly>
                                            <span class="payment-from-cur payment-cal-cur">BTC WALLET</span>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div>
                            <div class="gaps-2x"></div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment-from">
                                        <label for="txtDetails"><strong>User Details</strong></label>
                                        <div class="payment-input">
                                            <input class="input-bordered" type="text" id="txtDetails" name="name" value='<?= getUser(getDepo($depo, "user_id"), "full_name") ?>' readonly>

                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div>

                            <div class="gaps-3x"></div>
                            <button name="deposit" type="submit" class="btn btn-primary payment-btn">Approve</button>



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
                    <span class="footer-copyright">Copyright &copy; 2020 <a href="https://coincompany.biz">CryptoCapital Trader.com</a>. All Rights Reserved</span>
                </div><!-- .col -->
                <div class="col-md-5 text-md-right">
                    <ul class="footer-links">
                        <li><a href="../terms">Terms & Conditions</a></li>
                        <li><a href="../privacy">Privacy Policy</a></li>
                    </ul>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- FooterBar End -->
    <script src="assets/js/ac.jquery.bundle.js"></script>
    <script src="assets/js/ac.script.js"></script>


    <script>
        (function() {
            $(".responsive-nav").click(function() {
                return $(".responsive-nav").addClass("cross");
            });
            $(".st-pusher").click(function() {
                $('.responsive-nav').removeClass('cross');
            });
            $.get("https://api.coinmarketcap.com/v1/ticker/?limit=100", function(data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].id == "bitcoin") {
                        $(".BTCLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                    } else if (data[i].id == "ethereum") {
                        $(".ETHLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                    } else if (data[i].id == "litecoin") {
                        $(".LTCLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                    } else if (data[i].id == "bitcoin-cash") {
                        $(".BCHLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                    } else if (data[i].id == "dash") {
                        $(".DASHLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                    } else if (data[i].id == "dogecoin") {
                        $(".DOGELive").text(parseFloat(data[i].price_usd).toFixed(6) + " USD");
                    }
                }
            });
        }).call(this);
    </script>
</body>

</html>