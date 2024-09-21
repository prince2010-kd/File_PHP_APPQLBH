<?php 
include "connect.php";

// Ngày hiện tại
$endDate = date('Y-m-d');
// Ngày bắt đầu là 7 ngày trước
$startDate = date('Y-m-d', strtotime('-6 days', strtotime($endDate)));

// Truy vấn doanh thu theo ngày
$query = "SELECT DATE(`ngayDatHang`) AS ngay, SUM(tongTien) AS doanhThu 
          FROM `donhang` 
          WHERE `trangThai` = 3 AND DATE(`ngayDatHang`) BETWEEN '$startDate' AND '$endDate'
          GROUP BY DATE(`ngayDatHang`) 
          ORDER BY DATE(`ngayDatHang`)";

$data = mysqli_query($scon, $query);
$result = array();

// Khởi tạo doanh thu cho các ngày không có dữ liệu
$dates = [];
for ($i = 0; $i < 7; $i++) {
    $dates[] = date('Y-m-d', strtotime("-$i days", strtotime($endDate)));
}

foreach ($dates as $date) {
    $row = mysqli_fetch_assoc($data);
    if ($row && $row['ngay'] === $date) {
        $result[] = [
            'ngay' => (int)date('d', strtotime($row['ngay'])),
            'doanhThu' => $row['doanhThu']
        ];
    } else {
        $result[] = [
            'ngay' => (int)date('d', strtotime($date)),
            'doanhThu' => 0 // Không có doanh thu cho ngày này
        ];
    }
}

$arr = [
    'success' => true,
    'message' => "Thành công",
    'result' => $result
];

print_r(json_encode($arr));
?>