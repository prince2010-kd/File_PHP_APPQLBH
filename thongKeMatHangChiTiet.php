<?php
include "connect.php";

// Kiểm tra và thiết lập biến trang
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1; // Thiết lập trang
$total = 5; // Lấy 5 sản phẩm trên 1 trang
$pos = ($page - 1) * $total; // Vị trí bắt đầu

// Truy vấn lấy 5 sản phẩm có số lượng nhiều nhất
$query = 'SELECT * FROM `sanphammoi1` ORDER BY `soLuong` DESC LIMIT ' . $pos . ',' . $total;

$data = mysqli_query($scon, $query);
$result = array();

while ($row = mysqli_fetch_assoc($data)) {
    $result[] = $row; // Thêm sản phẩm vào mảng kết quả
}

if (!empty($result)) {
    $arr = [
        'success' => true,
        'message' => "Thành công",
        'result' => $result
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "Không có sản phẩm",
        'result' => []
    ];
}

header('Content-Type: application/json'); // Đặt header JSON
echo json_encode($arr);
?>