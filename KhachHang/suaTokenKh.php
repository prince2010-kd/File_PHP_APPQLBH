<?php 
include "connect.php";
    $id = $_POST['idKh'];
    $token = $_POST['token'];


// check data
    $query = 'UPDATE `userkh` SET `token`="'.$token.'" WHERE `idKh`='.$id;
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