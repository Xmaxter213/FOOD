<?php

include_once ('addproduct.php');

$quantity= $_POST['quantity'];
$userID =  $_POST['submit'];
$productName = $_POST['productName'];



$sql = "INSERT INTO cartTable (userID, productID, quantity) VALUES ('$userID','$productName', '$quantity');";
mysqli_query($conn, $sql);

header("Location: ..\Home Page\index.php?adding=success");