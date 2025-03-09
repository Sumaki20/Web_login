<?php
require("connect.php");
session_start();
date_default_timezone_set("Asia/Bangkok");
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
$sql = "SELECT * FROM user_task WHERE user_id = '" . $_SESSION['user'] . "'";
$calltable = $con->query($sql);
$queryB = "SELECT * FROM user_task WHERE user_id = '".$_SESSION['user']."' AND status IN ('Hold', 'Pending') AND deadline IS NOT NULL ORDER BY deadline ASC";
$resultB = $con->query($queryB);
$foundRow = $resultB->num_rows;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                    let isCreate = 0;
                    let isEdit = 0;
                    let isComplete;

                    function cancelEdit(rowId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
                        if(isCreate === 0)
                        {
                            for(i=1; i<=5; i++){
                                let showDetails = document.getElementById("e"+i+"-"+rowId);
                                let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);
                                if(i <= 2)
                                {
                                    let newValue = showDetails.textContent.trim();
                                    inputDetails.textContent = newValue;
                                    inputDetails.style.display = "none";
                                    showDetails.style.display = "block";
                                }
                                else if(i == 3)
                                {
                                    
                                    let newValue = showDetails.textContent.trim();
                                    inputDetails.textContent = newValue;
                                    showDetails.style.display = "block";
                                    inputDetails.style.display = "none";
                                }
                                else if(i == 4)
                                {
                                    //date button
                                    let showDetails = document.getElementById("e"+i+"-"+rowId);
                                    let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);
                                    // action date
                                    var x = showDetails.textContent.split('/');
                                    console.log(x);
                                    if (!inputDetails || !inputDetails.value) {
                                        showDetails.textContent = "Date not specified.";
                                    }
                                    else{
                                        showDetails.textContent = x[0]+'/'+x[1]+'/'+x[2];
                                    }
                                    inputDetails.style.display = "none";
                                    showDetails.style = "display: block; width: 100%;";
                                }
                            }

                            document.getElementById("edit-btn-"+rowId).style = "display: ; margin: auto;";
                            document.getElementById("delete-btn-"+rowId).style = "display: ; margin: auto;";
                            document.getElementById("save-btn-"+rowId).style = "display: none; margin: auto;";
                            document.getElementById("cancel-btn-"+rowId).style = "display: none; margin: auto;";
                        }
                        else
                        {
                            isCreate = 0;
                            row.remove();
                            document.getElementById("create-btn").style = "display: contents;";
                        }
                    }

                    function editData(rowId,dataId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

                        isEdit = 1;
                        // name task action
                        for(i=1; i<=4;i++)
                        {
                            // find id
                            let showDetails = document.getElementById("e"+i+"-"+rowId);
                            let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);
                            if(i<=2){
                                // action&show textarea NameTask and task details
                                let newValue = showDetails.textContent.trim();
                                inputDetails.textContent = newValue; // อัปเดตข้อความใหม่
                                inputDetails.style.display = "block"; // แสดงข้อความ
                                inputDetails.style.height = 'auto';
                                inputDetails.style.height = inputDetails.scrollHeight + 'px';
                                inputDetails.oninput = function () {
                                    this.style.height = 'auto'; // รีเซ็ตความสูงก่อน เพื่อให้ scrollHeight ถูกต้อง
                                    this.style.height = this.scrollHeight + 'px';
                                    this.placeholder="พิมพ์ข้อความที่นี่...";
                                };
                                showDetails.style.display = "none"; // ซ่อน textarea
                            }
                            else if(i==3)
                            {
                                // show select status
                                // var selectedStatus = inputDetails.getAttribute("data-value");
                                // console.log("Selected:", selectedValue);
                                console.log(showDetails.textContent);
                                console.log(inputDetails.textContent);
                                inputDetails.style.display = "block";
                                showDetails.style.display = "none";
                            }
                            else if (i==4){
                                // date button
                                // action due date and complete date
                                let dateText = showDetails.textContent.trim(); // ใช้ .textContent แทน .value
                                let x = dateText.split('/'); // ตรวจสอบรูปแบบวันที่ที่เก็บอยู่ก่อน
                                // console.log(x);
                                if (x.length === 3) {
                                    inputDetails.value = `${x[2]}-${x[1]}-${x[0]}`; // yyyy-mm-dd
                                }
                                // console.log(inputDetails.value)
                                showDetails.style.display = "none";
                                inputDetails.style = "display: block; width: 100%;";
                            }
                        }

                        document.getElementById("edit-btn-"+rowId).style = "display: none; margin: 2px;";
                        document.getElementById("delete-btn-"+rowId).style = "display: none; margin: 2px;";
                        document.getElementById("save-btn-"+rowId).style = "display: inline-flex; margin: 2px;";
                        document.getElementById("cancel-btn-"+rowId).style = "display: inline-flex; margin: 2px;";
                    }

                    function saveData(rowId,dataId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
                        let inputTitle = document.getElementById("edit-input1-"+rowId);
                        let inputDetails = document.getElementById("edit-input2-"+rowId);
                        let inputStatus = document.getElementById("edit-input3-"+rowId);
                        let inputDeadline = document.getElementById("edit-input4-"+rowId);

                        let alertTap = document.getElementById("alertTap");
                        let showStatus = document.getElementById("e3-"+rowId);
                        let showCom = document.getElementById("e5-"+rowId);
                        
                        if(inputTitle.value == ""){
                            alertTap.classList.remove("d-none");
                            return;
                        }
                        else
                        {
                            alertTap.classList.add("d-none");
                        }

                        if(showStatus.textContent == ""){
                            selectOption('Pending', rowId);
                        }
                        //hereeeee
                        
                        if(inputStatus.textContent.trim() == "Complete"){
                            isComplete = 1;
                            showCom.textContent = <?php echo "'".date("d-m-Y")."'" ?>;
                        }else
                        {
                            isComplete = 0;
                            showCom.textContent = "Incomplete.";
                        }
                        
                        
                        let ids = rowId.split('row-');
                        let task_idValue = ids[1];
                        let titleValue = inputTitle.value.trim();
                        let detailsValue = inputDetails.value.trim();
                        let statusValue = inputStatus.textContent.trim();
                        let deadlineValue = inputDeadline.value.trim();
                        let submitDateValue = isComplete;
                        console.log(isComplete);
                        if(isCreate == 1)
                        {
                            let data = {
                                user_id: <?php echo $_SESSION['user']; ?>,
                                action: "insert",
                                title: titleValue,
                                details : detailsValue,
                                status : statusValue,
                                deadline : deadlineValue,
                                submitDate : submitDateValue
                            }; // ส่ง JSON
                    
                            fetch('todolist_db.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json()) // รับ JSON กลับ
                            .then(data => {
                                console.log(data.message); // แสดงผลลัพธ์
                            })
                            .catch(error => console.error('Error:', error));
                            location.reload();
                        }else{
                            let data = {
                                user_id: <?php echo json_encode($_SESSION['user']); ?>,
                                task_id: task_idValue,
                                action: "update",
                                title: titleValue,
                                details : detailsValue,
                                status : statusValue,
                                deadline : deadlineValue,
                                submitDate : submitDateValue
                            }; // ส่ง JSON
                    
                            // console.log(data);

                            fetch('todolist_db.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json()) // รับ JSON กลับ
                            .then(data => {
                                console.log(data.message); // แสดงผลลัพธ์
                            })
                            .catch(error => console.error('Error:', error));
                        }
                        // display input Details
                        for(i=1;i<=4;i++)
                        {
                            let showDetails = document.getElementById("e"+i+"-"+rowId);
                            let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);

                            if(i<=2)
                            {
                                let newValue = inputDetails.value.trim();
                                showDetails.textContent = newValue; // อัปเดตข้อความใหม่

                                
                                showDetails.style.display = "block"; // แสดงข้อความ
                                inputDetails.style.display = "none"; // ซ่อน textarea
                            }
                            else if(i == 3)
                            {
                                let newValue = inputDetails.textContent.trim();
                                showDetails.textContent = newValue;
                                showDetails.style.display = "block";
                                inputDetails.style.display = "none";
                            }
                            else if(i==4)
                            {
                                // action date
                                var x = inputDetails.value.split('-');
                                //console.log(inputDetails.value);
                                if (!inputDetails || !inputDetails.value) {
                                    showDetails.textContent = "Date not specified.";
                                }
                                else{
                                    showDetails.textContent = x[2]+'/'+x[1]+'/'+x[0];
                                }
                                inputDetails.style.display = "none";
                                showDetails.style = "display: block; width: 100%;";
                            }

                        }
                        
                        isCreate = 0;
                        // ซ่อนปุ่มบันทึก
                        row.querySelector("#edit-btn-"+rowId).style = "display: inline-block; margin: auto;";
                        row.querySelector("#delete-btn-"+rowId).style = "display: inline-block; margin: auto;";
                        row.querySelector("#save-btn-"+rowId).style = "display: none; margin: auto;";
                        row.querySelector("#cancel-btn-"+rowId).style = "display: none; margin: auto;";
                        document.getElementById("create-btn").style = "display: contents;";

                    }

                    // รับค่า dropdown status
                    function selectOption(value,rowId) {
                        document.getElementById("edit-input3-"+rowId).textContent = value;
                        //document.getElementById("e3-"+rowId).textContent = value;
                    }

                    function deleteData(rowId) {
                        let row = document.getElementById(rowId);
                        if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

                        let inputTitle = document.getElementById("edit-input1-"+rowId);
                        let inputDetails = document.getElementById("edit-input2-"+rowId);
                        let inputStatus = document.getElementById("edit-input3-"+rowId);
                        let inputDeadline = document.getElementById("edit-input4-"+rowId);

                        let ids = rowId.split('row-');
                        let task_idValue = ids[1];

                        let scc = <?php echo $_SESSION['user']; ?>;
                        console.log(scc);
                        console.log(task_idValue);
                        let data = {
                                user_id: <?php echo $_SESSION['user']; ?>,
                                action: "delete",
                                task_id: task_idValue
                            }; // ส่ง JSON
                    
                            fetch('todolist_db.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json()) // รับ JSON กลับ
                            .then(data => {
                                console.log(data.message); // แสดงผลลัพธ์
                            })
                            .catch(error => console.error('Error:', error));
                            // location.reload();
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
                        let tbody = document.getElementById("mainbody");
                        let index = tbody.rows.length;
                        let rowId = `row-${index + 1}`; // ใช้ index ที่เพิ่มขึ้นหนึ่งเพื่อให้มี id ที่เหมาะสม

                        let row = tbody.insertRow(index); // แทรกแถวใน <tbody>

                        isCreate = 1;
                        row.id = rowId;
                        row.innerHTML = `
                            <td >
                                <span id="e1-${rowId}" style="display: none;"></span>
                                <textarea id="edit-input1-${rowId}" style="display: block;" oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="Input Title..."></textarea>
                            </td>
                            <td >
                                <span id="e2-${rowId}" style="display: none;"></span>
                                <textarea id="edit-input2-${rowId}" style="display: block;" oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="Write yor Details..."></textarea>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <span id="e3-${rowId}" style="display:block;"></span>
                                <div class="dropdown">
                                    <button class="btn btn-info" type="button" id="edit-input3-${rowId}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; display:none;">
                                        Select Status
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"  onclick="selectOption('Pending','${rowId}')">Pending</a></li>
                                        <li><a class="dropdown-item"  onclick="selectOption('Hold','${rowId}')">Hold</a></li>
                                        <li><a class="dropdown-item"  onclick="selectOption('Complete','${rowId}')">Complete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <p id="e4-${rowId}" style="display: none; ">2</p>
                                <input type="date" id="edit-input4-${rowId}" style="display: block; width: 100%;"></input>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <p id="e5-${rowId}" style="display: none; ">2</p>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <button onclick="editData('${rowId}')" id="edit-btn-${rowId}" class="btn btn-warning" style="display: none;">
                                    <div class="icon text-white-50">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                </button>
                                <button onclick="myDeleteCon('${rowId}')" id="delete-btn-${rowId}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" style="display: none;">
                                    <div class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                </div>
                                </button>
                                </button><button onclick="saveData('${rowId}')" id="save-btn-${rowId}" class="btn btn-success" style="display: inline-block;">
                                    <div class="icon text-white-50">
                                        <i class="fas fa-save" ></i>
                                    </div>
                                </button>
                                <button onclick="cancelEdit('${rowId}')" id="cancel-btn-${rowId}" class="btn btn-warning" style="display: inline-block;">
                                    <div class="icon text-white-50">
                                        <i class="fas fa-times" ></i>
                                    </div>
                                </button>
                            </td>
                        `;
                        document.getElementById("create-btn").style.display = "none";

                        function alertAction()
                        {
                            let alertTap = document.getElementById("alertTap");

                        }
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
                    <div class="alert alert-danger d-none align-items-center w-100 p-3" role="alert" id="alertTap">
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div style="display: inline;">
                            Please enter your title.
                        </div>
                    </div>
                    <!-- Page Heading -->


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
                                            <th style="width: 10%;">Title</th>
                                            <th style="width: 40%;">Details</th>
                                            <th style="width: 10%;">Status</th>
                                            <th style="width: 10%;">Due Date</th>
                                            <th style="width: 10%;">Completion Date</th>
                                            <th style="width: 10%;">Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr id="create-btn">
                                            <td colspan="6" style="height: 20px;" class="text-center">
                                                <button onclick="myCreateFunction()" class="btn btn-primary">
                                                    <i class="fas fa-download fa-sm text-white-50 inline-block"></i> New Task
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody id="mainbody">
                                        <?php while($dataRows = $calltable->fetch_object()){ ?>
                                        <tr id="row-<?php echo $dataRows->task_id; ?>">
                                            <td >
                                                <span id="e1-row-<?php echo "$dataRows->task_id" ?>"><?php echo "$dataRows->title" ?></span>
                                                <textarea id="edit-input1-row-<?php echo "$dataRows->task_id" ?>" style="display: none; " >ตัวอย่างข้อมูล</textarea>
                                            </td>
                                            <td >
                                                <span id="e2-row-<?php echo $dataRows->task_id; ?>"><?php echo "$dataRows->details" ?></span>
                                                <textarea id="edit-input2-row-<?php echo $dataRows->task_id; ?>" style="display: none;">ตัวอย่างข้อมูล</textarea>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <span id="e3-row-<?php echo $dataRows->task_id; ?>"><?php echo "$dataRows->status" ?></span>
                                                <div class="dropdown" >
                                                    <button class="btn btn-info" type="button" id="edit-input3-row-<?php echo $dataRows->task_id; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; display:none;">
                                                        <?php //echo !empty($dataRows->status)? $dataRows->status : "Select Status" ?>
                                                        <?php echo $dataRows->status ?>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"  onclick="selectOption('Pending','row-<?php echo $dataRows->task_id; ?>')" data-value="Pending" >Pending</a></li>
                                                        <li><a class="dropdown-item"  onclick="selectOption('Hold','row-<?php echo $dataRows->task_id; ?>')" data-value="Hold">Hold</a></li>
                                                        <li><a class="dropdown-item"  onclick="selectOption('Complete','row-<?php echo $dataRows->task_id; ?>')" data-value="Complete">Complete</a></li>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td style="text-align: center; vertical-align: middle;">
                                                <p id="e4-row-<?php echo $dataRows->task_id; ?>" style="display: block; "><?php echo !empty($dataRows->deadline) ? date_format(date_create("$dataRows->deadline"),"d/m/Y") : "Date not specified."; ?></p>
                                                <input type="date" id="edit-input4-row-<?php echo $dataRows->task_id; ?>" style="display: none;"></input>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <p id="e5-row-<?php echo $dataRows->task_id; ?>" style="display: block; "><?php echo !empty($dataRows->submitDate) ? date("d/m/Y", strtotime($dataRows->submitDate)) : "Incomplete."; ?></p>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">

                                                <button onclick="editData('row-<?php echo $dataRows->task_id; ?>', <?php echo $dataRows->task_id; ?>)" id="edit-btn-row-<?php echo $dataRows->task_id; ?>" class="btn btn-warning" style="display: inline-flex; margin: 2px;">
                                                    <div class="icon text-white-50">
                                                        <i class="fas fa-tools"></i>
                                                    </div>
                                                </button>
                                                <button onclick="myDeleteCon('row-<?php echo $dataRows->task_id; ?>')" id="delete-btn-row-<?php echo $dataRows->task_id; ?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" style="display: inline-flex; margin: 2px;">
                                                    <div class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </div>
                                                </button>
                                                <button onclick="saveData('row-<?php echo $dataRows->task_id; ?>', <?php echo $dataRows->task_id; ?>)" id="save-btn-row-<?php echo $dataRows->task_id; ?>" class="btn btn-success" style="display: none; margin: auto;">
                                                    <div class="icon text-white-50">
                                                        <i class="fas fa-save" ></i>
                                                    </div>
                                                </button>
                                                <button onclick="cancelEdit('row-<?php echo $dataRows->task_id; ?>')" id="cancel-btn-row-<?php echo $dataRows->task_id; ?>" class="btn btn-warning" style="display: none; margin: auto;">
                                                    <div class="icon text-white-50">
                                                        <i class="fas fa-times" ></i>
                                                    </div>
                                                </button>

                                            </td>
                                        </tr>
                                        <?php } ?>
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
                    <button onclick="deleteData(indexRowid)" class="btn btn-danger" type="button" data-dismiss="modal">Delete</button>
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