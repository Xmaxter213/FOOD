<?php

session_start();

    if(!isset($_SESSION['userlogin']))
    {
        $user1 = $_POST[$_SESSION['userlogin'] = $username];
        header("Location: ../Login Page/Login_new.php");
    }

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION);
        header("location: ../Login Page/login_new.php");
    }

require_once('../Connection.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Check out</title>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
      </head>

    <style>
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

.container1{
    padding-top: 3%;
    margin-top: 5%;
    margin-bottom: 5%;
    border-radius: 1rem;
}

.cartBox{
  width: auto;
  padding: 3%;
  margin: 20px;
  background-color: lightcyan;
}

.Cart{
  padding-bottom: 50px;
}


.SubscriptionType ul{
  padding-top: 3%;
}

.SubscriptionType ul li{
  padding-left: 20%;
}

.Payment{
  align-items: l;
  padding-top: 5%;
}

.PaymentContainer{
  padding-top: 5%;
}

#Payment{
  float: right;
}

#CardNum{
  text-align: center;
  font-size: 20px;
}

#Cancel{
  background-color: lightcoral;
  float: right;
  width: 100px;
  margin-right: 2%;
}

#cart{
  width: 550px;
  height: 400px;
}

#bottomCart{
            background-color: rgb(63, 63, 63);
            position: absolute;
            float: left;
            width: 650px;
            margin-top: 530px;
            margin-left: 300px;
        }

.Cart ul li{
  background-color: white;
  border: 1px black solid;
}

.container1-sm{
  padding-top: 3%;
  margin-top: 5%;
  margin-bottom: 2%;
  border-radius: 1rem;
}

.fruitFact{
  font-size: 20px;
  text-align: justify;
}

body{
  background: #D4F1F4;                        
}
      
.shop{
  font-size: 10px;
}

.space{
  letter-spacing: 0.8px !important;
}

.second a:hover {
  color: rgb(92, 92, 92) ;
}

.active-2 {
  color: rgb(92, 92, 92) 
}


.breadcrumb>li+li:before {
  content: "" !important
}

.breadcrumb {
  padding: 0px;
  font-size: 10px;
  color: #aaa !important;
}

.first {
  background-color: white ;
}

a {
  text-decoration: none !important;
  color: #aaa ;
}

.btn-lg,.form-control-sm:focus,
.form-control-sm:active,
a:focus,a:active {
  outline: none !important;
  box-shadow: none !important
}

.form-control-sm:focus{
  border:1.5px solid #4bb8a9 ; 
}

.btn-group-lg>.btn, .btn-lg {
  padding: .5rem 0.1rem;
  font-size: 1rem;
  border-radius: 0;
  color: white !important;
  background-color: #4bb8a9;
  height: 2.8rem !important;
  border-radius: 0.2rem !important;
}

.btn-group-lg>.btn:hover, .btn-lg:hover {
  background-color: #26A69A;
}

.btn-outline-primary{
  background-color: #fff !important;
  color:#4bb8a9 !important;
  border-radius: 0.2rem !important;   
  border:1px solid #4bb8a9;
}

.btn-outline-primary:hover{
  background-color:#4bb8a9  !important;
  color:#fff !important;
  border:1px solid #4bb8a9;
}

.card-2{
  margin-top: 40px !important;
}

.card-header{
  background-color: #fff;
  border-bottom:0px solid #aaaa !important;
}

p{
  font-size: 13px ;
}
      
.small{
  font-size: 9px !important;
}

.form-control-sm {
  height: calc(2.2em + .5rem + 2px);
  font-size: .875rem;
  line-height: 1.5;
  border-radius: 0;   
}

.cursor-pointer{
  cursor: pointer;
}

.boxed {
  padding: 0px 8px 0 8px ;
  background-color: #4bb8a9;
  color: white;
}

.boxed-1{
  padding: 0px 8px 0 8px ;
  color: black !important;
  border: 1px solid #aaaa;
}

.bell{
  opacity: 0.5;
  cursor: pointer;
}

@media (max-width: 767px) {
  .breadcrumb-item+.breadcrumb-item {
      padding-left: 0
  }
}

.checkBoxForms{
  padding-top: 50px;
} 
    </style>


    <script>
      function RandomText() {

        var randomFacts = [
          "Bananas may have been the world's first cultivated fruit. Archaeologists have found evidence of banana cultivation in New Guinea as far back as 8000 B.C. ",
          "A bunch of bananas is called a hand; a single banana is a finger.",
          "Wild bananas grow throughout Southeast Asia, but most are inedible for humans, as they are studded with hard seeds.",
          "Banana can help prevent kidney stones.",
          "Improve yeast and urinary tract infections (UTIs).",
        ]

        randomIndex = Math.ceil((Math.random() * randomFacts.length - 1));
        newText = randomFacts[randomIndex];

        document.getElementById("FruitFactsText").innerHTML = newText;


        
        }

      

        function card1(){
          var cardNum = document.getElementById('CardNum');
          cardNum.onkeyup = function (e) {
          if (this.value == this.lastValue) return;
          var caretPosition = this.selectionStart;
          var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
          var parts = [];
          
          for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
              parts.push(sanitizedValue.substring(i, i + 4));
          }
          
          for (var i = caretPosition - 1; i >= 0; i--) {
              var c = this.value[i];
              if (c < '0' || c > '9') {
                  caretPosition--;
              }
          }
          caretPosition += Math.floor(caretPosition / 4);
        
        this.value = this.lastValue = parts.join(' ');
        this.selectionStart = this.selectionEnd = caretPosition;
      }

    
}
        

      function card(){
          var cardNum = document.getElementById('CardNum');
          cardNum.onkeydown = function (e) {
          if (this.value == this.lastValue) return;
          var caretPosition = this.selectionStart;
          var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
          var parts = [];
          
          for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
              parts.push(sanitizedValue.substring(i, i + 4));
          }
          
          for (var i = caretPosition - 1; i >= 0; i--) {
              var c = this.value[i];
              if (c < '0' || c > '9') {
                  caretPosition--;
              }
          }
          caretPosition += Math.floor(caretPosition / 4);
        
        this.value = this.lastValue = parts.join(' ');
        this.selectionStart = this.selectionEnd = caretPosition;
      }

    
}

    </script>

    <body onload="RandomText()" style="background-color: #D4F1F4;">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #0E86D4;">
        <div class="container ">
                <a class="navbar-brand" href="#page-top">F.O.O.D</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../../Home Page/index.php">Home</a></li>
                      
                    </ul>
                    <a  class="nav-link"  data-bs-toggle="modal" href="../view cart.php" style=" margin-right: 50px;  color: black;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li>
                    <a class="loginbutton" href="#" style="font-size: 20px;"><?php  $_SESSION_user= $_SESSION['userlogin']; echo implode (" ",$_SESSION_user);
                       ?></a>
                    <a style="font-size: 20px;">&nbsp/&nbsp</a>
                    <a class="loginbutton" href="../../Home Page/index.php?logout=true" style="font-size: 20px;">Logout</a>
                </div>
            </div>
        </nav>


      <form name="Paymentf" action="Success.php" method="POST">
        <div class="container1">
            <div class="row">
                <div class="offset-md-2 col-md-4">
                    <div class="SubscriptionType">
                      <h3>ACCOUNT INFORMATION</h3>
                      <div class="row mt-3">
                          <div class="col-md-6">
                            <label>FIRST NAME:</label>
                            <input type="text" required="true" id="fname" name="first_name" class="form-control" value="" />
                          </div>
                            <div class="col-md-6">
                              <label>LAST NAME:</label>
                              <input type="text" required="true" id="lname" name="last_name" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="col-md-12">
                          <label>E-MAIL</label>
                          <input type="email" required="true" id="eMail" name="e_mail" class="form-control" value="" />
                        </div>
                        <div class="col-md-12">
                          <label>ADDRESS:</label>
                          <input type="text" required="true" id="addresS" name="address" class="form-control" value="" />
                        </div>
                        <div><p></p></div>
                        <div class="col-md-12">
                          <label><h3>Payment Information</h3></label>
                          <input type="text" required name="pay_info" minlength="19" maxlength="19" onkeydown="card()" onkeyup="card1()" id="CardNum" class="form-control" placeholder="0000-0000-0000-0000" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-2 offset-md-4">
                          <label>MONTH</label>
                          <select class="form-control"  aria-label=".form-select-lg example">
                            <option selected value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select> 
                        </div>
                          <div class="col-md-2 offset-md-1">
                            <label>YEAR</label>
                            <input type="text" name="Year" required="true" class="form-control" value="" min="1" max="99" minlength="1" maxlength="2" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                          </div>
                          <div class="col-md-2 offset-md-1">
                            <label>CCV</label>
                            <input type="text" required="true" id="codeCcv" class="form-control" maxlength="3" name="ccvCode" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                          </div>
                      </div>
                      <div class="row">
                        <label><h3>Subscription type:</h3></label>
                        <div class="col-md-4">
                          <div class="input-group">
                          <select class="form-select" name="Subscription" aria-label=".form-select-lg example">
                            <option selected></option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Yearly">Yearly</option>
                          </select>
                          </div>
                        </div>
                      </div>
                      
                      <div class="checkBoxForms">
                        
                        <div class="form-check">
                          <input required class="form-check-input" type="checkbox" value="" id="boxTermsCondition"/>
                          <label class="form-check-label" for="boxTermsCondition">
                            <b>agree terms & conditions</b>
                          </label>
                        </div>

                      </div>
                    
                    </div>

                    <div class="col-md-4">
                      <!-- Paymeny -->
                      <div class="Cart">
                        <label><h3>CART</h3></label>
                          <div class="cartBox">
                          <iframe id="cart" src="../checkoutcart.php" >
    </iframe>
                          </div>
                        </div>



                        
                      </div>

                      
                      <div class="offset-md-4 col-md-6">
                        <div class="PaymentContainer">
                        <div class="Payment">  
                            <ul>
                            <li class="d-flex justify-content-sm-end"><h2>TOTAL:</h2><p><h2>PHP       
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
                                          echo " " . number_format($total, 2). "<br>";

                                    } 
                                    else 
                                        {
                                           echo "0 ";
                                        }  
                                           $conn->close();
     
                                  ?></h2></p></li>
                            </ul>
                            
                            <button name="Payment" data-click="swal-danger" id = "Payment" >Check out</button>
                            <button id = "Cancel" onclick="myFunction()">Cancel</button>
                        </div>
                        </div>
                    </div>           
                    </div>
                </div>
                  </div> 
        </form>  


       
        <!--<section class="">
          <footer class="bg-secondary text-white text-center text-md-start">
            <div class="container1-sm">
              <div class="row">
                <div class="col-md-6">
                  <h3 class="text-uppercase">Fruit Facts</h3>
                  
                  <p id="FruitFactsText" class="fruitFact">
                  </p>
                </div>

                <div class="col-md-6">
                  <img class="float-end" src="FinalLogo.png" height="200" width="200">
                </div>
              </div>
            </div>
        
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              Fruits on our Door
            </div>
          </footer>
        </section>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">

                                        
  $(function()
    {
      $('#Payment').click(function(e){

        var valid = this.form.checkValidity();

                if(valid)
                {
          var CardNum = $('#CardNum').val();
          var form = $(this).parents('form');

          e.preventDefault();

          if(CardNum.length === 19)
          {

            $.ajax({
          type: 'POST',
          url: 'jspayment.php',
          data: {CardNum: CardNum},
          success: function(data){
            if(data === "card is valid")
            {
              Swal.fire({
                    'title': 'Successful',
                    'text': data,
                    'type': 'success'
                    });form.submit();
                    
            }
            else
            {
              Swal.fire({
                    'title': 'Erorrs',
                    'text': data,
                    'type': 'error'
                    })
            }
                  
              },
              error: function(data){
                Swal.fire({
                    'title': 'Errors',
                    'text': 'There were errors',
                    'type': 'error'
                    })
              }
        })

          }
          else{
            Swal.fire({
                    'title': 'Error',
                    'text': 'Card invalid',
                    'type': 'error'
            })
          }
        
          
        
                }
        else{
          
        }
          

        
      })
    })


</script>
    </body>


</html>