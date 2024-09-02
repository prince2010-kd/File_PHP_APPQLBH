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
$required_fields = ['idKh', 'id_sp', 'so_luong', 'gia_sp', 'hinh_anh', 'ten_sp'];
foreach ($required_fields as $field) {
    if (!isset($data[$field])) {
        echo json_encode(["success" => false, "message" => "Missing parameter: $field"]);
        exit;
    }
}
$idKh = $data['idKh'];
$id_sp = $data['id_sp'];
$so_luong = $data['so_luong'];
$gia_sp = $data['gia_sp'];
$hinh_anh = $data['hinh_anh'];
$ten_sp = $data['ten_sp'];
// Thêm sản phẩm vào giỏ hàng
$query = "INSERT INTO `gio_hang` (`idKh`, `id_sp`, `so_luong`, `gia_sp`, `hinh_anh`, `ten_sp`) VALUES ('$idKh', '$id_sp', '$so_luong', '$gia_sp', '$hinh_anh', '$ten_sp')";
$data = mysqli_query($scon, $query);

if ($data) {
    $arr = [
        'success' => true,
        'message' => "Thành công"
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "Không thành công: " . mysqli_error($scon)
    ];
}

echo json_encode($arr);

?>