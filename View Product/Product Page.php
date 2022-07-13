<?php
ob_start();
session_start();
include_once ('../../Connection/addproduct.php');
include_once ('php layouts/ProductPageLayout.php');
include_once ('php layouts/ProductPageLayout2.php');
include_once ('php layouts/ProductPageLayout3.php');

    if(!isset($_SESSION['userlogin']))
    {
        
        header("Location: ../Login Page/Login_new.php");
    }
    else
    {
        $userID = $_SESSION['userID'];
        $user1 =$_SESSION['userlogin'];
    }

    //if(!isset($_SESSION['userID']))
    //{
       // $userID = $_POST[$_SESSION['userID'] = $userID];
      
   // }


    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION);
        header("location: ../Login Page/login_new.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
        <title>Product</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/FinalLogo.png" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
	<title>Product</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />


	<style>
        *{
            margin: 0;
           
        }
        
        .container{
            
        }

        .imgContainer{
            float: left;
            width: 30em;
            height: 25em;
            margin-left: 2em;
            margin-top: 10em;
            text-align: center;
        }

        #mainImage{
            background-color: rgb(0, 0, 0);
            width: 20em;
            height: 20em;
            border: 2px solid black;
        }

        #thumbnails{
            position: static;
            text-align: center;
            margin-left: 2em;
            margin-top: 1em;
            
        }

        table#thumbnails tr td img{
            cursor: pointer;
            border: 1px solid black;
        }

        .addAndInfo{
            float: left;
            width: 10em;
            height: 10em;
            margin-top: 11em;
            margin-left: 3em;
        }

        .addAndInfo input{
            width: 35px;
        }

        .secondContainer button{
            cursor: pointer;
            border: 1px solid black;
            background-color: #93FF6F;
            width: 120px;
            height: 40px;
        }


        .description{
            float: left;
            width: 20em;
            height: 14em;
            margin: 12em 2em;
            border: 2px solid black;
        }

        .description p{
            margin: 5%;
        }

        .button{
            background-color: skyblue; /* Green */
            border: none;
            color: white;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin-right: 20px;
        }
        input[type=number] 
        {
            width: 100px;
            
        }

          /* RESPONSIVE RULES */
  
        @media screen and (max-width: 1800px) {


            .secondContainer{
            margin-left: 16em;
            margin-top: 10em;
            }

            body{
            background-color: black;
            }   
        }



	</style>
</head>
<body style="background-color: #D4F1F4;">
    <script type="text/javascript   ">
        function showImage(image)
        {
         var mainImage = document.getElementById('mainImage');
         mainImage.src = image; 
        }
    </script>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #0E86D4;">
                    <div class="container">
                        <a class="navbar-brand" href="#page-top">F.O.O.D</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <i class="fas fa-bars ms-1"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                                <li class="nav-item"><a class="nav-link" href="../Home Page/index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link active" href="#portfolio">Product</a></li>
                                
                            </ul>
                            <a  class="nav-link"  data-bs-toggle="modal" href="../View Cart/view cart.php" style=" margin-right: 50px;  color: black;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li>
                            <a class="loginbutton" href="../Login Page/Login_new.php" style="font-size: 20px;">
                            <?php  
                                
                            $_SESSION_user= $_SESSION['userlogin']; echo implode (" ",$_SESSION_user);
        
                            
                        
        
                            ?></a>
                            <a style="font-size: 20px;">&nbsp/&nbsp</a>
                            <a class="loginbutton" href="../Home Page/index.php?logout=true" style="font-size: 20px;">Logout</a>
                        </div>
                    </div>
                </nav>
    

    <?php          

        $ID = $_GET['homeProductID'];
        $maxquantity = $_GET['maxquantity1'];
        $sql = "SELECT productImg, productImg2, productImg3, productImg4 FROM productTable WHERE productID = '$ID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "";
            // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $imgdirectory = "assets/img/portfolio/";
            productPageLayout($row['productImg'], $row['productImg2'], $row['productImg3'], $row['productImg4']);

            }
        } 
        else 
        {
            echo "0";
        }
        ?>
        
    

    <!-- form type -->


    </div>

    <div class = "secondContainer">
    <form class="addAndInfo"  method="POST">
    
    <?php

    $sql = "SELECT productName, productPrice, quantity, productID FROM productTable WHERE productID = '$ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "";
        // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        $imgdirectory = "assets/img/portfolio/";
        productPageLayout2($row['productName'], $row['productPrice'], $row['quantity'], $row['productID']);
    }
    } 
    else 
    {
        echo "0";
    }

    ?>
    
    <input type = "hidden" name = "maxquantity" id = "maxquantity" value = "<?= $maxquantity?>">
    <input type = "hidden" name = "productName" id = "productName" value = "<?= $ID?>">
    <button type= "submit"  id="add" name="submit" value="<?= implode($_SESSION['userID']) ?>">ADD TO CART</button>
    </form>
    <?php
 if(isset($_POST['submit']))
 {
$maxquantity= $_POST['maxquantity'];
$quantity= $_POST['quantity'];
$userID =  $_POST['submit'];
$productName = $_POST['productName'];

$total = (int)$maxquantity - (int)$quantity;
    if ($total < 0)
{
    
     echo '<script type="text/javascript">
    
         swal({
             
             text: "Sorry but the product is not sufficient",
             icon: "error",
             button: "Ok"
            
         });
     
 </script> ';
}
else
{    
    
    $maxquantity= $_POST['maxquantity'];
    $quantity= $_POST['quantity'];

    $total = (int)$maxquantity - (int)$quantity;

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     echo "";
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {      
    $prodid = "SELECT quantity FROM productTable WHERE productName = '$row[productName]'";
    $res = $conn->query($prodid);
    $row1 = $res->fetch_assoc();
                                    
    $updateQuan = "UPDATE productTable SET quantity='$total' WHERE productName = '$row[productName]'";
    $updating = $conn->query($updateQuan);

    }
    } 
    else 
    {
      echo "0 results";
    }  

    $sql = "INSERT INTO cartTable (userID, productID, quantity) VALUES ('$userID','$productName', '$quantity');";
    mysqli_query($conn, $sql);
    header("Location: ..\Home Page\index.php?adding=success");
    

   
}
 
 }

    ?>



    <?php
    $sql = "SELECT description FROM productTable WHERE productID = '$ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "";
        // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        $imgdirectory = "assets/img/portfolio/";
        productPageLayout3($row['description']);
        }
    } 
    else 
    {
        echo "0";
    }
    
    ?>



    

</body>
</html>