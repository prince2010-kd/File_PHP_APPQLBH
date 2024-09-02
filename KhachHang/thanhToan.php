<?php 
include "connect.php";
    $idDonHang = $_POST['idDonHang'];
    $token = $_POST['token'];


// check data
    $query = 'UPDATE `donhang` SET `thanhToan`= "'.$token.'" WHERE `idDonHang` ='.$idDonHang;
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