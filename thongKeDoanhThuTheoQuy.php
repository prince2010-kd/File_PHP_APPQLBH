<?php 
include "connect.php";
$query = "SELECT *, SUM(tongTien) AS doanhThu, QUARTER(`ngayDatHang`) AS quy, YEAR(`ngayDatHang`) AS nam 
          FROM `donhang` 
          GROUP BY YEAR(`ngayDatHang`), QUARTER(`ngayDatHang`)";
$data = mysqli_query($scon, $query);
$result = array();

while ($row = mysqli_fetch_assoc($data)){
    $result[] = ($row);
}
if(!empty ($result)) {
    $arr = [
        'success' => true,
        'message' => "thanh cong",
        'result' => $result
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "khong thanh cong",
        'result' => $result
    ];
}
print_r(json_encode($arr));
?>