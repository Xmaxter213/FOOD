<?php

include_once ('addproduct.php');

$quantity= $_POST['quantity'];

$sql = "INSERT INTO cartTable (userID, productID, quantity) VALUES ('2','3', '$quantity');";
mysqli_query($conn, $sql);

header("Location: view product.php?adding=success");