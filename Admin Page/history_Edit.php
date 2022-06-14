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
            <a href="historyAdmin.php" class="btn btn-danger float-end" >BACK</a>
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




<form action ="historyAdmin.php" method="POST">
<div>
    <input type="hidden" name="Invoice" value="<?=  $row['Invoice'] ?>" require class="form-control" placeholder="Enter Invoice">
</div>
<div>
    <label>Status</label>
    <select class="form-select" name="Status" aria-label=".form-select-lg example">
    <option selected value="<?php echo $row['Stat'] ?>"><?php echo $row['Stat'] ?></option>
    <option value="OnGoing">OnGoing</option>
    <option value="Delayed">Delayed</option>
    <option value="Delivered">Delivered</option>
    </select>
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
                                            