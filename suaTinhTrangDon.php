<?php 
include "connect.php";
    $idDonHang = $_POST['idDonHang'];
    $trangThai = $_POST['trangThai'];


// check data
    $query = 'UPDATE `donhang` SET `trangThai`='.$trangThai.' WHERE `idDonHang` = ' .$idDonHang;
    $data = mysqli_query($scon, $query);    
        if($data == true) {
            $arr = [
                'success' => true,
                'message' => "thanh cong"
            ];
        } 
        else {
            $arr = [
                'success' => false,
                'message' => "khong thanh cong"
            ];
        }
print_r(json_encode($arr));
?>