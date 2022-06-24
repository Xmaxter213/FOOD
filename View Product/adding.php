<?php

include_once ('addproduct.php');

$maxquantity= $_POST['maxquantity'];
$quantity= $_POST['quantity'];
$userID =  $_POST['submit'];
$productName = $_POST['productName'];

$total = (int)$maxquantity - (int)$quantity;

    if ($total < "0")
{
    
     echo '<script type="text/javascript">
    
         swal({
             
             text: "Sorry but the product is not sufficient",
             icon: "error",
             button: "Ok"
            
         });
     
 </script>';header("Location: ..\Home Page\index.php?adding=success");
}
else
{
    $sql = "INSERT INTO cartTable (userID, productID, quantity) VALUES ('$userID','$productName', '$quantity');";
    mysqli_query($conn, $sql);

    header("Location: ..\Home Page\index.php?adding=success");
}

    ?>


