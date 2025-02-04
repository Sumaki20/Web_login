<?php
session_start();

if (!isset($_SESSION['username']))
{
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Personal Data | activitylog</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/my_custom.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Personal Data</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mini function:</h6>
                        <a class="collapse-item" href="buttons.html">Your list</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
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

                        <!-- Nav Item - Alerts -->
                        

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
                                <a class="dropdown-item" href="index.php?logout=''" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                    
                </nav>
                <!-- End of Topbar -->

                <!-- JS edits button table -->
                <script>
                    function cancelEdit(rowId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
                    
                        let textareas = row.querySelectorAll("textarea");
                        let spans = row.querySelectorAll("span");
                    
                        spans.forEach((span, index) => {
                          let newValue = span.textContent.trim();
                          
                          textareas[index].value = newValue;
                          textareas[index].style.display = "none"; // แสดงข้อความ
                          span.style.display = "block"; // ซ่อน textarea
                        });
                        document.getElementById("edit-btn-"+rowId).style.display = "inline-block";
                        document.getElementById("delete-btn-"+rowId).style.display = "inline-block";
                        document.getElementById("save-btn-"+rowId).style.display = "none";
                        document.getElementById("cancel-btn-"+rowId).style.display = "none";
                    }
                    
                    function editData(rowId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
                    
                        let textareas = row.querySelectorAll("textarea");
                        let spans = row.querySelectorAll("span");
                    
                        spans.forEach((span, index) => {
                          let newValue = span.textContent.trim();
                          textareas[index].innerText = newValue; // อัปเดตข้อความใหม่
                          textareas[index].style.display = "block"; // แสดงข้อความ
                          span.style.display = "none"; // ซ่อน textarea
                        });
                        document.getElementById("edit-btn-"+rowId).style.display = "none";
                        document.getElementById("delete-btn-"+rowId).style.display = "none";
                        document.getElementById("save-btn-"+rowId).style.display = "inline-block";
                        document.getElementById("cancel-btn-"+rowId).style.display = "inline-block";
                    }
                  
                    function saveData(rowId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
                    
                        let textareas = row.querySelectorAll("textarea");
                        let spans = row.querySelectorAll("span");
                    
                        textareas.forEach((textarea, index) => {
                          let newValue = textarea.value.trim();
                          spans[index].innerText = newValue; // อัปเดตข้อความใหม่
                          spans[index].style.display = "block"; // แสดงข้อความ
                          textarea.style.display = "none"; // ซ่อน textarea
                        });
                        // ซ่อนปุ่มบันทึก
                        row.querySelector("#edit-btn-"+rowId).style.display = "inline-block";
                        row.querySelector("#delete-btn-"+rowId).style.display = "inline-block";
                        row.querySelector("#save-btn-"+rowId).style.display = "none";
                        row.querySelector("#cancel-btn-"+rowId).style.display = "none";
                    }
                    
                    function saveCreateData(rowId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
                    
                        let textareas = row.querySelectorAll("textarea");
                        let spans = row.querySelectorAll("span");
                    
                        textareas.forEach((textarea, index) => {
                          let newValue = textarea.value.trim();
                          spans[index].innerText = newValue; // อัปเดตข้อความใหม่
                          spans[index].style.display = "block"; // แสดงข้อความ
                          textarea.style.display = "none"; // ซ่อน textarea
                        });
                    
                        // ซ่อนปุ่มบันทึกและแสดงปุ่มแก้ไข
                        row.querySelector("#edit-btn-"+rowId).style.display = "inline-block";
                        row.querySelector("#delete-btn-"+rowId).style.display = "inline-block";
                        row.querySelector("#save-btn-"+rowId).style.display = "none";
                        row.querySelector("#cancel-btn-"+rowId).style.display = "none";
                        row.querySelector("#saveCreate-btn-"+rowId).style.display = "none";
                        document.getElementById("create-btn").style.display = "inline-block";
                    }
                  
                    function myDeleteFunction(rowId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
                    
                        row.remove();
                    }

                    let indexRowid; //เอาไว้ชี้แถว

                    function myDeleteCon(rowId)
                    {
                        indexRowid = rowId;
                        console.log(indexRowid);
                    }
                  
                    function myCreateFunction() {
                        console.log("create");
                        let table = document.getElementById("dataTable");
                        let index = table.rows.length; // คำนวณ index ใหม่
                        let rowId = `row-${index}`;
                    
                        let row = table.insertRow(index-1);
                        row.id = rowId;
                    
                        row.innerHTML = `
                            <td>
                                <span id="e1-${index}" style="display: none;"></span>
                                <textarea id="edit-input${index}" style="display: block;"></textarea>
                            </td>
                            <td>
                                <span id="e2-${index}" style="display: none;"></span>
                                <textarea id="edit-input${index}" style="display: block;"></textarea>
                            </td>
                            <td>
                                <span id="e3-${index}" style="display: none;"></span>
                                <textarea id="edit-input${index}" style="display: block;"></textarea>
                            </td>
                            <td>
                            </td>
                            <td>
                                <button onclick="editData('${rowId}')" id="edit-btn-${rowId}" style="display: none;">แก้ไข</button>
                                <button onclick="myDeleteFunction('${rowId}')" id="delete-btn-${rowId}" style="display: none;">delete</button>
                                <button onclick="saveCreateData('${rowId}')" id="saveCreate-btn-${rowId}" style="display: inline-block;">บันทึก</button>
                                <button onclick="saveData('${rowId}')" id="save-btn-${rowId}" style="display: none;">บันทึก</button>
                                <button onclick="cancelEdit('${rowId}')" id="cancel-btn-${rowId}" style="display: inline-block;">ยกเลิก</button>
                            </td>
                        `;
                        document.getElementById("create-btn").style.display = "none";
                    }
                </script>
                    <style>
                        textarea {
                          width: 100%;
                          min-height: 40px;
                          resize: none; /* ปิดการปรับขนาด */
                          overflow: hidden; /* ซ่อน Scrollbar */
                          border: 1px solid #ccc;
                          padding: 5px;
                          font-size: 16px;
                        }
                    </style>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">ToDoList</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>
                        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Task ToDoList</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th style="width: 50%;">Task</th>
                                            <th style="width: 15%;">Status</th>
                                            <th style="width: 10%;">Deadline</th>
                                            <th style="width: 10%;">Remaining</th>
                                            <th style="width: 15%;">Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" style="border-right: 0;">
                                            </td>
                                            <td >
                                                <a href="#" onclick="myCreateFunction()" id="create-btn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                    <i class="fas fa-download fa-sm text-white-50"></i> New Task
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr id="row-1">
                                            <td >
                                                <span id="e1-${row-1}">ตัวอsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssย่างข้อมูล</span>
                                                <textarea id="edit-input${row-1}" style="display: none;" oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="พิมพ์ข้อความที่นี่...">ตัวอย่างข้อมูล</textarea>
                                            </td>
                                            <td >
                                                <span id="e2-${row-1}">ตัวอssssssssssssssssssssssssssssย่ssssssssssssssssssssssssssssย่ย่างข้อมูล</span>
                                                <textarea id="edit-input${row-1}" style="display: none;" oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="พิมพ์ข้อความที่นี่...">ตัวอย่างข้อมูล</textarea>
                                            </td>
                                            <td >
                                                
                                                <span id="e3-${row-1}">ตัวอย่างข้อมูล</span>
                                                <textarea id="edit-input${row-1}" style="display: none; "oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="พิมพ์ข้อความที่นี่...">ตัวอย่างข้อมูล</textarea>
                                            </td>
                                            <td >
                                                3
                                            </td>
                                            <td>
                                                <button onclick="editData('row-1')" id="edit-btn-row-1" style="display: inline-block;" >แก้ไข</button>
                                                <button onclick="myDeleteCon('row-1')"id="delete-btn-row-1" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal">Delete</button>
                                                <button onclick="saveData('row-1')" id="save-btn-row-1" style="display: none;">บันทึก</button>
                                                <button onclick="cancelEdit('row-1')" id="cancel-btn-row-1" style="display: none;">ยกเลิก</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                    <!-- Activity Log -->
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Row Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Cancel" below if you are ready to delete.</div>
                <div class="modal-footer"> 
                    <button onclick="myDeleteFunction(indexRowid)" class="btn btn-danger" type="button" data-dismiss="modal">Delete</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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