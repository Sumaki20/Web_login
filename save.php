<?php
require("connect.php");
header('Content-Type: application/json'); // กำหนดให้ส่งออกเป็น JSON

// รับ JSON จาก request
$data = json_decode(file_get_contents("php://input"), true);

// ตรวจสอบว่ามีข้อมูลที่ส่งมาหรือไม่
if (isset($data['title'])) {
    $name = $con->real_escape_string($data['title']);

    // บันทึกลงฐานข้อมูล
    $sql = "INSERT INTO user_task (title) VALUES ('$name')";
    
    if ($con->query($sql) === TRUE) {  // ✅ ใช้ $con
        echo json_encode(["message" => "บันทึกข้อมูลสำเร็จ: " . $name]);
    } else {
        echo json_encode(["message" => "เกิดข้อผิดพลาด: " . $con->error]);
    }
} else {
    echo json_encode(["message" => "ข้อมูลไม่ครบถ้วน"]);
}

$con->close();
?>
