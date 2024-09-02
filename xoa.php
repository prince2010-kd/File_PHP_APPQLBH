<?php 
include "connect.php";
    $id = $_POST['id_sp'];


// check data
    $query = 'DELETE FROM `sanphammoi1` WHERE `id_sp` = '.$id;
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