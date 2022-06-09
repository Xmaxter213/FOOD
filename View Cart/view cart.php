<?php

require_once('Connection.php');

    if(!isset($_SESSION['userlogin']))
    {
        
        header("Location: ../Login Page/Login_new.php");
    }
    else
    {
        $userID = $_SESSION['userID'];
        $user1 = $_SESSION['userlogin'];
    }

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION);
        header("location: ../Login Page/login_new.php");
    }




// create instance of Createdb class




?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
	<title>Cart</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <link rel="icon" type="image/x-icon" href="img/FinalLogo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
	<style>
        body{
            background-color: #D4F1F4;
        }

        #cart{            
            background-color: rgb(63, 63, 63);
            position: absolute;
            float: left;
            width: 652px;
            height: 380px;
            margin-top: 150px;
            margin-left: 300px;
            border-bottom: 5px solid white;
           
        }

      

        #bottomCart{
            background-color: rgb(63, 63, 63);
            position: absolute;
            float: left;
            width: 650px;
            margin-top: 530px;
            margin-left: 300px;
        }

        #bottomCart p{
            float: right;
            margin-right: 40px;
            color: white;
            font-size: 20px;
        }

        #checkout{
            position: absolute;
            float: left;
            margin-top: 180px;
            margin-left: 1050px;
            width: 150px;
            height: 45px;
            background-color: rgb(117, 251, 102);
            border: 1px solid rgb(153, 251, 142);
        }

        #clearCart{
            position: absolute;
            float: left;
            margin-top: 230px;
            margin-left: 1050px;
            width: 150px;
            height: 45px;
            color: white;
            background-color: rgb(253, 100, 100);
            border: 1px solid rgb(253, 100, 100);
        }

       

	</style>
</head>
<body>

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
                        
                    </ul>
                    <a  class="nav-link active" href="#" style=" margin-right: 50px;  color: black;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li>
                    <a class="loginbutton" href="../Login Page/Login_new.php" style="font-size: 20px;"><?php  $_SESSION_user= $_SESSION['userlogin']; echo implode (" ",$_SESSION_user);
                       ?></a>
                    <a style="font-size: 20px;">&nbsp/&nbsp</a>
                    <a class="loginbutton" href="../Home Page/index.php?logout=true" style="font-size: 20px;">Logout</a>
                </div>
            </div>
        </nav>
    <iframe id="cart" src="checkoutcart.php" >
    
        
                </iframe>
 
        


    <div id = "bottomCart">
        <p id = "totalPrice">TOTAL PRICE: 
        <?php
                
                

                $total = 0;
                $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                         echo "";
                        // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                       
                        $total = $total + (double)$row['productPrice'] * (double)$row['quantity'];
                        
                         }
                        echo " " ." ₱". $total. "<br>";

                    } 
                    else 
                    {
                        echo "0";
                    }  
                    $conn->close();
     
                    ?>
            </p>
    </div>

    <a href="../View Cart/CheckOut/CheckOut.php"><button id = "checkout" >CHECKOUT</button></a>
    <form class="addAndInfo" action="remove1.php" method="POST">
    <button id = "clearCart" onclick="myFunction()">CLEAR CART</button>
    </form>
    
    

</body>
</html>