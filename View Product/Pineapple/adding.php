<?php

include_once ('addproduct.php');

$quantity= $_POST['quantity'];

$sql = "INSERT INTO cartTable (userID, productID, quantity) VALUES ('2','4', '$quantity');";
mysqli_query($conn, $sql);

header("Location: view product.php?adding=success");