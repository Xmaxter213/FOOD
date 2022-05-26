<?php

include_once('Connection.php');


    $deleting = $conn->query("DELETE FROM cartTable WHERE userID = 2");
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();

      header("Location: view cart.php");
      exit();
?>