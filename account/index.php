<?php
include "../core/config.php";
$site_url = "../";
if (!isLogged()) {
  header("location: $site_url");
  exit;
}
// if ($UserDetails->vcode > 0) {
//   header("location: ../verify.php");
//   exit;
// }
// if ($UserDetails->verify > 0) {
//   header("location: verify.php");
//   exit;
// }
if (isset($_POST['trade'])) {
  $amount = $_POST['amount'];
  $pamount = $_POST['pamount'];
  $plan = $_POST['plan'];
  $return = getPlan($plan, "planrange");
  $type = getPlan($plan, "type");

  $d_interest = round($pamount / $return, 2);
  $t_profit = $pamount;

  $i_time = generateTime("+1 $type");
  $p_time = $return;
  $profittype = "$return $type";

  $savedepo = $royaldb->query("INSERT INTO deposit SET user_id='$UserDetails->id', amount='$amount', profittype='weekly', interest='$d_interest', t_profit='$t_profit', status=1, date=$time") or die($royaldb->error);
  $updateUser = $royaldb->query("UPDATE user SET balance= balance - $amount, deposit= deposit + $amount, interest='$d_interest', interest_time='$i_time', profit_times='$p_time', plantype='$type', status=1 WHERE id=$UserDetails->id") or die($royaldb->error);
  $usr = new Royaltechinc\Mailer;
  $usr->mailUserDepo($UserDetails->email, $UserDetails->full_name, $amount, $profittype, $t_profit);
  $_SESSION["alert"] = '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="fa fa-sucess"></i> Alert!</h4>
                      <h5>Trade was successfully applied</h5>
                    </div>';
  header("location: index.php");
  exit;
}
$listplan = "";
$getplan = $royaldb->query("SELECT * FROM plans WHERE id > 0 ORDER by min ASC") or die($royaldb->error);
if ($getplan->num_rows > 0) {
  $listplan .= "<option value=''>--SELECT PLAN--</option>";
  while ($loadplan = $getplan->fetch_object()) {
    $listplan .= "<option value='$loadplan->id'>$loadplan->plan_name ($" . number_format($loadplan->min) . " - $" . $loadplan->max . ") - $loadplan->planrange $loadplan->type </option>";
  }
} else {
  $listplan .= "<option value=''>--No Plan Yet--</option>";
}


include "header.php";
include "sidebar.php";

?>
<title>Trade Center | QTFx </title>
<script>
  function checkform() {
    if (document.editform.amount.value > <?= $UserDetails->balance ?>) {
      alert("Insufficient Balance!");
      document.editform.amount.focus();
      return false;
    }
  }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div id="google_translate_element" class="text-center mb-2"></div>
    <!-- Crypto Rates Widget -->
    <div class="row">
      <div class="col-md-12 mt-4 mb-5">
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <div class="tradingview-widget-copyright"><a href="" rel="noopener" target="_blank">QTFx </a></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
              "symbols": [{
                  "proName": "FOREXCOM:SPXUSD",
                  "title": "S&P 500"
                },
                {
                  "proName": "FOREXCOM:NSXUSD",
                  "title": "Nasdaq 100"
                },
                {
                  "proName": "FX_IDC:EURUSD",
                  "title": "EUR/USD"
                },
                {
                  "proName": "BITSTAMP:BTCUSD",
                  "title": "BTC/USD"
                },
                {
                  "proName": "BITSTAMP:ETHUSD",
                  "title": "ETH/USD"
                }
              ],
              "colorTheme": "dark",
              "isTransparent": false,
              "displayMode": "adaptive",
              "locale": "en"
            }
          </script>
        </div>
      </div>
      <div class="col-sm-12">
      </div>
    </div>
    <!-- End Crypto Rates Widget -->
    <?php
    if (isset($_SESSION["alert"])) {
      echo $_SESSION["alert"];
      unset($_SESSION["alert"]);
    }
    ?>

    <div class="row">
      <div class="col-lg-4 mb-4 mb-md-0">
        <div class="alert alert-info bg-dark" style="margin-bottom: 0;">
          <div class="row">
            <div class="col-7">
              <h5>Balance:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong> $<?= number_format($UserDetails->balance) ?> </strong></h6>
            </div>
          </div>
          <div class="row">
            <div class="col-7">
              <h5>BTC Balance:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong>
                  <span class="badge badge-danger" id="balancebtc"></span></strong></h6>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-7">
              <h5>Active Plan:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong>
                  <label class="label label-warning" style="color: #000 !important;"><b>Basic</b></label> </strong></h6>
            </div> -->
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-lg-4 mb-4 mb-md-0">
        <div class="alert alert-info bg-dark" style="margin-bottom: 0;">
          <div class="row">
            <div class="col-7">
              <h5>Earnings:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong> $<?= number_format($UserDetails->earnings) ?> </strong></h6>
            </div>
          </div>
          <div class="row">
            <div class="col-7">
              <h5>BTC Earnings:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong>
                  <span class="badge badge-danger" id="balancebtc"></span></strong></h6>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-7">
              <h5>Active Plan:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong>
                  <label class="label label-warning" style="color: #000 !important;"><b>Basic</b></label> </strong></h6>
            </div> -->
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-lg-4 mb-4 mb-md-0">
        <div class="alert alert-info bg-dark" style="margin-bottom: 0;">
          <div class="row">
            <div class="col-7">
              <h5>Deposit:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong> $<?= number_format($UserDetails->deposit) ?> </strong></h6>
            </div>
          </div>
          <div class="row">
            <div class="col-7">
              <h5>BTC Deposit:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong>
                  <span class="badge badge-danger" id="balancebtc"></span></strong></h6>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-7">
              <h5>Active Plan:</h5>
            </div>
            <div class="col-5 text-right">
              <h6 class='text-white modal-title'><strong>
                  <label class="label label-warning" style="color: #000 !important;"><b>Basic</b></label> </strong></h6>
            </div> -->
          </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
      </div>
    </div>

    <div class="row">

      <div class="col-lg-8">
        <div class="box box-bordered border-info">
          <div class="box-header with-border">
            <h4 class="box-title"><?php
                                  if ($UserDetails->status == 0) {
                                    echo "Try Our Demo Trader </h4>
            </div>

            <iframe src='demo-trader.php' width='100%' height='400' frameBorder='0'></iframe>";
                                  } else {
                                    echo "You have an Active Trade </h4>
            </div>

            <iframe style='pointer-events: none' src='demo-trader.php' width='100%' height='400' frameBorder='0'></iframe>";
                                  }
                                  ?>
          </div>
        </div>

        <?php
        if ($UserDetails->status == 0) {

        ?>

          <div class="col-lg-4">
            <div class="box box-bordered border-info">
              <div class="box-header with-border">
                <h4 class="box-title">Place Live Trade</h4>
              </div>
              <div class="box-body">
                <form onsubmit="return checkform()" name=editform method="post">

                  <div class="form-group">
                    <label>Trade Asset</label>
                    <select class="form-control" id="plan" name="plan" required>
                      <?= $listplan ?>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-md-4">

                      <h4>Min</h4>
                      <div id="min"></div>




                    </div><!-- .col -->
                    <div class="col-md-4">

                      <h4>Max</h4>

                      <div id="max"></div>


                    </div><!-- .col -->
                    <div class="col-md-4">

                      <h4>%</h4>

                      <div id="percent"></div>

                    </div>
                  </div>
                  <div class="form-group">
                    <label>Trade Amount</label>
                    <input type="number" id="txtAmount" name="amount" class="form-control" placeholder="Enter Trade Amount" required>
                  </div>

                  <div class="form-group">
                    <label>Interest Amount</label>
                    <input type="number" id="pAmount" name="pamount" value="" class="form-control" placeholder="Interest Amount" readonly>
                  </div>
                  <button type="submit" name="trade" class="btn btn-info btn-block"><i class="fa fa-exchange"></i> Trade Now</button>
                </form>
              </div>
            </div>
          </div>
        <?php
        } else {
        ?>
          <div class="col-lg-4">
            <div class="box box-bordered border-info">
              <div class="box-header with-border">
                <h4 class="box-title">Active Trade</h4>
              </div>
              <div class="box-body">
                <h3>Your Next Earning Time</h3>
                <font color="red" style="font-size:28px;" class="ddate" data-time="<?= getDateTime($UserDetails->interest_time) ?>" data-time-now="<?= getDateTime($time) ?>">Calculating next earning time</font>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

      </div>


      <div class="row">
        <div class="col-sm-12">
          <!-- TradingView Widget BEGIN -->
          <div class="tradingview-widget-container">
            <div id="tradingview_19631"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
              new TradingView.widget({
                "width": "auto",
                "height": 498,
                "symbol": "COINBASE:BTCUSD",
                "interval": "D",
                "timezone": "Etc/UTC",
                "theme": "Dark",
                "style": "0",
                "locale": "en",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "allow_symbol_change": true,
                "hotlist": true,
                "container_id": "tradingview_19631"
              });
            </script>
          </div>
          <!-- TradingView Widget END -->

        </div>

        <div class="col-sm-12" style="margin-top: 10px;">
          <script src="https://widgets.coingecko.com/coingecko-coin-price-static-headline-widget.js"></script>
          <coingecko-coin-price-static-headline-widget coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" locale="en"></coingecko-coin-price-static-headline-widget>
          <br>
        </div>

        <div class="col-sm-12">
          <script type="text/javascript">
            baseUrl = "https://widgets.cryptocompare.com/";
            var scripts = document.getElementsByTagName("script");
            var embedder = scripts[scripts.length - 1];
            (function() {
              var appName = encodeURIComponent(window.location.hostname);
              if (appName == "") {
                appName = "local";
              }
              var s = document.createElement("script");
              s.type = "text/javascript";
              s.async = true;
              var theUrl = baseUrl + 'serve/v1/coin/tiles?fsym=BTC&tsyms=USD,EUR,CNY,GBP,GOLD,JPY,AUD,CAD,CHF,CZK';
              s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
              embedder.parentNode.appendChild(s);
            })();
          </script>
        </div>
      </div>



  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include "footer.php";
?>

<script>
  $(function() {
    $(".ddate").countDown(function() {
      // location.reload();
    });
  });
</script>


<script>
  $(document).ready(function() {


    $("#plan").on('change', function() {

      $("#txtAmount").val("");
      $("#min").text("");
      $("#max").text("");

      var plan = $("#plan").val();
      console.log(plan);

      $.ajax({
        method: "GET",
        url: "call.php",
        data: {
          func_name: "getPlanDetails",
          plan: plan,
          getplan: "min"

        }
      }).done(function(data) {
        var min = data;
        console.log(min);
        $("#min").text("$" + min);
        $("#txtAmount").val(min);
        $("#txtAmount").prop("min", min);

      }).fail(function() {
        console.log("Could not get Minimum Amount");

      })
      $.ajax({
        method: "GET",
        url: "call.php",
        data: {
          func_name: "getPlanDetails",
          plan: plan,
          getplan: "max"

        }
      }).done(function(data) {
        var max = data;
        console.log(max);
        $("#max").text("$" + max);
        $("#txtAmount").prop("max", max);

      }).fail(function() {
        console.log("Could not get Maximum Amount");

      })
      $.ajax({
        method: "GET",
        url: "call.php",
        data: {
          func_name: "getPlanDetails",
          plan: plan,
          getplan: "return_percent"

        }
      }).done(function(data) {
        var percent = data;
        console.log(percent);
        $("#percent").text(percent + "%");
        var amount = parseFloat($("#txtAmount").val());
        var returnp = parseFloat(Math.round((percent / 100) * amount));
        $("#pAmount").val(returnp);
        $('#txtAmount').on('keyup', function() {
          $("#pAmount").val("");
          var amount = parseFloat($("#txtAmount").val());

          var returnp = parseFloat(Math.round((percent / 100) * amount));
          $("#pAmount").val(returnp);

        });

      }).fail(function() {
        console.log("Could not get Maximum Amount");

      })




    });


  });
</script>