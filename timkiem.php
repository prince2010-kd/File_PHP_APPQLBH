<?php 
include "connect.php";
    $timkiem = $_POST['timkiem'];

    if(empty($timkiem)) {
        $arr = [
            'success' => false,
            'message' => "khong thanh cong",
            'result' => $result
        ];
    } else {
        $query = "SELECT * FROM `sanphammoi1` WHERE `tensp` LIKE '%".$timkiem."%' Or `giasp` LIKE '%".$timkiem."%' ";
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
        else{
                $arr = [
                    'success' => false,
                    'message' => "Nhập đúng sản phẩm cần tìm",
                    'result' => $result
                ];
            }
    }
print_r(json_encode($arr));
?>