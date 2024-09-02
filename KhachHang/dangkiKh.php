<?php 
include "connect.php";
    $mail = $_POST['mail'];
    $pass = $_POST['password'];
    $username = $_POST['username'];
    $dienthoai = $_POST['dienthoai'];
    $uid = $_POST['uid'];

// check data
    $query = 'SELECT * FROM `userkh` WHERE `mail` = "'.$mail.'"';
    $data = mysqli_query($scon, $query);
    $numrow = mysqli_num_rows($data);

    if($numrow > 0) {
        $arr = [
            'success' => false,
            'message' => "mail da co"
        ];
    }
    else {
    // insert
        $query = 'INSERT INTO `userkh`( `mail`, `password`, `username`, `dienthoai`, `uid`) VALUES ("'.$mail.'","'.$pass.'","'.$username.'","'.$dienthoai.'", "'.$uid.'")';
        $data = mysqli_query($scon, $query);

        if($data == true) {
            $arr = [
                'success' => true,
                'message' => "thanh cong"
        ];
        } else {
            $arr = [
                'success' => false,
                'message' => "khong thanh cong"
        ];
    }
    }
print_r(json_encode($arr));
?>