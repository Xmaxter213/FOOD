<?php




    //$servername = "remotemysql.com";
    //$username = "VnxQEuFWPf";
    //$password = "ljeJ4d6ptZ";
    //$dbname = "VnxQEuFWPf";

    $servername = "sql.freedb.tech";
    $username = "freedb_FoodOnOurDoor";
    $password = "yqq@9ns3YUF%2v5";
    $dbname = "freedb_FoodOnOurDoor";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error)  {
        die("Connection failed: " . $conn->connect_error);
    } 
    

    
    
