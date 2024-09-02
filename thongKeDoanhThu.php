<?php 
include "connect.php";
    $query = "SELECT *, SUM(tongTien) AS doanhThu, MONTH(`ngayDatHang`) AS thang FROM `donhang` GROUP BY YEAR(`ngayDatHang`), MONTH(`ngayDatHang`)";
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
    } 
    else {
        $arr = [
            'success' => false,
            'message' => "khong thanh cong",
            'result' => $result
        ];
        }
print_r(json_encode($arr));
?>