<?php

include_once ('../View Product/addproduct.php');

$username = $_POST['username'];
$rating = $_POST['rating'];
$content =  $_POST['content'];
$date = $_POST["date"];

$sql = "INSERT INTO reviewTable(username, rating, content, date) VALUES ('$username','$rating', '$content', '$date');";
mysqli_query($conn, $sql);

header("Location: ..\Home Page\index.php?adding=success");

?>