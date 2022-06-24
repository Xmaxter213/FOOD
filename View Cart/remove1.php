<?php

include_once('Connection.php');

$userID = implode($_SESSION['userID']);

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     echo "";
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {      
        
    $prodid = "SELECT quantity FROM productTable WHERE productName = '$row[productName]'";
    $res = $conn->query($prodid);
    $row1 = $res->fetch_assoc();
                                    
    $change = $row1["quantity"] + $row["quantity"];
    $updateQuan = "UPDATE productTable SET quantity='$change' WHERE productName = '$row[productName]'";
    $updating = $conn->query($updateQuan);
    

    }
    } 
    else 
    {
      echo "0 results";
    }  

    $deleting = $conn->query("DELETE FROM cartTable WHERE userID = $userID");
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();

      header("Location: view cart.php");
      exit();
?>