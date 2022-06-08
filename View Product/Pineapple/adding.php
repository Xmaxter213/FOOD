<?php

include_once ('addproduct.php');

$quantity= $_POST['quantity'];
$userID =  $_POST['submit'];

$sql = "INSERT INTO cartTable (userID, productID, quantity) VALUES ('$userID','4', '$quantity');";
mysqli_query($conn, $sql);

header("Location: view product.php?adding=success");