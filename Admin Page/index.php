<?php
require_once('../Connection/Connection.php');
    if(!isset($_SESSION['userStatus']))
    {
        header("location: ../Login Page/Login_new.php");
    }
    else
    {
        $name = $_SESSION['userStatus'];
        if(implode ('',$name) != 'ADMIN')
        {
            header("location: ../Home Page/index.php");
        }
    }

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION);
        header("location: ../Login Page/Login_new.php");
    }



require_once('../Connection/Connection.php');;

//EVERYTHING BELOW IS FOR PIE CHARTS
$connect = mysqli_connect("sql.freedb.tech", "freedb_FoodOnOurDoor", "#!HmEcHX5Ued@*7", "freedb_FoodOnOurDoor");  
$query = "SELECT productName, SUM(quantity) AS quantity FROM CustomerStatusTable GROUP BY productName;";  
$result = mysqli_query($connect, $query);

$query2 = "SELECT CustomerStatusTable.productName, SUM(productTable.productPrice * CustomerStatusTable.quantity) AS Sales FROM CustomerStatusTable, productTable WHERE CustomerStatusTable.productName = productTable.productName GROUP BY CustomerStatusTable.productName;";
$result2 = mysqli_query($connect, $query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/FinalLogo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>F.O.O.D Admin  - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link   
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- THIS IS FOR THE PIE CHARTS -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <script type="text/javascript">  
        google.charts.load('current', {'packages':['corechart']});  
        google.charts.setOnLoadCallback(drawChart);  
        function drawChart()  
        {  
            var data = google.visualization.arrayToDataTable([  
                ['Product', 'quantity'],  
                <?php  
                while($row = mysqli_fetch_array($result))  
                {  
                    echo "['".$row["productName"]."', ".$row["quantity"]."],";  
                }  
                ?>  
            ]);  
            var options = {  
                title: 'Most Bought Fruit',  
                //is3D:true,  
                pieHole: 0.4  
                };  
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
            chart.draw(data, options);  
        }

        google.charts.setOnLoadCallback(drawChart2);
        function drawChart2()  
        {  
            var data = google.visualization.arrayToDataTable([  
                ['Product', 'Sales'],  
                <?php  
                while($row = mysqli_fetch_array($result2))  
                {  
                    echo "['".$row["productName"]."', ".$row["Sales"]."],";  
                }  
                ?>  
            ]);  
            var options = {  
                title: 'Most Revenue',  
                //is3D:true,  
                pieHole: 0.4  
                };  
            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
            chart.draw(data, options);  
        }  
        </script> 
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
                <div class="sidebar-brand-text mx-3">F.O.O.D </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

           

            


            <!-- Nav Item - Pages Collapse Menu -->
            <!--<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>-->


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sales Status Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="historyAdmin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Purchase History Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php  
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

            

           <br/><br/>  
           <div style="width:900px;">  
                <h3></h3>  
                <br/>  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div><br>

           <div style="width:900px;">  
                <h3></h3>  
                <br />  
                <div id="piechart2" style="width: 900px; height: 500px;"></div>  
           </div>  
                   


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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>