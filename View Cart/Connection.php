<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>
<?php
$servername = "remotemysql.com";
$username = "VnxQEuFWPf";
$password = "ljeJ4d6ptZ";
$dbname = "VnxQEuFWPf";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 
//MySQL query goes here
$sql = "SELECT cartTable.quantity, productTable.productName, productTable.productPrice  FROM productTable, cartTable WHERE productTable.productID = cartTable.productID AND cartTable.userID = 2";



?> 
</body>
</html>