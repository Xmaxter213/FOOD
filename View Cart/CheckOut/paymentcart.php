<?php


require_once('../Connection.php');

?>
<html>
  <head>
    <title>Title of the document</title>
  </head>
  <style>
      #addedProducts{
            color: white;
            margin-left: 20px;
            font-size: 20px;
        }
  </style>
  
  <body style="background-color: black;">

  <div id = "addedProducts">
            
            <?php
                
            
            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                     echo "";
                    // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    echo " " ."- "  . $row["productName"]. ": ₱". $row["productPrice"]."<br>";
                     }
                } 
                else 
                {
                    echo "0 results";
                }  
                
 
                ?>
  </body>
</html>