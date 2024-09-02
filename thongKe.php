<?php 
include "connect.php";
    $query = "SELECT sp.id_sp, sp.tensp, COUNT(`so_luong`) AS tong_so_luong FROM `chitietdonhang` INNER JOIN sanphammoi1 AS sp ON sp.id_sp = chitietdonhang.id_sp GROUP BY `id_sp`";
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