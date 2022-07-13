<?php

require_once('../../Connection/Connection.php');
$Address = $_POST['address'];
$Fname = $_POST['first_name'];
$Lname = $_POST['last_name'];
$Subcript = $_POST['Subscription'];
$mail = $_POST['e_mail'];

$receiver = $mail;
$headers  = "From: NatsuDragneelxd42069@gmail.com" . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
?>
                 


<!DOCTYPE html>
<html>
    <head>
        <title>Success</title>  
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/FinalLogo.png" />
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
                            $now = new DateTime();

                            $randOrderNum = strtoupper(substr(uniqid(sha1(time())),0,5));
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Name: </span>",$Fname, " ", $Lname, "</li>";
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Address: </span>",$Address, "</li>";
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Invoice: </span>",$randOrderNum, "</li>";
                            $subject = $randOrderNum;
                            echo "<li class=text-muted mt-1>","<span class=text-black>","Date: </span>",date("Y / m / d"), "</li>";

                            $curr = $now->format('Y-m-d H:i:s');
                            
                        ?>
                        
                        </ul>
                        <hr>
                        <div class="col-md-12">

                        <div id = "addedProducts">
                            <?php
                                $message = "<h2>Receipt</h2>";
                                $message .= "<br>Customer: " . $Fname . " " . $Lname;
                                $message .= "<br>" . "Address: " . $Address . "<br>";
                                $message .= "<br>" . "Subscription: " . $Subcript . "<br>";
                                $message .= "<br>" . "ORDER:" . "<br>";
                                $message .= '<hr>';
                                $message .= '<table>';
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo "";
                                    // output data of each row
                                while($row = $result->fetch_assoc()) 
                                {      
                                    echo "<div class=row", "<div class=col-md-10>", $row["quantity"]," ",$row["productName"] ," &nbsp&nbsp - &nbsp&nbsp ₱ ",$row["productPrice"],"<hr>";
                                    $message .= '<tr>';
                                    $message .= '<td>' .$row["quantity"]. "x " . '</td>';
                                    $message .= '<td>' .$row["productName"]. " " .'</td>';
                                    $message .= '<td>' ." - ₱ ".$row["productPrice"]. '</td>';
                                    $message .= '</tr>';
                                   
                                   

                                    $prodid = "SELECT quantity FROM productTable WHERE productName = '$row[productName]'";
                                    $res = $conn->query($prodid);
                                    $row1 = $res->fetch_assoc();
                                    
                                    
                                    $invoiceTable = "INSERT INTO CustomerStatusTable (userID, Invoice , productName, quantity, Stat, curDate) VALUES ('$userID','$randOrderNum','$row[productName]', '$row[quantity]', 'OnGoing' , '$curr');";
                                    $inserting = $conn->query($invoiceTable);

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
                                          echo " " . number_format($total, 2). "<br>";
                                          $message .= '<td>' . "Total " . '</td>';
                                          $message .= '<td>' . "- ₱ " .number_format($total, 2); '</td>';
                                          $message .= '</table>';

                                    } 
                                    else 
                                        {
                                           echo "0 ";
                                        }
                                        if(mail($receiver, $subject, $message, $headers))
                                            {
                                                
                                            }
                                            else
                                            {
                                                
                                            }    
                                        $delete = $conn->query($del);
                                        
                                        
                                    
                                
                                  ?></h5></p></li>
                            </ul>

                        
                    </div>

                    </div>
                </div>
                <?php
                    
                                    $sql1 = "SELECT productTable.productName,productTable.quantity, userTable.email FROM productTable, userTable WHERE userTable.status = 'ADMIN'  ";
                                    $result1 = $conn->query($sql1);
                                    if ($result1->num_rows > 0) {
                                        echo "";
                                        // output data of each row
                                    while($row = $result1->fetch_assoc()) 
                                    {
                                        if($row['quantity'] <= 20)
                                        {
                                            $adminEmail=$row['email'];
                                            $names = $row['productName'];
                                            $subject = "Product Is Low";
                                            $message = "Please Resupply product $names";
                                            $sender = "From: NatsuDragneelxd42069@gmail.com";
                                            if(mail($adminEmail, $subject, $message, $sender))
                                            {
                                            
                                            }
                                            else
                                            {
                                                
                                            }    
                                          
                                        }

                                        
                                        }
                                        

                                    } 
                                    else 
                                    {
                                        echo "0";
                                    }
                                    $conn->close();
                                ?>
                </div>
               <a href="../../Home Page/index.php"><p class="content"><br>Go to Home</p></a>
            </div>
            
         </div>
      </div>
   </div>
</div>
 
</html>