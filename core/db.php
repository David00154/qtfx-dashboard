<?php
$dbhost = "https://cublifestyle.com.ng";
$dbuser = "cryptoc_coinvest_user";
$dbpass = "Gb-%%6hR[ku5"; // Gb-%%6hR[ku5
$dbname = "cryptoc_binharvest-com";

$royaldb = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($royaldb->connect_error) {
    die("Unable to connect to Database");
}
