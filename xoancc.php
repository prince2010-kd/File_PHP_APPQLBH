<?php 
include "connect.php";
    // $ma = $_POST['maNcc'];

    if (isset($_POST['maNcc'])) {
        $ma = $_POST['maNcc'];
        $query = 'DELETE FROM `nhacungcap` WHERE `maNcc` = "'.$ma.'"';
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
    } else {
        echo 'Không tìm thấy khóa ';
    }
// check data
    

?>