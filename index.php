<?php
header('Content-Type: text/html; charset=utf-8');
require("connect.php");
session_start();

if (!isset($_SESSION['username']))
{
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
// if (!empty($_SESSION)) {
//     echo "ยังมี session ค้างอยู่";
// } else {
//     echo "ไม่มี session แล้ว";
// }
if (isset($_GET['logout']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
$query = "SELECT (SELECT COUNT(status) FROM user_task WHERE user_id = '".$_SESSION['user']."') AS total,
		(SELECT COUNT(status) FROM user_task WHERE user_id = '".$_SESSION['user']."' AND status = 'Hold') AS Hold,
		(SELECT COUNT(status) FROM user_task WHERE user_id = '".$_SESSION['user']."' AND status = 'Pending') AS Pen,
		(SELECT COUNT(status) FROM user_task WHERE user_id = '".$_SESSION['user']."' AND status = 'Complete') AS Com";
$result = $con->query($query);
$row = $result->fetch_assoc();
$queryB = "SELECT * FROM user_task WHERE user_id = '".$_SESSION['user']."' AND status IN ('Hold', 'Pending') AND deadline IS NOT NULL ORDER BY deadline ASC";
$resultB = $con->query($queryB);
$foundRow = $resultB->num_rows;
// $queryAlert = "SELECT * FROM user_task WHERE user_id = '".$_SESSION['user']."'";
// $resultAlert = $con->query($queryAlert);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body id="page-top">
<div>
</div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fa fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Personal Data</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                My Functions
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-search"></i>
                    <span>Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mini function:</h6>
                        <a class="collapse-item" href="todolist.php">Task ToDoList</a>
                    </div>
                </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Pages Collapse Menu -->
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-block">
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
                    <!-- <form
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
                    </form> -->

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
                                <form class="form-inline mr-auto w-100 navbar-search" method="">
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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                    <?php
                                    if($foundRow > 3)
                                    {
                                        echo "3+";
                                    }else
                                    {
                                        echo $foundRow;
                                    }
                                    ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <?php
                                for($i = 1; $i <= $foundRow;$i++){
                                    if($i > 3) break;
                                    $rowB = $resultB->fetch_assoc();
                                    
                                    $currentDate = date("Y-m-d");
                                    $origin = date_create(date('Y-m-d', strtotime($rowB['deadline'])));
                                    $currenDay = date_create(date('Y-m-d'));
                                    $interval = date_diff($origin, $currenDay);    
                                ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle <?php 
                                            if ($interval->invert == 1) {
                                                echo "bg-warning";
                                                
                                            } else {
                                                echo "bg-danger";
                                            } 
                                            ?>">
                                            <i class="fa-solid fa-file-lines text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">
                                            <?php
                                            if ($interval->invert == 1) {
                                                echo "ถึงกำหนดในอีก " . $interval->days . " วัน";
                                                
                                            } else {
                                                echo "เกินกำหนดมา " . $interval->days . " วัน";
                                            }
                                            ?>
                                        </div>
                                        <span class="font-weight-bold"><?php echo $rowB['title']; ?></span>
                                    </div>
                                </a>
                                <?php } ?>
                                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="activity.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Task Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $foundRow != 0 ? number_format((($row['Com']/$row['total']))*100,2) : 0 ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: <?php echo $foundRow != 0 ? number_format((($row['Com']/$row['total']))*100,2) : 0 ?>%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Holding Card  -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Holding Task</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['Hold'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pending Task</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['Pen'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task Complete Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Task Complete</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['Com'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Sources manage</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Hold
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Pending
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Complete
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project Card Example -->
                        <div class="card shadow mb-4 col-xl-6 col-lg-6">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects Due soon.</h6>
                                </div>
                                <div class="card-body">
                                    <?php 
                                    if($foundRow == 0){
                                        echo "No projects due soon.";
                                    }
                                    $resultB->data_seek(0);
                                    
                                    for($i = 1; $i <= $foundRow;$i++){
                                        if($i > 4) break;
                                        
                                        $rowB = $resultB->fetch_assoc();
                                        if($foundRow != 0){
                                    ?>
                                    <div style="height: 25%; margin-top: 10px;">
                                        <h6 ><?php echo substr($rowB['title'], 0, 50) ?> <span
                                        class="float-right">
                                        <?php 
                                            $currentDate = date("Y-m-d");
                                            $origin = date_create(date('Y-m-d', strtotime($rowB['deadline'])));
                                            $currenDay = date_create(date('Y-m-d'));
                                            $interval = date_diff($origin, $currenDay);
                                            
                                            if ($interval->invert == 1) {
                                                echo "เหลือเวลา " . $interval->days . " วัน";
                                            } else {
                                                echo "เกินกำหนด " . $interval->days . " วัน";
                                            } 
                                        }
                                        ?></span></h6>
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
            <script>
                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Hold", "Pending", "Complete"],
                    datasets: [{
                    data: [<?php echo $row['Hold'] ?>, <?php echo $row['Pen'] ?>, <?php echo $row['Com'] ?>],
                    //   data: [20,42,6],
                    backgroundColor: ['#eebc3c', '#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#f1c04b', '#5d7fde', '#2ccb92'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    },
                    plugins: {
                                legend: {
                                    display: false // ซ่อน legend
                                }
                            },
                    cutoutPercentage: 85,
                },
                });
            </script>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                    <a class="btn btn-primary" href="index.php?logout='1'">Logout</a>
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
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->
    

</body>

</html>
<?php
// Close the database connection
// $con->close();
?>