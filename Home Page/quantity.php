<?php




$servername = "remotemysql.com";
$username = "VnxQEuFWPf";
$password = "ljeJ4d6ptZ";
$dbname = "VnxQEuFWPf";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 










