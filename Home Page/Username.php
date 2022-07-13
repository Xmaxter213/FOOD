<?php

require_once('../Login Page/jslogin.php');

//$servername = "remotemysql.com";
//$username = "VnxQEuFWPf";
//$password = "ljeJ4d6ptZ";
//$dbname = "VnxQEuFWPf";

$servername = "sql.freedb.tech";
$username = "freedb_FoodOnOurDoor";
$password = "tU$7tjfK@greFWx";
$dbname = "freedb_FoodOnOurDoor";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 
//MySQL query goes here
$sql = "SELECT username  FROM userTable WHERE email = $email ";



?> 