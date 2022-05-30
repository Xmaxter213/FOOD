<?php

session_start();

    if(!isset($_SESSION['userlogin']))
    {
        $user1 = $_POST[$_SESSION['userlogin'] = $username];
        header("Location: ../../Login Page/Login_new.php");
    }

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION);
        header("location: ../../Login Page/login_new.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Product</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

          /* RESPONSIVE RULES */
  
        @media screen and (max-width: 1414px) {
            .secondContainer{
            margin-left: 16em;
            margin-top: 10em;
            }
        }

	</style>
</head>
<body style="background-color: #D4F1F4;">

    <script type="text/javascript">
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
                        <li class="nav-item"><a class="nav-link" href="../../Home Page/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#portfolio">Product</a></li>
                        
                    </ul>
                    <a  class="nav-link"  data-bs-toggle="modal" href="../../View Cart/view cart.php" style=" margin-right: 50px;  color: black;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li>
                    <a class="loginbutton" href="../Login Page/Login_new.php" style="font-size: 20px;"><?php  $_SESSION_user= $_SESSION['userlogin']; echo implode (" ",$_SESSION_user);
                       ?></a>
                    <a style="font-size: 20px;">&nbsp/&nbsp</a>
                    <a class="loginbutton" href="../../Home Page/index.php?logout=true" style="font-size: 20px;">Logout</a>
                </div>
            </div>
        </nav>

    <div class = "container">
        <div class = "imgContainer">
            <img id="mainImage" src="photos/banana2.jpg" width = "400" height = "400" alt = "Product"/> 
            <table id="thumbnails">
                <tr>
                <td><img src="photos/banana2.jpg" width = "100" height = "100" title="Item 1" onclick="showImage('photos/banana2.jpg')" /></td>
                <td><img src="photos/banana4.jpg" width = "100" height = "100" title="Item 2" onclick="showImage('photos/banana4.jpg')" /></td>
                <td><img src="photos/banana3.jpg" width = "100" height = "100" title="Item 3" onclick="showImage('photos/banana3.jpg')" /></td>
                <td><img src="photos/banana1.jpg" width = "100" height = "100" title="Item 4" onclick="showImage('photos/banana1.jpg')" /></td>
                </tr>
            </table>
        </div>

    </div>
    
    <!-- form type -->
    <div class = "secondContainer">
        <form class="addAndInfo" action="adding.php" method="POST">
    

        <label for="productName"><h1>Banana</h1></label> <br>
        <label for="productPrice">Price: ₱21.44/kilo</label><br>
        <label for="quantity">Quantity:</label>
        <input name="quantity" id="quantity" value="">  <br><br>
        <button type= "submit"  id="add" name="submit" >ADD TO CART</button>
    </form>
    <div class = "description">
            <p>Cavendish is the most grown variety in the Philippines, accounting for 53% of all bananas. The partnered local farm produces 20% of the country's bananas.</p>
        </div>
    </div>

    
    

    
</body>
</html>