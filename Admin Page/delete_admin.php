<?php

require_once('../View Cart/Connection.php');
include('message.php');

if(isset($_POST['admindelete']))
{
    $userID = $_POST['admindelete'];

    $query = "DELETE FROM userTable WHERE userID ='$userID' AND status = 'ADMIN' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Catagory Deleted  Successfully";
        header('Location: add_admin.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Someting Went Wrong !";
        header('Location: add_admin.php');
        exit(0);
    }

}