<?php

include "../../core/config.php";
if (!isLogged()) {
    header("location: ../../login.php");
    exit;
}
$userSet = "";
if ($Users->num_rows > 0) {
    while ($load = $Users->fetch_object()) {
        $id = $load->id;
        $full_name = $load->full_name;
        $username = $load->username;
        $password = $load->password;
        $email = $load->email;
        $balance = $load->balance;
        $deposit = $load->deposit;
        $earnings = $load->earnings;

        $userSet .= "
       <tr>
            <th scope=\"row\">$id</th>
            <td>$full_name</td>
            <td>$username</td>
            <td>$password</td>
            <td>$email</td>
            <td>$balance</td>
            <td>$deposit</td>
            <td>$earnings</td>
        </tr>
        ";
    }
}
// var_dump($Users);
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

<body class="user-dashboard" style="width: 100%;">
    <?php

    include "header.php";
    ?>
    <!-- TopBar End -->


    <div class="user-wraper">
        <div class="container-fluid">
            <div class="d-flex">
                <?php
                include "sidebar.php";
                ?>
                <div class="user-content">
                    <div class="user-panel">


                        <h2 class="user-panel-title">List Users</h2>

                        <hr class="linie">
                        <?php
                        if (isset($_SESSION["alert"])) {
                            echo $_SESSION["alert"];
                            unset($_SESSION["alert"]);
                        }
                        ?>
                        <div class="gaps-1x"></div>


                        <!-- Content Start -->
                        <div class="">
                            <table class="table" style="overflow-x: auto; width: 100%;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full name</th>
                                        <th scope="col">User name</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Deposit</th>
                                        <th scope="col">Earnings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $userSet ?>
                                    <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr> -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>




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