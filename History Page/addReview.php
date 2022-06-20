<?php

include_once ('../View Product/addproduct.php');

$invoiceID = $_POST['invoiceID'];
$username = $_POST['username'];
$rating = $_POST['rating'];
$content =  $_POST['content'];
$date = $_POST["date"];


$sql = "INSERT INTO reviewTable(username, rating, content, date, invoiceID) VALUES ('$username','$rating', '$content', '$date', '$invoiceID');";
mysqli_query($conn, $sql);

header("Location: ..\Home Page\index.php?adding=success");

?>