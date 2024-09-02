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
$required_fields = ['idKh', 'id_sp', 'so_luong'];
foreach ($required_fields as $field) {
    if (!isset($data[$field])) {
        echo json_encode(["success" => false, "message" => "Missing parameter: $field"]);
        exit;
    }
}

$idKh = $data['idKh'];
$id_sp = $data['id_sp'];
$so_luong = $data['so_luong'];

// Cập nhật số lượng sản phẩm trong giỏ hàng
$query = "UPDATE `gio_hang` SET `so_luong` = ? WHERE `idKh` = ? AND `id_sp` = ?";
$stmt = $scon->prepare($query);
$stmt->bind_param("iii", $so_luong, $idKh, $id_sp);

if ($stmt->execute()) {
    $arr = [
        'success' => true,
        'message' => "Cập nhật thành công"
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "Cập nhật không thành công: " . $stmt->error
    ];
}

$stmt->close();
echo json_encode($arr);
$scon->close();
?>