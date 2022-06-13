<?php

require_once('../Connection.php');
$Address = $_POST['address'];
$Fname = $_POST['first_name'];
$Lname = $_POST['last_name'];
$to = $_POST['e_mail'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Check out</title>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

    <style>

    body
    {
        background:#f2f2f2;
    }

    .payment
	{
		border:1px solid #f2f2f2;
		height:280px;
        border-radius:20px;
        background:#fff;
	}
   .payment_header
   {
	   background:rgba(255,102,0,1);
	   padding:20px;
       border-radius:20px 20px 0px 0px;
	   
   }
   
   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }
   
   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content 
    {
        text-align: center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background:rgba(255,102,0,1);
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }

    #addedProducts{
            color: black;
            
            font-size: 20px;
        }
   
    </style>

    <body>

    <div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
            </div>
            <div class="conten">
               <h1 class="content">Payment Success !</h1>

                    
















               <div class="card">
                    <div class="card-body mx-4">
                    <div class="container">
                    <p class="my-5 mx-5 content" style="font-size: 30px;">Thank for your purchase!</p>
                    <div class="row">
                        <ul class="list-unstyled">
                        <?php
                            $randOrderNum = strtoupper(substr(uniqid(sha1(time())),0,5));
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Name: </span>",$Fname, " ", $Lname, "</li>";
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Address: </span>",$Address, "</li>";
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Invoice: </span>",$randOrderNum, "</li>";
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Date: </span>",date("Y / m / d"), "</li>";

                            
                        ?>
                        
                        </ul>
                        <hr>
                        <div class="col-md-12">

                        <div id = "addedProducts">
                            <?php
                                
                            
                            $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo "";
                                    // output data of each row
                                while($row = $result->fetch_assoc()) 
                                {      
                                    echo "<div class=row", "<div class=col-md-10>", $row["quantity"]," ",$row["productName"] ," &nbsp&nbsp - &nbsp&nbsp ₱ ",$row["productPrice"],"<hr>";


                                    $prodid = "SELECT quantity FROM productTable WHERE productName = '$row[productName]'";
                                    $res = $conn->query($prodid);
                                    $row1 = $res->fetch_assoc();
                                    
                                    $change = $row1["quantity"] - $row["quantity"];
                                    $updateQuan = "UPDATE productTable SET quantity='$change' WHERE productName = '$row[productName]'";
                                    $updating = $conn->query($updateQuan);
                                    
                                    }
                                } 
                                else 
                                {
                                    echo "0 results";
                                }  
                                
                                
                                
                                ?>
                        </div>
                        
                        </div>
                    </div>

                    <br>
                    <div class="row text-black">
                        

                    <ul>
                            <li class="d-flex justify-content-sm-end"><h5>TOTAL:</h5><p><h5>PHP       
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
                                          echo " " . $total. "<br>";
                                          $message = $total;

                                    } 
                                    else 
                                        {
                                           echo "0 ";
                                        }  
                                        $delete = $conn->query($del);
                                        $conn->close();
                                    
                                
                                  ?></h5></p></li>
                            </ul>

                        
                    </div>

                    </div>
                </div>
                </div>
               <a href="../../Home Page/index.php"><p class="content"><br>Go to Home</p></a>
            </div>
            
         </div>
      </div>
   </div>
</div>
 
</html>