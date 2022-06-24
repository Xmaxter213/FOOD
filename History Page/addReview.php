<?php

include_once ('../View Product/addproduct.php');

$invoiceID = $_POST['invoiceID'];
$username = $_POST['username'];
$rating = $_POST['rating'];
$content =  $_POST['content'];
$date = $_POST["date"];

$contentArray = str_split($content, );
$newContent = rm_special_char($contentArray);

function rm_special_char($str) {

    //Remove "#","'" and ";" using str_replace() function

    $result = str_replace( array("'"), '\\\'', $str);


    return implode($result);

}


//print_r($contentArray);
//print_r($newContent);

/* checks characters one by one (not working)
for ($x = 0; $x < sizeof($contentArray); $x++) {
    if ($newContent == null){
        $newContent = $contentArray[$x];
        echo implode($contentArray[$x]);
    }
    else if ($contentArray[$x] == CHR(39)){
        $newContent = $newContent + CHR(92) + $contentArray[$x];
    }
    else{
        $newContent += $contentArray[$x];
    }
}
*/



$sql = "INSERT INTO reviewTable(username, rating, content, date, invoiceID) VALUES ('$username','$rating', '$newContent', '$date', '$invoiceID');";
mysqli_query($conn, $sql);

header("Location: ..\Home Page\index.php?adding=success");
?>


