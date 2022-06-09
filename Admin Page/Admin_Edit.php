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
<?php
    if(isset($_GET['productID']))
    {
        $productID = $_GET['productID'];
        $edit ="SELECT * FROM productTable WHERE productID = '$productID' LIMIT 1";
        $run = mysqli_query($conn, $edit);

        if(mysqli_num_rows($run) > 0)
        {
            $row = mysqli_fetch_array($run);
            ?>




<form action ="tables.php" method="POST">
<div>
    <input type="hidden" name="ProductID" value="<?= $row['productID'] ?>" require class="form-control" placeholder="Enter ProductID">
</div>
<div>
    <label>ProductName</label>
    <input type="text" name="ProductName" value="<?= $row['productName'] ?>" class="form-control" placeholder="Enter ProductName">
</div>
<div>
    <label>ProductPrice</label>
    <input type="text" name="ProductPrice" value="<?= $row['productPrice'] ?>" class="form-control" placeholder="Enter ProductPrice">
</div>
<div>
    <label>Quantity</label>
    <input type="text" name="Quantity" value="<?= $row['quantity'] ?>" class="form-control" placeholder="Enter Quantity">
</div>
<div>
    <label>PortfolioNumber</label>
    <input type="text" name="PortfolioNumber" value="<?= $row['portfolioNum'] ?>" class="form-control" placeholder="Enter PortfolioNumber">
</div>
<div>
    <label>productPageDirectory</label>
    <input type="text" name="productPageDirectory" value="<?= $row['productPageDirectory'] ?>" class="form-control" placeholder="Enter productPageDirectory">
</div>
<div>
    <label>ProductImage</label>
    <input type="file" name="ProductImage" id="image" value="<?= $row['productImg'] ?>" class="form-control">
</div>
<div>
    <label>ProductImage</label>
    <input type="file" name="ProductImage" id="image" value="<?= $row['productImg'] ?>" class="form-control">
</div>
<div>
    <label>ProductImage2</label>
    <input type="file" name="ProductImage2" id="image2" value="<?= $row['productImg2'] ?>" class="form-control">
</div>
<div>
    <label>ProductImage3</label>
    <input type="file" name="ProductImage3" id="image3" value="<?= $row['productImg3'] ?>" class="form-control">
</div>
<div>
    <label>ProductImage4</label>
    <input type="file" name="ProductImage4" id="image4" value="<?= $row['productImg4'] ?>" class="form-control">
</div>
<div>
    <label>ProductBackground</label>
    <input type="text" name="ProductBackground" value="<?= $row['productBg'] ?>" class="form-control" placeholder="Enter ProductBackground">
</div>
<div>
    <label>ProductBackground</label>
    <input type="text" name="description" value="<?= $row['description'] ?>" class="form-control" placeholder="Enter Description">
</div>
<div class = "col-md-12 mb-3">
<button type = "submit" class = "btn btn-primary" name = "save" >Save</button>
</div>
</form>
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
                                            