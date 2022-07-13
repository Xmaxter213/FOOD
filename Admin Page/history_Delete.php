<?php

require_once('../Connection/Connection.php');
include('message.php');

if(isset($_POST['admindelete']))
{
    $productID = $_POST['admindelete'];

    $query = "DELETE FROM CustomerStatusTable WHERE Invoice ='$productID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Catagory Deleted  Successfully";
        header('Location: historyAdmin.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Someting Went Wrong !";
        header('Location: historyAdmin.php');
        exit(0);
    }

}