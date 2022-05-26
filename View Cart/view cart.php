<?php

session_start();

require_once('Connection.php');


// create instance of Createdb class




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cart</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            margin-top: 100px;
            margin-left: 300px;
            border-bottom: 5px solid white;
           
        }

      

        #bottomCart{
            background-color: rgb(63, 63, 63);
            position: absolute;
            float: left;
            width: 650px;
            margin-top: 480px;
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
            margin-top: 130px;
            margin-left: 1050px;
            width: 150px;
            height: 45px;
            background-color: rgb(117, 251, 102);
            border: 1px solid rgb(153, 251, 142);
        }

        #clearCart{
            position: absolute;
            float: left;
            margin-top: 180px;
            margin-left: 1050px;
            width: 150px;
            height: 45px;
            color: white;
            background-color: rgb(253, 100, 100);
            border: 1px solid rgb(253, 100, 100);
        }
        .loginbutton{
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

       

	</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark  sticky-top" style="background-color: #0E86D4;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" ><img class="float-end" src="FinalLogo.png" height="50" width="50"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" href="../Home Page/index.php" style="font-size: 20px;">HOME
              
            </a>
          </li>
              
            </ul>
            <a   href="../View Cart/view cart.php" style=" margin-left: 1475px;  color: black;margin-right: 50px;"><i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></a></li>
            <a class="loginbutton" href="../Login Page/Login_new.php" style="font-size: 20px;">Log-In</a>
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