<?php 
include "connect.php";
    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $soLuong = $_POST['soLuong'];
    $maNcc = $_POST['maNcc'];
    $hinhanh = $_POST['hinhanh'];
    $mota = $_POST['mota'];
    $loai = $_POST['loai'];

// check data
    $query = 'INSERT INTO `sanphammoi1`(`tensp`, `giasp`,`soLuong`,`maNcc`, `hinhanh`, `mota`, `loai`) VALUES ("'.$tensp.'","'.$giasp.'","'.$soLuong.'","'.$maNcc.'","'.$hinhanh.'","'.$mota.'",'.$loai.')';
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