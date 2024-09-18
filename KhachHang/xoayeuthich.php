<?php
include "connect.php";

// Nhận dữ liệu từ POST
$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra nếu dữ liệu là null
if (is_null($data)) {
    echo json_encode(["success" => false, "message" => "Invalid JSON"]);
    exit;
}

// Kiểm tra các tham số cần thiết
$required_fields = ['idKh', 'id_sp'];
foreach ($required_fields as $field) {
    if (!isset($data[$field])) {
        echo json_encode(["success" => false, "message" => "Missing parameter: $field"]);
        exit;
    }
}

$idKh = $data['idKh'];
$id_sp = $data['id_sp'];

// Xóa sản phẩm khỏi giỏ hàng
$query = "DELETE FROM `sanphamyeuthich` WHERE `idKh` = '$idKh' AND `id_sp` = '$id_sp'";
$result = mysqli_query($scon, $query);

if ($result) {
    $arr = [
        'success' => true,
        'message' => "Xóa sản phẩm thành công"
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "Không thành công: " . mysqli_error($scon)
    ];
}

echo json_encode($arr);
?>