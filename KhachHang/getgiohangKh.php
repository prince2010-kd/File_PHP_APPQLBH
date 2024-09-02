<?php 
include "connect.php";
if (!isset($_GET['idKh'])) {
    die(json_encode(['error' => 'Missing idKh parameter']));
}
$idKh = $_GET['idKh']; // Lấy ID khách hàng từ tham số GET

$sql = "SELECT * FROM gio_hang WHERE `idKh` = ?";
$stmt = $scon->prepare($sql);
if (!$stmt) {
    die(json_encode(['error' => 'Query preparation failed']));
}
$stmt->bind_param("i", $idKh);
$stmt->execute();
$result = $stmt->get_result();

$gioHang = [];
while ($row = $result->fetch_assoc()) {
    $gioHang[] = $row; // Lưu mỗi sản phẩm vào mảng
}

$stmt->close();
header('Content-Type: application/json');
echo json_encode($gioHang);
$scon->close();
?>