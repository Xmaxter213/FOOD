<?php

include_once('Connection.php');

$userID = implode($_SESSION['userID']);

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