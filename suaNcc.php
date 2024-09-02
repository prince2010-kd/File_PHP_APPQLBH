<?php 
include "connect.php";
    $maNcc = $_POST['maNcc'];
    $tenNcc = $_POST['tenNcc'];
    $diaChi = $_POST['diaChi'];
    $fax = $_POST['fax'];
    $hinhAnh = $_POST['hinhAnh'];
    $moTa = $_POST['moTa'];

// check data
    $query = 'UPDATE `nhacungcap` SET `tenNcc`="'.$tenNcc.'",`diaChi`="'.$diaChi.'",`fax`="'.$fax.'",`hinhAnh`= "'.$hinhAnh.'", `moTa` = "'.$moTa.'" WHERE `maNcc` = "'.$maNcc.'"';
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