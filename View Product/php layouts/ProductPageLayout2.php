<?php

function productPageLayout2($productName, $productPrice, $productQty, $productID){
    $element ="
    <label for=\"productName\"><h1>$productName</h1></label> <br>
    <label for=\"productPrice\">Price: $productPrice</label><br>
    <label for=\"quantity\">Quantity: </label>
    <input type= \"number\" name=\"quantity\" id=\"quantity\" value=\"\" required min=\"1\">  <br><br>
    
    ";
    echo $element;
}
?>