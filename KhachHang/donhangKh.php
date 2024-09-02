<?php 
include "connect.php";
    $idKh = $_POST['idKh'];
    $diaChi = $_POST['diaChi'];
    $soDienThoai = $_POST['soDienThoai'];
    $soLuong = $_POST['soLuong'];
    $tongTien = $_POST['tongTien'];
    $chiTiet = $_POST['chiTiet'];

    $query = 'INSERT INTO `donhang`(`idKh`, `diaChi`, `soDienThoai`, `soLuong`, `tongTien`) VALUES ('.$idKh.',"'.$diaChi.'","'.$soDienThoai.'",'.$soLuong.',"'.$tongTien.'")';
    $data = mysqli_query($scon, $query);
    if($data == true)  {
        $query = 'SELECT idDonHang FROM `donhang` WHERE `idKh` = '.$idKh.' ORDER BY idDonHang DESC LIMIT 1';
        $data = mysqli_query($scon, $query);

        while ($row = mysqli_fetch_assoc($data)){
        $idDonHang = ($row);} 
        
        if (!empty($idDonHang)) {
            // có đơn hàng trả về 
            $chiTiet = json_decode($chiTiet, true);
            // duyệt mảng
            foreach($chiTiet as $key => $value) {
                $caulenh = 'INSERT INTO `chitietdonhang`(`idDonHang`, `id_sp`, `so_luong`, `gia_sp`) VALUES ('.$idDonHang["idDonHang"].','.$value["id_sp"].','.$value["so_luong"
                ].',"'.$value["gia_sp"].'")';

                $data = mysqli_query($scon, $caulenh);

            // Xử lý số lượng trong kho
            $truyvansoluongkho = 'SELECT `soLuong` FROM `sanphammoi1` WHERE `id_sp` = '.$value["id_sp"];
            $data1 = mysqli_query($scon, $truyvansoluongkho);
            $sltrenkho = mysqli_fetch_assoc($data1);

            $truyvansoluongtonkho = 'UPDATE `sanphammoi1` SET `soLuong` ='.((int)$sltrenkho["soLuong"] - (int)$value["so_luong"]).' WHERE `id_sp` ='.$value["id_sp"];
            
            $datasLuong2 = mysqli_query($scon, $truyvansoluongtonkho);
        }
        
        if ($data == true) {
            $arr = [
                'success' => true,
                'message' => "thanh cong",
                'idDonHang' => $idDonHang["idDonHang"]
            ];
        } else {
            $arr = [
                'success' => false,
                'message' => "khong thanh cong"
            ];
        
        }
        print_r(json_encode($arr));
    }
        
    } else {
        $arr = [
            'success' => false,
            'message' => "khong thanh cong",
        ];

    }

?>