<?php
$successMessage = "";
$errorMessages = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = isset($_POST["hoTen"]) ? $_POST["hoTen"] : "";
    $soDienThoai = isset($_POST["soDienThoai"]) ? $_POST["soDienThoai"] : "";
    $cauHoi = isset($_POST["cauHoi"]) ? $_POST["cauHoi"] : "";
    $selectedEmail = isset($_POST["selectedEmail"]) ? $_POST["selectedEmail"] : "";
    $nguoiGuiEmail = isset($_POST["nguoiGuiEmail"]) ? $_POST["nguoiGuiEmail"] : "";

    // Kiểm tra xem nguoiGuiEmail có kí tự trước @ hay không
    if (!filter_var($nguoiGuiEmail, FILTER_VALIDATE_EMAIL) || strpos($nguoiGuiEmail, '@') === false) {
        $errorMessages[] = "Lỗi: Địa chỉ email không hợp lệ (phải có kí tự trước @).";
    }

    // Kiểm tra kết hợp điều kiện số điện thoại
    if (!preg_match("/^[0-9]{10}$/", $soDienThoai)) {
        $errorMessages[] = "Lỗi: Số điện thoại không hợp lệ (phải có 10 chữ số).";
    }

    // Nếu không có lỗi, thêm vào cơ sở dữ liệu
    if (empty($errorMessages)) {
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

        // Chèn dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO lien_he (ho_ten, so_dien_thoai, cau_hoi, email_nguoi_nhan, email_nguoi_gui, thoi_gian_gui) VALUES ('$hoTen', '$soDienThoai', '$cauHoi', '$selectedEmail', '$nguoiGuiEmail', CURRENT_TIMESTAMP)";

        if ($conn->query($sql) === TRUE) {
            $successMessage = "Thông tin của bạn đã được gửi và lưu vào cơ sở dữ liệu thành công!";
        } else {
            $errorMessages[] = "Lỗi khi thêm vào cơ sở dữ liệu: " . $conn->error;
        }

        // Gửi dữ liệu đến formsubmit.co bằng fetch API
        $formsubmitURL = 'https://formsubmit.co/your-form-id';
        $formData = array(
            'hoTen' => $hoTen,
            'soDienThoai' => $soDienThoai,
            'cauHoi' => $cauHoi,
            'selectedEmail' => $selectedEmail,
            'nguoiGuiEmail' => $nguoiGuiEmail
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($formData),
            ),
        );

        $context = stream_context_create($options);
        $result = file_get_contents($formsubmitURL, false, $context);

        if ($result === FALSE) {
            $errorMessages[] = "Lỗi khi gửi dữ liệu đến formsubmit.co.";
        } else {
            $resultData = json_decode($result, true);

            if ($resultData['success']) {
                $successMessage .= " Thông tin của bạn đã được gửi thành công qua formsubmit.co!";
            } else {
                $errorMessages[] = "Lỗi từ formsubmit.co: " . $resultData['message'];
            }
        }

        // Đóng kết nối
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Liên Hệ</title>
</head>
<body>
    <form id="myForm">
        <label for="hoTen">Họ và Tên:</label>
        <input type="text" id="hoTen" name="hoTen" required>

        <label for="soDienThoai">Số Điện Thoại:</label>
        <input type="tel" id="soDienThoai" name="soDienThoai" pattern="[0-9]{10}" required>
        <small>Vui lòng nhập số điện thoại hợp lệ (10 chữ số).</small>

        <label for="nguoiGuiEmail">Nhập Email Của Bạn:</label>
        <input type="email" id="nguoiGuiEmail" name="nguoiGuiEmail" required>
        <small>Vui lòng nhập địa chỉ email hợp lệ (phải có kí tự trước @).</small>

        <label for="cauHoi">Câu Hỏi Tư Vấn:</label>
        <textarea id="cauHoi" name="cauHoi" rows="4" required></textarea>

        <label for="selectedEmail">Chọn Email:</label>
        <select style="width: 300px;height: 50px;" id="selectedEmail" name="selectedEmail" required>
            <option value="tamlytrilieunhc@gmail.com">tamlytrilieunhc@gmail.com</option>
            <option value="bvtttw1@yahoo.com.vn">bvtttw1@yahoo.com.vn</option>
            <option value="info@hongngochospital.vn">info@hongngochospital.vn</option>
            <option value="info@bvtt-tphcm.org.vn">info@bvtt-tphcm.org.vn</option>
            <option value="information@fvhospital.com">information@fvhospital.com</option>
            <option value="bvdhyd@umc.edu.vn">bvdhyd@umc.edu.vn</option>
            <option value="bvdaihoccoso2@umc.edu.vn">bvdaihoccoso2@umc.edu.vn</option>
            <option value="bvdaihoccoso3@umc.edu.vn">bvdaihoccoso3@umc.edu.vn</option>
            <!-- Thêm các địa chỉ email khác nếu cần -->
        </select>
        <br><br>

        <!-- Sử dụng input hidden để lưu giá trị được chọn -->
        <input type="hidden" id="selectedEmailHidden" name="selectedEmailHidden" value="">

        <!-- Sử dụng nút button để tránh form tự động submit -->
        <button type="button" onclick="submitForm()">Gửi</button>
    </form>

    <script>
        function submitForm() {
            // Lấy giá trị từ các trường input
            var hoTen = document.getElementById("hoTen").value;
            var soDienThoai = document.getElementById("soDienThoai").value;
            var nguoiGuiEmail = document.getElementById("nguoiGuiEmail").value;
            var cauHoi = document.getElementById("cauHoi").value;
            var selectedEmail = document.getElementById("selectedEmail").value;

            // Kiểm tra xem nguoiGuiEmail có kí tự trước @ hay không
            if (!isValidEmail(nguoiGuiEmail)) {
                alert("Lỗi: Địa chỉ email không hợp lệ (phải có kí tự trước @).");
                return;
            }

            // Kiểm tra kết hợp điều kiện số điện thoại
            if (!isValidPhoneNumber(soDienThoai)) {
                alert("Lỗi: Số điện thoại không hợp lệ (phải có 10 chữ số).");
                return;
            }

            // Lấy form element
            var form = document.getElementById("myForm");

            // Tạo một FormData object để chứa dữ liệu form
            var formData = new FormData(form);

            // Thêm giá trị vào formData
            formData.append("hoTen", hoTen);
            formData.append("soDienThoai", soDienThoai);
            formData.append("nguoiGuiEmail", nguoiGuiEmail);
            formData.append("cauHoi", cauHoi);
            formData.append("selectedEmail", selectedEmail);

            // Sử dụng fetch để gửi dữ liệu đến formsubmit.co
            fetch('https://formsubmit.co/your-form-id', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Thông tin của bạn đã được gửi và lưu vào cơ sở dữ liệu thành công!");
                } else {
                    alert("Lỗi khi gửi thông tin.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Lỗi khi gửi thông tin.");
            });

            // Thêm vào cơ sở dữ liệu (giống như bạn đã làm)
            // ... (đoạn code thêm vào cơ sở dữ liệu ở đây)

            // Reset form nếu muốn
            form.reset();
        }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function isValidPhoneNumber(phoneNumber) {
            return /^\d{10}$/.test(phoneNumber);
        }
    </script>
</body>
</html>
