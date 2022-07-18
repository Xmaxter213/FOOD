<?php

function productPageLayout2($productName, $productPrice, $productQty, $productID){
    $element ="
    
    <label for=\"productName\"><h2>$productName</h2></label> <br>
    <label for=\"max\"> <h6>Product Left: $productQty</h6></label> <br>
    <label for=\"productPrice\">Price: $productPrice</label><br>
    <label for=\"quantity\">Quantity: </label>
    <input type= \"number\" name=\"quantity\" id=\"quantity\" value=\"\" required min=\"1\" >  <br><br>
    
    ";
    echo $element;
}
?>