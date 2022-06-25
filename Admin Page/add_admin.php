<?php


require_once('../View Cart/Connection.php');
include('message.php');


if(isset($_POST['add']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    
        $query = "INSERT INTO userTable (firstName, lastName, username , email, password, status) VALUES ('$firstName','$lastName', '$username','$email','$password', 'ADMIN' )";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Catagory Added Successfully";
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



if(isset($_POST['save']))
{
    $userID = $_POST['userID'];
    $status = $_POST['status'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

        $query="UPDATE userTable SET firstName='$firstName', lastName ='$lastName', username='$username', email='$email', password='$password' WHERE userID='$userID' AND status ='$status' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            
           
            $_SESSION['message'] = "Catagory Updated Successfully";
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





?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>F.O.O.D - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">F.O.O.D</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            

            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item -History Tables -->
            <li class="nav-item">
                <a class="nav-link" href="historyAdmin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Purchase History Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item active">
                <a class="nav-link" href="add_admin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php  
                        if (isset($_SESSION['userlogin']))
                            {
                                $_SESSION_user= $_SESSION['userlogin'];echo implode (" ",$_SESSION_user);/*spacing if many array (" ",$_SESSION_user)*/
                            }
                        else{
                                echo 'ADMIN';
                            }
                            ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?logout=true" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive"> 

                             <?php
                                            $count =0;
                                            $sql = "SELECT * FROM userTable WHERE status = 'ADMIN' ";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "";
                                                
                                                ?>
                                <a href= "adding_admin.php" class="btn btn-primary float-end">Add</a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>UserID</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Username</th>
                                            <th>E-mail</th>
                                            <th>Status</th>
                                            <th>Edit Admin</th>
                                            <th>Remove Admin</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>UserID</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Username</th>
                                            <th>E-mail</th>
                                            <th>Status</th>
                                            <th>Edit Admin</th>
                                            <th>Remove Admin</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                                <?php
                                                     while($row = mysqli_fetch_array($result)) 
                                                     {   
                                                         $count = $count + 1;
                                                
                                                ?>
                                       
                                            <tr>
                                            <td><?php echo $row['userID'];?></td>
                                            <td><?php echo $row['firstName'];?></td>
                                            <td><?php echo $row['lastName'];?></td>
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                            <td>
                                                
                                                    <a href="edit_admin.php?userID=<?= $row['userID'] ?>" class="btn btn-info">Edit</a>
                                                
                                            </td>

                                            <td>
                                                    <form action="delete_admin.php" method="POST">
                                                
                                                    <button type="submit" name="admindelete" value="<?= $row['userID'] ?>" class="btn btn-danger">Delete</a>
                                                    </form>
                                            </td>
                                            </tr>  
                                            <?php
                                               
                                                }
                                               
                        
                                            } 
                                            else 
                                            {
                                                echo "No Record Found";
                                            }
                                        ?>
                                       
                                        
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php?logout=true">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>