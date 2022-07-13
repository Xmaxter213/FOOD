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
            <h4> Add Admin
            <a href="add_admin.php" class="btn btn-danger float-end" >BACK</a>
            </h4>
        </div> 
        <div class="card-body">

    <form action ="add_admin.php" method="POST" >
        <div>
        <label>FirstName</label>
            <input type="text" name="firstName"  required class="form-control" placeholder="Enter Firstname" required>
        </div>
        <div>
            <label>LastName</label>
            <input type="text" name="lastName"  class="form-control" placeholder="Enter Lastname" required>
        </div>
        <div>
            <label>Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Enter Username" required pattern ="\S(.*\S)?[A-Za-z0-9]+" title="Must only contain letters and numbers"/>
        </div>
        <div>
            <label>E-mail</label>
            <input type="email" name="email"  class="form-control" placeholder="Enter E-mail" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" required pattern ="\S(.*\S)?[A-Za-z0-9]+.{6,}" title="Must contain at least one (1) number, one (1) letter, no space & special characters, and at least 8 or more characters">
           
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
