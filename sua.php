<?php 
include "connect.php";
    $id = $_POST['id_sp'];
    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $soLuong = $_POST['soLuong'];
    $hinhanh = $_POST['hinhanh'];
    $mota = $_POST['mota'];
    $loai = $_POST['loai'];
    $maNcc = $_POST['maNcc'];

// check data
    $query = 'UPDATE `sanphammoi1` SET `tensp`="'.$tensp.'",`giasp`="'.$giasp.'",`soLuong` = '.$soLuong.',`maNcc` = "'.$maNcc.'",`hinhanh`="'.$hinhanh.'",`mota`="'.$mota.'",`loai`='.$loai.' WHERE `id_sp` ='.$id;
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