<?php 
include "connect.php";
    $idUser = $_POST['idUser'];
    $diaChi = $_POST['diaChi'];
    $soDienThoai = $_POST['soDienThoai'];
    $soLuong = $_POST['soLuong'];
    $tongTien = $_POST['tongTien'];
    $chiTiet = $_POST['chiTiet'];

    $query = 'INSERT INTO `donhang`(`idUser`, `diaChi`, `soDienThoai`, `soLuong`, `tongTien`) VALUES ('.$idUser.',"'.$diaChi.'","'.$soDienThoai.'",'.$soLuong.',"'.$tongTien.'")';
    $data = mysqli_query($scon, $query);
    if($data == true)  {
        $query = 'SELECT idDonHang FROM `donhang` WHERE `idUser` = '.$idUser.' ORDER BY idDonHang DESC LIMIT 1';
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