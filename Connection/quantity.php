<?php




$servername = "sql.freedb.tech";
$username = "freedb_FoodOnOurDoor";
$password = "#!HmEcHX5Ued@*7";
$dbname = "freedb_FoodOnOurDoor";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 










