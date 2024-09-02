<?php 
include "connect.php";
    $id = $_POST['idDonHang'];


// check data
    $query = 'DELETE FROM `donhang` WHERE `idDonHang` = '.$id;
    $data = mysqli_query($scon, $query);    

    $cautruyvan = 'DELETE FROM `chitietdonhang` WHERE `idDonHang` = '.$id;
    $data = mysqli_query($scon, $cautruyvan);    

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