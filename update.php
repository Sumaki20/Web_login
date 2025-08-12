<?php
// ตรวจสอบว่าเรามีข้อมูลที่ส่งมาจาก JavaScript
// if (isset($_POST['aaa'])) {
//     $info = $_POST['info']; // รับค่าจาก JavaScript (จาก input)
//     // ทำการจัดการข้อมูลตามที่ต้องการ เช่น การอัปเดตข้อมูลในฐานข้อมูล
//     echo "ข้อมูลที่ส่งมาคือ: " . htmlspecialchars($info); // แสดงข้อมูลที่ส่งมา
// } else {
//     echo "ไม่พบข้อมูลที่ส่งมา";
// }
?>

<?php
// รับข้อมูล JSON
$data = json_decode(file_get_contents("php://input"), true);

// ตรวจสอบว่ามีค่า message ที่ส่งมาหรือไม่
if (isset($data['valueShow'])) {
    $message = $data['valueShow'];

    // ตัวอย่าง: ส่งค่ากลับในรูปแบบ JSON
    $response = ['response' => "ค่าที่ได้รับคือ: " . $message];

    // ตั้งค่า header เพื่อบอกว่าเรากำลังส่ง JSON กลับไป
    // header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // ถ้าไม่มีค่า message ให้ส่งข้อความ error กลับไป
    // $response = ['response' => "ไม่ได้รับข้อมูล"];
    // header('Content-Type: application/json');
    echo json_encode($response);
}
?>