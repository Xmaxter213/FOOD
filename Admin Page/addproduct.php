<?php

require_once('../View Cart/Connection.php');



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

    <?php include('message.php');?>

    <div class="card">
        <div class="card-header">
            <h4> Edit Product
            <a href="tables.php" class="btn btn-danger float-end" >BACK</a>
            </h4>
        </div> 
        <div class="card-body">

    <form action ="tables.php" method="POST">
        <div>
        <label>ProductID</label>
            <input type="number" name="ProductID"  required class="form-control" placeholder="Enter ProductID">
        </div>
        <div>
            <label>ProductName</label>
            <input type="text" name="ProductName"  class="form-control" placeholder="Enter ProductName">
        </div>
        <div>
            <label>ProductPrice</label>
            <input type="text" name="ProductPrice"  class="form-control" placeholder="Enter ProductPrice">
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="Quantity"  class="form-control" placeholder="Enter Quantity">
        </div>
        <div>
            <label>PortfolioNumber</label>
            <input type="text" name="PortfolioNumber" class="form-control" placeholder="Enter PortfolioNumber">
        </div>
        <div>
            <label>productPageDirectory</label>
            <input type="text" name="productPageDirectory"  class="form-control" placeholder="Enter productPageDirectory">
        </div>
        <div>
            <label>ProductImage</label>
            <input type="text" name="ProducyImage" class="form-control" placeholder="Enter ProducyImage">
        </div>
        <div>
            <label>ProductBackground</label>
            <input type="text" name="ProductBackground"  class="form-control" placeholder="Enter ProductBackground">
        </div>
        <div class = "col-md-12 mb-3">
        <button type = "submit" class = "btn btn-primary" name = "add" >Add</button>
        </div>
        </form>


        </div>
</div>
</div>
</div>
</div>
</body>
</html>
