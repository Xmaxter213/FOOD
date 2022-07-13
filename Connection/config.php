<?php

//$username   = "VnxQEuFWPf";
//$password   = "ljeJ4d6ptZ";
//$dbname     = "VnxQEuFWPf";
//$host       = "remotemysql.com";
$username   = "freedb_FoodOnOurDoor";
$password   = "3dgUvK43RV@dYVy";
$dbname     = "freedb_FoodOnOurDoor";
$host       = "sql.freedb.tech";

$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 

