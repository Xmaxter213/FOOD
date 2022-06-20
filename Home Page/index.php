<?php

require_once('../View Cart/Connection.php');
include_once ('quantity.php');

    if(!isset($_SESSION['userlogin']))
    {
        

    }
    else
    {
        $name = $_SESSION['userlogin'];

        $status = $_SESSION['userStatus'];

        if(implode("", $status) === 'ADMIN')
        {
            header("location: ../Admin Page/index.php");
        }

    }

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION);
        header("location: ../Login Page/login_new.php");
    }


//calls out template
require_once('ProductCard.php');
require_once('ReviewCard.php')
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
        
        

        <style>
          #cart{            
            background-color: rgb(63, 63, 63);
            width: 100%;
            height: 380px;
            border-bottom: 5px solid white;
           
        }
        #bottomCart{
            background-color: rgb(63, 63, 63);
            width: 100%;
        }

        #bottomCart p{
            float: right;
            margin-right: 40px;
            color: white;
            font-size: 20px;
        }

        /*For rating*/
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        .content{
        width: 420px;
        margin-top: 100px;
        }

        .ratings{

            background-color:#fff;
                padding: 54px;
                border: 1px solid rgba(0, 0, 0, 0.1);
                box-shadow: 0px 10px 10px #E0E0E0;
        }

        .product-rating{

            font-size: 50px;
        }

        .stars i{

            font-size: 18px;
            color: #28a745;
        }

        .rating-text{
            margin-top: 10px;
        }



        </style>

    </head>
    
    <body id="page-top" style="background-color: #D4F1F4;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">F.O.O.D</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="#page-top">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Product</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="#team">Team</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="../History Page/HistoryPage.php">History</a></li>
                    </ul>
                    <a  class="nav-link" class="portfolio-link" data-bs-toggle="modal" href="#viewcart1" style=" margin-right: 50px;  color: black;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li>
                    <a class="loginbutton" href="../History Page/HistoryPage.php" style="font-size: 20px;">
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
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Store!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <!--<h3 class="section-subheading text-muted">We offer best quality fruits.</h3>-->
                </div>
                <div class="row text-center">
                    <div class="col-md-7">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa-solid fa-basket-shopping fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Fresh Fruits</h4>
                        <p class="text-muted">from our partnered local farmers.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa-solid fa-gift fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Subscription</h4>
                        <p class="text-muted">We offer 3 types of subscription: Weekly, Monthly, and Yearly.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section " id="portfolio" >
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Product</h2>
                    <h3 class="section-subheading text-muted">Numerous fruits to choose from, sourced locally from the country. Each fruit is inspected to deliver them on their best condition.</h3>
                </div>
                <div class="row">
                <?php
                    
                    $sql = "SELECT productID, productName, quantity, portfolioNum, productImg, productBg FROM productTable";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "";
                        // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                        productCard($row['productID'], $row['productName'], $row['quantity'], $row['portfolioNum'], $row['productImg'], $row['productBg']);

                        }
                        

                    } 
                    else 
                    {
                        echo "0";
                    }
                    ?>

                </div>
            </div>
        </section>
        <!-- About-->
        
        <!-- Team-->
        <!-- <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Diana Petersen</h4>
                            <p class="text-muted">Lead Marketer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>-->
        <!-- Clients-->
        <!--<div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>-->


    <!--Review-->     
    <!--To Work with icons, but ruins services part so excluded
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    -->

<div class="d-flex justify-content-center">                      
    <div class="content text-center">
        <div class="ratings">
        <?php    
            $sql = "SELECT rating FROM reviewTable";
            $result = $conn->query($sql);
            $ratingCount = null;
            $ratingAverage = null;
            if ($result->num_rows > 0) {
                echo "";
                // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                $ratingAverage = $ratingAverage + $row['rating'];
                $ratingCount++;
                }
            $ratingAverage = $ratingAverage / $ratingCount;

            } 
            else 
            {
                echo "0";
            }
            ?>

            <span class="product-rating"><?= number_format((float)$ratingAverage, 2, '.', '') ?></span><span>/5</span>
            <div class="stars">
                <?php
                    if ($ratingAverage <= 1)
                    {
                        echo '<i class="fa fa-star"></i>';
                    }
                    else if ($ratingAverage <= 1.5)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star-half"></i>';
                    }
                    else if ($ratingAverage <= 2)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                    }
                    else if ($ratingAverage <= 2.5)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star-half"></i>';
                    }
                    else if ($ratingAverage <= 3)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';

                    }
                    else if ($ratingAverage <= 3.5)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star-half"></i>';
                    }
                    else if ($ratingAverage <= 4)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';

                    }
                    else if ($ratingAverage <= 4.5)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star-half"></i>';
                    }
                    else if ($ratingAverage <= 5)
                    {
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                    }
                ?>
            </div>
        <div class="rating-text">
            <span><?= $ratingCount ?> reviews</span>
        </div>
    </div>
</div>

</div> 
<div class="container">
    <br><br>
	<h2 class="text-center">User Rating Form</h2>
	
	<div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">15 Minutes Ago</p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

        	       </p>
        	       <div class="clearfix"></div>
        	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        	        <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
        	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
        	       </p>
        	    </div>
	        </div>
            
            <?php
                    
                    $sql = "SELECT username, rating, content, date FROM reviewTable";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "";
                        // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                        reviewCard($row['username'], $row['rating'], $row['content'], $row['date']);
                    }
                        

                    } 
                    else 
                    {
                        echo "0";
                    }
                    ?>

            <a href = "#" id = "loadMore"> Load More </a>

            <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
            <script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
            <script>
            $(document).ready (function () {
            $(".reviews").slice(0, 2).show();
            $("#loadMore").on("click", function(e){
                e.preventDefault();
                $(".reviews:hidden").slice(0, 2).slideDown();
                if ($(".reviews:hidden").length == 0) {
                $("#loadMore").text("No Content").addClass("noContent");
                }
            });
            })
            </script>
	    </div>
	</div>
</div>
		
    </div> <!-- /container -->

        <!-- Footer-->
        <footer class="footer py-4 mt-2" style = "background-color: black; color: white;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; F.O.O.D 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!" style = "color: white;">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!" style = "color: white;">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!--view cart pop up-->
        <div class="portfolio-modal modal fade" id="viewcart1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <iframe id="cart" src="../View Cart/checkoutcart.php" ></iframe>
                                    <iframe id="bottomCart" src="viewcartprice.php" ></iframe>
                                    <br>
                                    <br>
                                    <a href = "../View Cart/CheckOut/CheckOut.php"><button class="btn btn-primary btn-xl text-uppercase"  type="button">
                                    <i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i>
                                        Go to CheckOut
                                        </button></a>
                                        
                                        <a href="remove1.php"><button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="submit">
                                        <i class="fas fa-xmark me-1"></i>
                                        Clear Cart
                                    </button></a>
                                        

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Tab
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
