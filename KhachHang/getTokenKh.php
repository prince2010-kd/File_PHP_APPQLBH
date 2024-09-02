<?php 
include "connect.php";
    $trangThai = $_POST['trangThai'];

    $query = "SELECT * FROM `user1` WHERE `trangThai` = ".$trangThai;
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
