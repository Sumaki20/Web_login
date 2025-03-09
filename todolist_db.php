<?php
require("connect.php");
date_default_timezone_set("Asia/Bangkok");
header('Content-Type: application/json'); // กำหนดให้ส่งออกเป็น JSON

// เชื่อมต่อฐานข้อมูล

// รับ JSON จาก request
$data = json_decode(file_get_contents("php://input"), true);
$action = $data['action'];
$userID = $data['user_id'];

if($action == "delete"){
    // ตรวจสอบว่ามีข้อมูลที่ส่งมาหรือไม่
    if (isset($data['user_id'])) {
        $task_idValue = $con->real_escape_string($data['task_id']);
        // บันทึกลงฐานข้อมูล
        $sql = "DELETE FROM user_task WHERE user_id = '$userID' AND task_id = '$task_idValue'";
        
        if ($con->query($sql) === TRUE) {
            echo json_encode(["message" => "บันทึกข้อมูลสำเร็จ".$userID." ".$task_idValue]);
        } else {
            echo json_encode(["message" => "เกิดข้อผิดพลาด: " . $sql]);
        }
    } else {
        echo json_encode(["message" => "ข้อมูลไม่ครบถ้วน"]);
    }
}
if($action == "insert"){
    if (isset($data['user_id'])) {
        $titleValue = $con->real_escape_string($data['title']);
        $detailsValue = $con->real_escape_string($data['details']);
        $statusValue = $con->real_escape_string($data['status']);
        $deadlineValue = !empty($data['deadline']) ? "'" . date('Y-m-d', strtotime($data['deadline'])) . "'" : "NULL";
        $submitDateValue = !empty($data['submitDate']) ? "'" . date('Y-m-d', strtotime($data['submitDate'])) . "'" : "NULL";
        // บันทึกลงฐานข้อมูล
        $sql = "INSERT INTO user_task (user_id,title,details,status,deadline,submitDate) VALUES ('$userID','$titleValue','$detailsValue','$statusValue',$deadlineValue,$submitDateValue)";
        
        if ($con->query($sql) === TRUE) {
            echo json_encode(["message" => "บันทึกข้อมูลสำเร็จ".$deadlineValue." ".$submitDateValue]);
        } else {
            echo json_encode(["message" => "เกิดข้อผิดพลาด: " . $con->error]);
        }
    } else {
        echo json_encode(["message" => "ข้อมูลไม่ครบถ้วน"]);
    }
}
if($action == "update"){
    // ตรวจสอบว่ามีข้อมูลที่ส่งมาหรือไม่
    if (isset($data['user_id'])) {
        $task_idValue = $con->real_escape_string($data['task_id']);
        $titleValue = $con->real_escape_string($data['title']);
        $detailsValue = $con->real_escape_string($data['details']);
        $statusValue = $con->real_escape_string($data['status']);
        $deadlineValue = !empty($data['deadline']) ? "'" . date('Y-m-d', strtotime($data['deadline'])) . "'" : "NULL";
        $submitDateValue = $data['submitDate'] == 1 ? "'" . date('Y-m-d H:i:s') . "'" : "NULL";
        // $submitDateValue = !empty($data['submitDate']) ? "'" . date('Y-m-d', strtotime($data['submitDate'])) . "'" : "NULL";
        // บันทึกลงฐานข้อมูล

        $sql = "UPDATE user_task 
                SET title = '$titleValue', details = '$detailsValue',status = '$statusValue',deadline = $deadlineValue,submitDate = $submitDateValue
                WHERE user_id = '$userID' AND task_id = '$task_idValue'";
        
        if ($con->query($sql) === TRUE) {
            echo json_encode(["message" => "บันทึกข้อมูลสำเร็จ".$task_idValue." ".$submitDateValue]);
        } else {
            echo json_encode(["message" => "เกิดข้อผิดพลาด: " . $sql]);
        }
    } else {
        echo json_encode(["message" => "ข้อมูลไม่ครบถ้วน"]);
    }
}
$con->close();