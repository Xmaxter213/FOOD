
<?php
$servername = "remotemysql.com";
$username = "VnxQEuFWPf";
$password = "ljeJ4d6ptZ";
$dbname = "VnxQEuFWPf";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 
//MySQL query goes here

session_start();
    if(!isset($_SESSION['userlogin']))
    {
        
        header("Location: ../Login Page/Login_new.php");
    }
    else
    {
        $userID = $_SESSION['userID'];
    }
    
$userID = implode($_SESSION['userID']);
$sql = "SELECT cartTable.quantity, productTable.productName, productTable.productPrice  FROM productTable, cartTable WHERE productTable.productID = cartTable.productID AND cartTable.userID ='$userID'";


