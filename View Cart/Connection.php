

    
<?php
$servername = "sql.freedb.tech";
$username = "freedb_FoodOnOurDoor";
$password = "UsAQn@Q9N6Mw9?7";
$dbname = "freedb_FoodOnOurDoor";

//$servername = "remotemysql.com";
//$username = "VnxQEuFWPf";
//$password = "ljeJ4d6ptZ";
//$dbname = "VnxQEuFWPf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 
//MySQL query goes here

session_start();
if (isset($_SESSION['userlogin']))
    {
        $userID = $_SESSION['userID'];
        
        $userID = implode($_SESSION['userID']);

        $sql = "SELECT cartTable.quantity, productTable.productName, productTable.productPrice  FROM productTable, cartTable WHERE productTable.productID = cartTable.productID AND cartTable.userID ='$userID'";

        $del = "DELETE FROM cartTable WHERE userID='$userID'";

        $hisInvoice = "SELECT CustomerStatusTable.quantity, productTable.productName, productTable.productPrice  FROM productTable, CustomerStatusTable WHERE productTable.productID = CustomerStatusTable.productID AND CustomerStatusTable.userID ='$userID'";

    }
    else
    {
        $sql = "SELECT cartTable.quantity, productTable.productName, productTable.productPrice  FROM productTable, cartTable WHERE productTable.productID = cartTable.productID AND cartTable.userID ='0'";

    }


    