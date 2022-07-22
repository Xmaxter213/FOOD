<?php


require_once('../Connection/Connection.php');



?>
<html>
  <head>
    
  </head>
  <style>
      #addedProducts{
            color: white;
            margin-left: 20px;
            font-size: 20px;
        }
  </style>
  
  <body style="background-color: rgb(63, 63, 63);">

  <div id = "addedProducts">
            <p>YOUR ADDED PRODUCTS</p>
            <?php

                
                   
            
            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                     echo "";
                    // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    $prodid = "SELECT productImg FROM productTable WHERE productName = '$row[productName]'";
                    $res = $conn->query($prodid);
                    $row1 = $res->fetch_assoc();

                   

                    echo '<img src ="../View Product/photos/'.$row1['productImg'].'" width="50px" height="50px">'."  - ". $row["quantity"] . " x" ."- "  . $row["productName"]. ": ₱". $row["productPrice"]. "<br>";
                    }

                }
                
                else 
                {
                    echo "0 results";
                }  
                
 
                ?>
                </div>
  </body>
</html>