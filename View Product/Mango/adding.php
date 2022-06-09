<?php

include_once ('addproduct.php');

$quantity= $_POST['quantity'];
$userID =  $_POST['submit'];

$sql = "SELECT productID FROM productTable WHERE productName = 'Mango'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "";
    // output data of each row
while($row = $result->fetch_assoc()) 
{   
   $productID = $row['productID'];
 
}
}

$sql = "INSERT INTO cartTable (userID, productID, quantity) VALUES ('$userID','$productID', '$quantity');";
mysqli_query($conn, $sql);

header("Location: view product.php?adding=success");