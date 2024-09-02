    <?php
    include "connect.php";
// $page = isset($_POST['page']) ? $_POST['page'] : 1;
// $total = 5; // lấy 5 sản phẩm trên mỗi trang
// $pos = ($page - 1) * $total;
// $loai = isset($_POST['loai']) ? $_POST['loai'] : 1;
// $page = $_POST['page'];
// $total = 5;// Lấy 5 sp trên 1 trang
// $pos = ($page -1 ) * $total;
// $loai = $_POST['loai'];

//     $query = 'SELECT * FROM `sanphammoi1` WHERE `loai` = '.$loai.' LIMIT '.$page.','.$total.'
//     ';
//     $data = mysqli_query($scon, $query);
//     $result = array();
//     while ($row = mysqli_fetch_assoc($data)){
//         $result[] = ($row);
//         // code
//     }
//     if(!empty($result)) {
//             $arr = [
//                 'success' => true,
//                 'message' => "thanh cong",
//                 'result' => $result
//             ];
//     }else{
//             $arr = [
//                 'success' => false,
//                 'message' => "khong thanh cong",
//                 'result' => $result
//             ];
//         }
// print_r(json_encode($arr));
// Kiểm tra và thiết lập các biến
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1; // Thiết lập trang
$total = 6; // Lấy 5 sản phẩm trên 1 trang
$pos = ($page - 1) * $total; // Vị trí bắt đầu
// $loai = isset($_POST['loai']) ? (int)$_POST['loai'] : 1; // Thiết lập loại sản phẩm
$loai = $_POST['loai'];
// Sửa câu truy vấn LIMIT
$query = 'SELECT DISTINCT * FROM `sanphammoi1` WHERE `loai` = ' . $loai . ' LIMIT ' . $pos . ',' . $total;
$data = mysqli_query($scon, $query);
$result = array();

while ($row = mysqli_fetch_assoc($data)) {
    $result[] = $row; // Thêm sản phẩm vào mảng kết quả
}

if (!empty($result)) {
    $arr = [
        'success' => true,
        'message' => "Thành công",
        'result' => $result
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "Không có sản phẩm",
        'result' => []
    ];
}

print_r(json_encode($arr));
?>