<?php

require_once('../Connection/Connection.php');

    if(!isset($_SESSION['userlogin']))
    {
        

    }
    else
    {
        $name = $_SESSION['userlogin'];
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/styles.css" rel="stylesheet" />
    
</head>
<body>
    <div class="container-fluid px-4">

    <div class="row mt-4">
    <div class ="col-md-12">



    <div class="card">
        <div class="card-header">
            <h4> Review
            <a href="HistoryPage.php" class="btn btn-danger float-end" >BACK</a>
            </h4>
        </div> 
        <div class="card-body">
<?php
    if(isset($_GET['Invoice']))
    {
        $Invoice = $_GET['Invoice'];
        $edit ="SELECT * FROM CustomerStatusTable WHERE Invoice = '$Invoice' LIMIT 1";
        $run = mysqli_query($conn, $edit);

        if(mysqli_num_rows($run) > 0)
        {
            $row = mysqli_fetch_array($run);
            ?>




<!-- Contact-->
<section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Give us a review!</h2>
                    <h3 class="section-subheading text-muted">We'd appreciate the honest feedback.</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" action = "../History Page/addReview.php" method = "POST">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name and date-->
                                <input class="form-control disabled" id="date" type="hidden" name = "date" value = <?= date("j, n, Y")?>/>
                                <input class="form-control" id="username" type="hidden" name = "username" value= "<?= implode($_SESSION['userlogin'])?>"/>
                                <input class="form-control" id="username" type="hidden" name = "invoiceID" value= "<?= $_GET['Invoice']?>"/>

                                <script>
                                function getDate(){
                                    var todaydate = new Date();
                                    var day = todaydate.getDate();
                                    var month = todaydate.getMonth() + 1;
                                    var year = todaydate.getFullYear();
                                    var datestring = month + "/" + day + "/" + year;
                                    document.getElementById("date").value = datestring;
                                } 
                                getDate(); 
                                </script>
                            </div>

                            <div class="form-group mb-md-0">
                                <!-- Rating input-->
                                <label for="rating" style="color: white">Rating</label>
                                <select class="form-control" name="rating" id="rating" type = "int">
                                    <option value= 1>1</option>
                                    <option value= 2>2</option>
                                    <option value= 3>3</option>
                                    <option value= 4>4</option>
                                    <option value= 5>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" name = "content" placeholder="Your Message *" required = "\S(.*\S)?[A-Za-z0-9]+"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <?php
                    if(!isset($_SESSION['userlogin']))
                    {
                        echo "<div class=\"text-center\"><button class=\"btn btn-primary btn-xl text-uppercase disabled\" id=\"submitButton\" type=\"submit\">Submit Review</button></div>";

                    }
                    else
                    {
                        echo "<div class=\"text-center\"><button class=\"btn btn-primary btn-xl text-uppercase\" id=\"submitButton\" type=\"submit\">Submit Review</button></div>";
                    }
                    ?>
                    
                </form>
            </div>
        </section>
<?php
}
        else
        {
            ?>
            <h4>No Record Found</h4>
            <?php
        }
    }
    

?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
                                            