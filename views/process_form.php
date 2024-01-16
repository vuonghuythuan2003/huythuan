<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nckh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$hoTen = isset($_POST["hoTen"]) ? $_POST["hoTen"] : "";
$soDienThoai = isset($_POST["soDienThoai"]) ? $_POST["soDienThoai"] : "";
$cauHoi = isset($_POST["cauHoi"]) ? $_POST["cauHoi"] : "";
$selectedEmail = isset($_POST["selectedEmail"]) ? $_POST["selectedEmail"] : "";
$nguoiGuiEmail = isset($_POST["nguoiGuiEmail"]) ? $_POST["nguoiGuiEmail"] : "";

// Kiểm tra xem nguoiGuiEmail có kí tự trước @ hay không
if (!filter_var($nguoiGuiEmail, FILTER_VALIDATE_EMAIL) || strpos($nguoiGuiEmail, '@') === false) {
    $response = array("success" => false, "message" => "Lỗi: Địa chỉ email không hợp lệ (phải có kí tự trước @).");
    echo json_encode($response);
    exit();
}

// Kiểm tra kết hợp điều kiện số điện thoại
if (!preg_match("/^[0-9]{10}$/", $soDienThoai)) {
    $response = array("success" => false, "message" => "Lỗi: Số điện thoại không hợp lệ (phải có 10 chữ số).");
    echo json_encode($response);
    exit();
}

// Chèn dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO lien_he (ho_ten, so_dien_thoai, cau_hoi, email_nguoi_nhan, email_nguoi_gui, thoi_gian_gui) VALUES ('$hoTen', '$soDienThoai', '$cauHoi', '$selectedEmail', '$nguoiGuiEmail', CURRENT_TIMESTAMP)";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => true, "message" => "Thông tin của bạn đã được gửi và lưu vào cơ sở dữ liệu thành công!");
    echo json_encode($response);
} else {
    $response = array("success" => false, "message" => "Lỗi khi thêm vào cơ sở dữ liệu: " . $conn->error);
    echo json_encode($response);
}

// Đóng kết nối
$conn->close();
?>
