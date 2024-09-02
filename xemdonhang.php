<?php 
include "connect.php";
    $idKh = $_POST['idKh'];
    $trangThai = isset($_POST['trangThai']) ? $_POST['trangThai'] : 0;

    if($idKh == 0) {
        $query = 'SELECT donhang.idDonHang, donhang.diaChi, donhang.soDienThoai, donhang.soLuong, donhang.tongTien, donhang.trangThai, donhang.thanhToan, donhang.ngayDatHang, userkh.username FROM `donhang` INNER JOIN userkh on donhang.idKh = userkh.idKh WHERE donhang.trangThai = '.$trangThai.'  ORDER BY donhang.idDonHang DESC; ';
    } else {
        $query = 'SELECT * FROM `donhang` WHERE `idKh` = '.$idKh.' ORDER BY `idDonHang` DESC';
    }

    // $query = 'SELECT * FROM `donhang` WHERE `idKh` = '.$idKh.' ORDER BY `idDonHang` DESC';
    $data = mysqli_query($scon, $query);
    $result = array();
    

    while ($row = mysqli_fetch_assoc($data)){
        $caulenh = 'SELECT * FROM `chitietdonhang` INNER JOIN sanphammoi1 ON chitietdonhang.id_sp = sanphammoi1.id_sp WHERE chitietdonhang.idDonHang = '.$row['idDonHang'];
        $dulieu = mysqli_query($scon, $caulenh);
        $mang = array();
        while ($row1 = mysqli_fetch_assoc($dulieu)){
            $mang[] = $row1;
        }
        $row['mang'] = $mang;
        $result[] = ($row);

    }
    if(!empty ($result)) {
            $arr = [
                'success' => true,
                'message' => "thanh cong",
                'result' => $result
            ];
    } 
    else{
            $arr = [
                'success' => false,
                'message' => "khong thanh cong",
                'result' => $result
            ];
        }
print_r(json_encode($arr));
?>