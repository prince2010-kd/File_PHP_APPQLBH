<?php 
include "connect.php";
header("Content-Type: application/json");

// Lấy mã nhà cung cấp từ yêu cầu POST
$ma_ncc = isset($_POST['maNcc']) ? $_POST['maNcc'] : '';

// Kiểm tra xem mã nhà cung cấp có tồn tại không
if ($ma_ncc) {
    $query = "SELECT * FROM nhacungcap WHERE maNcc = ?";
    $stmt = $scon->prepare($query);
    $stmt->bind_param("s", $ma_ncc);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Nếu tìm thấy mã nhà cung cấp
        echo json_encode(["success" => true]);
    } else {
        // Nếu không tìm thấy
        echo json_encode(["success" => false]);
    }
} else {
    // Nếu không có mã nhà cung cấp
    echo json_encode(["success" => false]);
}

$stmt->close();
$scon->close();
?>