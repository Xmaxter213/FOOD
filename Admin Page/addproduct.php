<?php

require_once('../Connection/Connection.php');



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
            <h4> Add Product
            <a href="tables.php" class="btn btn-danger float-end" >BACK</a>
            </h4>
        </div> 
        <div class="card-body">

    <form action ="tables.php" method="POST" enctype="multipart/form-data">
        <div>
        <label>ProductID</label>
            <input type="number" name="ProductID"  required class="form-control" placeholder="Enter ProductID">
        </div>
        <div>
            <label>ProductName</label>
            <input type="text" name="ProductName"  class="form-control" placeholder="Enter ProductName" required>
        </div>
        <div>
            <label>ProductPrice</label>
            <input type="text" name="ProductPrice"  class="form-control" placeholder="Enter ProductPrice" required>
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="Quantity"  class="form-control" placeholder="Enter Quantity" required>
        </div>
        <div>
            <label>PortfolioNumber</label>
            <input type="text" name="PortfolioNumber" class="form-control" placeholder="Enter PortfolioNumber" required>
        </div>
        
        <div>
            <label>ProductImage</label>
            <input type="file" name="productImg" id="image"  class="form-control" required>
        </div>
        <div>
            <label>ProductImage2</label>
            <input type="file" name="productImg2" id="image2"  class="form-control" required>
        </div>
        <div>
            <label>ProductImage3</label>
            <input type="file" name="productImg3" id="image3"  class="form-control" required>
        </div>
        <div>
            <label>ProductImage4</label>
            <input type="file" name="productImg4" id="image4"  class="form-control" required>
        </div>
        <div>
            <label>ProductBackground</label>
            <input type="file" name="ProductBackground"  class="form-control" placeholder="Enter ProductBackground" required>
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description"  class="form-control" placeholder="Enter Description" required>
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
