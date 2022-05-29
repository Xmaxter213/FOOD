<?php

$username   = "VnxQEuFWPf";
$password   = "ljeJ4d6ptZ";
$dbname     = "VnxQEuFWPf";
$host       = "remotemysql.com";

$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 

