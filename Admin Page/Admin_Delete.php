<?php

require_once('../View Cart/Connection.php');
include('message.php');

if(isset($_POST['admindelete']))
{
    $productID = $_POST['admindelete'];

    $query = "DELETE FROM productTable WHERE productID ='$productID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Catagory Deleted  Successfully";
        header('Location: tables.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Someting Went Wrong !";
        header('Location: tables.php');
        exit(0);
    }

}