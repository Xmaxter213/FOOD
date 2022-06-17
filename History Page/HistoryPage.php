<?php 
require_once('../View Cart/Connection.php');

    if(!isset($_SESSION['userlogin']))
    {
        header("Location: ../Login Page/Login_new.php");
    }
    else
    {
        $name = $_SESSION['userlogin'];
        $userID = $_SESSION['userID'];
    }

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION);
        header("location: ../Login Page/login_new.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>F.O.O.D</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/FinalLogo.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top" style="background-color: #D4F1F4;">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">F.O.O.D</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../Home Page/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Product</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="#team">Team</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">History</a></li>
                    </ul>
                    <a  class="nav-link" class="portfolio-link" data-bs-toggle="modal" href="#viewcart1" style=" margin-right: 50px;  color: black;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li>
                    <a class="loginbutton" href="#" style="font-size: 20px;">
                        <?php  
                        if (isset($_SESSION['userlogin']))
                            {
                                $_SESSION_user= $_SESSION['userlogin'];echo implode (" ",$_SESSION_user);/*spacing if many array (" ",$_SESSION_user)*/
                            }
                        else{
                                echo 'anon';
                            }
                            ?>
                            
                        </a>
                    <a style="font-size: 20px;">&nbsp/&nbsp</a>
                    <a class="loginbutton" href="index.php?logout=true" style="font-size: 20px;">Logout</a>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Store!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
        <div class="card-body">
        <div class="table-responsive"> 
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Current Date</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Current Date</th>
                                        </tr>
                                    </tfoot>
                                <?php
                                            $ID = implode($_SESSION['userID']);
                                            $count =0;
                                            $sql = "SELECT * FROM CustomerStatusTable WHERE userID ='$ID'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "";
                                                
                                                ?>
                                                <?php
                                                     while($row = mysqli_fetch_array($result)) 
                                                     {   
                                                         $count = $count + 1;
                                                
                                                ?>
                                       
                                            <tr>
                                            <td><?php echo $row['productName'];?></td>
                                            <td><?php echo $row['quantity'];?></td>
                                            <td><?php echo $row['Stat'];?></td>
                                            <td><?php echo $row['curDate'];?></td>
                                        
                                            </tr>  
                                            <?php
                                               
                                                }
                                               
                        
                                            } 
                                            else 
                                            {
                                                echo "No Record Found";
                                            }
                                        ?>
            </div>
            </div>
</body>
</html>