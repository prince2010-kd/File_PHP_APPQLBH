<?php 
include "connect.php";
$mail = $_POST['mail'];
$pass = $_POST['password'];


$query = 'SELECT * FROM `user1` WHERE `mail`= "'.$mail.'"';
$data = mysqli_query($scon, $query);
// result tập kết quả trả về dưới dạng mảng
$result = array();
// Trả về 1 dòng kết quả
while ($row = mysqli_fetch_assoc($data)){
        $result[] = ($row);
}
if(!empty ($result)) {
    $arr = [
        'success' => true,
        'message' => "thanh cong",
        'result' => $result
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "sai ten dang nhap hoac mat khau",
        'result' => $result
    ];
}

print_r(json_encode($arr));
?>