<?php

require_once('../View Cart/Connection.php');


?>
<html>
  <head>
    
  </head>
  <style>
      
        #bottomCart h2{
            float: right;
            margin-right: 40px;
            color: white;
            font-size: 20px;
        }
  </style>
  
  <body style="background-color: rgb(63, 63, 63);">
  <div id = "bottomCart" >
        <h2>TOTAL PRICE: 
        <?php
                
                $total = 0;
                $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                         echo "";
                        // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                       
                        $total = $total + (double)$row['productPrice'] * (double)$row['quantity'];
                        
                         }
                        echo " " ."₱ ". " ".$total. "<br>";

                    } 
                    else 
                    {
                        echo " ₱". "0";
                    }  
                    $conn->close();
     
                    ?>
            </h2>
    </div>
 
  </body>
</html>
