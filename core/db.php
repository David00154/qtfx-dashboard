<?php

$dbhost = "b1duxhhvyrgtanbmdc5d-mysql.services.clever-cloud.com";
$dbuser = "umrrzm1nkparvpry";
$dbpass = "dq3OtwCYH0pWAJb2N0Zh";
// Gb-%%6hR[ku5:q
$dbname = "b1duxhhvyrgtanbmdc5d";

$royaldb = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($royaldb->connect_error) {
    die("Unable to connect to Database");
}
