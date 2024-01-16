<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>

</head>
<style>
    .contain {
        display: flex;
        /* height: 100vh; Chiều cao 100% của viewport */
        margin-top: 50px;
    }

    #column1 {
        flex: 1.5;
        /* Cột 1 chiếm một phần */
        padding: 20px;
        /* Khoảng cách giữa các cột */
        box-sizing: border-box;
        /* Bao gồm padding trong kích thước tổng cộng của phần tử */
    }

    #column2 {
        flex: 1;
        /* Cột 2 chiếm hai phần */
        padding: 20px;
        /* Khoảng cách giữa các cột */
        box-sizing: border-box;
        /* Bao gồm padding trong kích thước tổng cộng của phần tử */
    }

    .toggle-container {
        position: relative;

    }

    .toggle-button {
        background-color: white;
        color: black;
        padding: 10px;
        cursor: pointer;
        border: none;
        font-family: 'Times New Roman', serif;
        font-size: 16px;
        /* font-weight: bold; */
    }

    .hidden-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        font-family: 'Times New Roman', serif;
        font-size: 16px;
        margin-left: 40px;
    }

    .visible {
        max-height: 1000px;
        /* Giá trị tùy chọn, đủ lớn để hiển thị nội dung */
        transition: max-height 0.5s ease-in;
    }

    #column2 .form-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-left: 40px;
        /* Khoảng cách giữa cột và form */
        box-sizing: border-box;
        /* Bao gồm padding trong kích thước tổng cộng của phần tử */
    }

    #column2 .form-container label {
        display: block;
        margin-bottom: 8px;
    }

    #column2 .form-container input,
    #column2 .form-container textarea {
        width: calc(100% - 20px);
        /* Tránh đụng lề ngoài của form */
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #column2 .form-container button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Đường viền đổ bóng */
    }

    #column2 .form-container button:hover {
        background-color: whitesmoke;
    }
</style>

<body>
    <ul class="hmenu">
        <li><a href="#">Trang chủ</a></li>
        <li><a href="tong_quan.php" onclick="highlight('overview')">Tổng quan</a>
            <ul class="sub-menu">
                <li><a href="tong_quan.php" onclick="highlight('causes')">Nguyên nhân</a></li>
                <li><a href="tong_quan.php" onclick="highlight('features')">Đặc điểm</a></li>
                <li><a href="tong_quan.php" onclick="highlight('symptoms')">Triệu chứng</a></li>
                <li><a href="tong_quan.php" onclick="highlight('target')">Đối tượng</a></li>
            </ul>
        </li>
        <li><a href="lienhe.php">Liên hệ</a></li>

        <li><a href="#">Giải pháp</a></li>
        <li><a href="#">Bài Test</a></li>
        <li><a href="#">Đăng nhập trải nghiệm thêm tính năng</a></li>


    </ul>
    <center>
        <div class="container" style="margin-top: 10px"></div>
        <br><br><br><br>
        <div class="container">
            <div class="rows" height="50px" width="100px">
                <div class="col-lg-8 col-sm-12 border">
                    <div id="slide_show" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../IMAGE/nav1.jpg" class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav2.jpg" class="d-block w-100" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav3.jpg" class="d-block w-100" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav4.jpg" class="d-block w-100" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav5.jpg" class="d-block w-100" alt="Image 5">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav6.jpg" class="d-block w-100" alt="Image 6">
                            </div>
                        </div>
                        <ul class="carousel-indicators">
                            <li data-target="#slide_show" data-slide-to="0" class="active"></li>
                            <li data-target="#slide_show" data-slide-to="1"></li>
                            <li data-target="#slide_show" data-slide-to="2"></li>
                            <li data-target="#slide_show" data-slide-to="3"></li>
                            <li data-target="#slide_show" data-slide-to="4"></li>
                            <li data-target="#slide_show" data-slide-to="5"></li>
                        </ul>
                        <a class="carousel-control-prev" href="#slide_show" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#slide_show" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <div class="contain">
        <div class="column" id="column1">

            <strong> NHỮNG BỆNH VIỆN NẰM TOP TRONG ĐIỀU TRỊ CÁC BỆNH TRẦM CẢM <br><br>
                <li>Tại Hà Nội </li>
            </strong>
            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-1"> 1. Trung tâm Tâm lý trị liệu NHC Việt Nam</button>
                <div class="hidden-content" id="hidden-content-1">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; margin-left: -20px;">
                        Nếu có nhu cầu muốn trị liệu trầm cảm tại NHC, bạn có thể liên hệ qua thông tin sau:</p>
                    <li>Cơ sở 1: Số 11 ngõ 83 Trần Duy Hưng, Trung Hoà, Cầu Giấy, Hà Nội</li>
                    <li>Cơ sở 2: Số 05 Lô 13A, Trung Yên 6, Yên Hoà, Cầu Giấy, Hà Nội</li>
                    <li>Cơ sở 3: Số 18 Phan Chu Trinh nối dài, Phường 13, Quận Bình Thạnh, TP Hồ Chí Minh</li>
                    <li>Cơ sở 4: Số 107 Hoàng Hoa Thám, Phường 6, Quận Bình Thạnh, TP Hồ Chí Minh</li>
                    - Hotline: 096 589 <br>
                    - Website: tamlytrilieunhc.com<br>
                    - Email: tamlytrilieunhc@gmail.com
                    </p>
                    <hr>
                </div>
            </div>

            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-2"> 2. Bệnh viện Tâm thần Trung ương I</button>
                <div class="hidden-content" id="hidden-content-2">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; ">
                        Bệnh viện Tâm thần Trung ương I sẽ làm việc vào giờ hành chính,
                        nếu có nhu cầu muốn được thăm khám và điều trị trầm cảm tại đây, bạn có thể liên hệ qua thông tin sau:</p>
                    - Địa chỉ: Hòa Bình, Huyện Thường Tín, Hà Nội <br>
                    - Điện thoại: 02433 853 227<br>
                    - Thời gian làm việc: 07:30 giờ – 17:00 giờ từ thứ Hai đến thứ Sáu <br>
                    - Website: www.bvtttw1.gov.vn<br>
                    - E-mail: bvtttw1@yahoo.com.vn<br>
                    <hr>
                </div>
            </div>

            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-3" onclick="toggleContent(3)"> 3. Khoa Tâm lý và Sức khỏe Tâm thần – Bệnh viện Hồng Ngọc</button>
                <div class="hidden-content" id="hidden-content-3">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; ">
                        Nếu đang có nhu cầu chữa bệnh trầm cảm tại Hà Nội, bạn có thể liên hệ trực tiếp với thông tin sau đây:</p>
                    - Địa chỉ: Số 55 Yên Ninh, Phường Trúc Bạch, Quận Ba Đình, Hà Nội <br>
                    - Điện thoại: +(84-24) 3927 5568 ext *0 (nhấn phím 1)<br>
                    - Website: hongngochospital.vn/khoa-suc-khoe-tam-than <br>
                    - E-mail: info@hongngochospital.vn<br>
                    <hr>
                </div>
            </div>

            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-4" onclick="toggleContent(4)"> 4. Khoa Sức khỏe Tâm thần – Bệnh viện Lão khoa Trung ương</button>
                <div class="hidden-content" id="hidden-content-4">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; ">
                        Để thuận tiện hơn trong việc thăm khám và chữa bệnh, bạn cần liên hệ đặt lịch trước qua thông tin sau:</p>
                    - Địa chỉ: Số 1A, Phương Mai, Quận Đống Đa, Hà Nội <br>
                    - Điện thoại: 02435 764 558 <br>
                    - Thời gian làm việc: Từ thứ Hai đến thứ Sáu. Thứ Bảy có khám theo yêu cầu <br>
                    - Website: benhvienlaokhoa.vn/khoa-suc-khoe-tam<br>
                    <hr>
                </div>
            </div>

            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-5" onclick="toggleContent(5)"> 5. Viện Sức khỏe Tâm thần Quốc gia – Bệnh viện Bạch Mai</button>
                <div class="hidden-content" id="hidden-content-5">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; ">
                        Khi có nhu cầu muốn được tư vấn hoặc điều trị trầm cảm tại Viện Sức khỏe Tâm thần, bạn nên liên hệ đặt lịch trước qua thông tin sau:</p>
                    - Địa chỉ: Viện Sức khỏe Tâm thần – Tòa nhà T4, T5, T6 Bệnh viện Bạch Mai,
                    Số 78, Đường Giải Phóng, Phường Phương Mai, Quận Đống Đa, Hà Nội <br>
                    - Điện thoại: 02435 765 344 <br>
                    - Thời gian làm việc: 06 giờ 50 – 16 giờ giờ từ thứ Hai đến thứ Sáu; 07 giờ 30 – 16 giờ thứ Bảy và Chủ Nhật <br>
                    - Website: nimh.gov.vn <br>
                    <hr>
                </div>
            </div>
            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-6" onclick="toggleContent(6)"> 6. Khoa Tâm thần – Bệnh viện Quân y 103</button>
                <div class="hidden-content" id="hidden-content-6">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; ">
                        Để thuận tiện cho việc thăm khám và chữa bệnh, đồng thời hạn chế tình trạng mất nhiều thời gian chờ đợi, người bệnh nên liên hệ đặt lịch trước để được sắp xếp thời gian hợp lý. Thông tin liên hệ cụ thể như:</p>
                    - Địa chỉ: Số 261, Đường Phùng Hưng, Phường Phúc La, Quận Hà Đông, Hà Nội <br>
                    - Điện thoại: 02433 115 689 <br>
                    - Thời gian làm việc: 07:30 giờ – 16:30 giờ từ thứ Hai đến thứ Sáu <br>
                    - Website: hocvienquany.vn/Portal/BT2123-BoMonTamThan.html <br>
                    <hr>
                </div>
            </div>

            <script>
                // Lắng nghe sự kiện click trên nút và thực hiện toggle hiển thị nội dung tương ứng
                function toggleContent(id) {
                    var hiddenContent = document.getElementById('hidden-content-' + id);
                    hiddenContent.classList.toggle('visible');
                }

                // Gán sự kiện click cho từng nút
                document.getElementById('toggle-button-1').addEventListener('click', function() {
                    toggleContent(1);
                });

                document.getElementById('toggle-button-2').addEventListener('click', function() {
                    toggleContent(2);
                });
            </script>

            <br><br>
            <li><strong>Tại TP. Hồ Chí Minh </strong></li>

            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-7" onclick="toggleContent(7)"> 1. Bệnh viện Tâm thần TPHCM</button>
                <div class="hidden-content" id="hidden-content-7">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; font-weight: bold;">
                        THÔNG TIN LIÊN HỆ:</p>
                    - Địa chỉ: 766 Võ Văn Kiệt, Phường 1, Quận 5, TP. HCM <br>
                    - Điện thoại: 0289 234 675 <br>
                    - Email: info@bvtt-tphcm.org.vn <br>
                    - Website: https://bvtt-tphcm.org.vn/ <br>
                    <hr>
                </div>
            </div>
            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-8" onclick="toggleContent(8)">2. Khoa Tâm lý - Bệnh viện Nhi Đồng 2</button>
                <div class="hidden-content" id="hidden-content-8">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; font-weight: bold;">
                        THÔNG TIN LIÊN HỆ:</p>
                    - Địa chỉ: Số 14 Lý Tự Trọng, Phường Bến Nghé, Quận 1, TPHCM <br>
                    - Điện thoại: 028 3829 5723 & (028) 3829 5724 <br>
                    - Website: benhviennhi.org.vn <br>
                    - Facebook: https://www.facebook.com/bvnd2/ <br>
                    <hr>
                </div>
            </div>
            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-9" onclick="toggleContent(9)"> 3. Bệnh viện FV</button>
                <div class="hidden-content" id="hidden-content-9">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; font-weight: bold;">
                        THÔNG TIN LIÊN HỆ:</p>
                    - Địa chỉ: Số 6 Đường Nguyễn Lương Bằng, Nam Sài Gòn, Quận 7, TPHCM <br>
                    - Điện thoại: 028 5411 3333 <br>
                    - Email: information@fvhospital.com <br>
                    - Website: https://www.fvhospital.com/vi/trang-chu/ <br>
                    - Facebook: https://www.facebook.com/BenhvienFV <br>
                    <hr>
                </div>
            </div>
            <div class="toggle-container">
                <button class="toggle-button" id="toggle-button-10" onclick="toggleContent(10)"> 4. Bệnh viện Đại học Y Dược TPHCM</button>
                <div class="hidden-content" id="hidden-content-10">
                    <hr>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px;font-weight: bold; ">
                        THÔNG TIN LIÊN HỆ:</p>
                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; font-weight: bold;float: left;">Cơ sở 1:</p>
                    <br><br><br>
                    - Địa chỉ: 215, Hồng Bàng, Phường 11, Quận 5, TP. Hồ Chí Minh <br>
                    - Điện thoại: 028 3855 4269 <br>
                    - Email: bvdhyd@umc.edu.vn <br>
                    - Website: http://www.bvdaihoc.com.vn/ <br>
                    - Facebook: facebook.com/benhviendaihocyduoc <br>

                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; font-weight: bold;float: left; ">Cơ sở 2:</p>
                    <br><br><br>
                    - Địa chỉ: 201 Nguyễn Chí Thanh, Phường 12, Quận 5, TP. Hồ Chí Minh <br>
                    - Điện thoại: 028 3955 5548 <br>
                    - Email: bvdaihoccoso2@umc.edu.vn <br>
                    - Website: www.bvdaihoccoso2.com.vn <br>

                    <p style="font-family: 'Times New Roman', Times, serif;font-size: 16px; font-weight: bold;float: left; ">Cơ sở 3:</p>
                    <br><br><br>
                    - Địa chỉ: 221B Hoàng Văn Thụ, Phường 8, Quận Phú Nhuận, TP. Hồ Chí Minh<br>
                    - Điện thoại: 028 3845 1889 & 028 3844 4771 <br>
                    - Email: bvdaihoccoso3@umc.edu.vn <br>
                    - Website: www.bvdaihoccoso3.com.vn <br>
                    <hr>
                </div>
            </div>
            <br><br>

        </div>
        <div class="column" id="column2">
            <div class="form-container">
                <h2>Form Gửi Tư Vấn</h2>

                <div>

                    <!-- Hiển thị form nhập thông tin -->
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
                            <option value="buimailinh06062003@gmail com">buimailinh06062003@gmail com</option>
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
                            var hoTen = document.getElementById("hoTen").value;
                            var soDienThoai = document.getElementById("soDienThoai").value;
                            var nguoiGuiEmail = document.getElementById("nguoiGuiEmail").value;
                            var cauHoi = document.getElementById("cauHoi").value;
                            var selectedEmail = document.getElementById("selectedEmail").value;

                            if (!isValidEmail(nguoiGuiEmail)) {
                                alert("Lỗi: Địa chỉ email không hợp lệ (phải có kí tự trước @).");
                                return;
                            }

                            if (!isValidPhoneNumber(soDienThoai)) {
                                alert("Lỗi: Số điện thoại không hợp lệ (phải có 10 chữ số).");
                                return;
                            }

                            var form = document.getElementById("myForm");
                            var formData = new FormData(form);

                            formData.append("hoTen", hoTen);
                            formData.append("soDienThoai", soDienThoai);
                            formData.append("nguoiGuiEmail", nguoiGuiEmail);
                            formData.append("cauHoi", cauHoi);
                            formData.append("selectedEmail", selectedEmail);

                            fetch('process_form.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Hiển thị thông báo thành công
                                        showSuccessAlert();
                                    } else {
                                        alert("Lỗi khi gửi thông tin.");
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert("Lỗi khi gửi thông tin.");
                                });

                            // Reset form nếu muốn
                            form.reset();
                        }

                        function isValidEmail(email) {
                            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                        }

                        function isValidPhoneNumber(phoneNumber) {
                            return /^\d{10}$/.test(phoneNumber);
                        }

                        function showSuccessAlert() {
                            var successAlert = document.createElement("div");
                            successAlert.textContent = "Thông tin của bạn đã được gửi thành công!";
                            successAlert.style.backgroundColor = "#4CAF50";
                            successAlert.style.color = "white";
                            successAlert.style.padding = "10px";
                            successAlert.style.marginTop = "-85px";
                            successAlert.style.marginLeft = "850px";
                            successAlert.style.marginRight= "10px";
                            successAlert.style.zIndex = "1"; // Thiết lập z-index
                            successAlert.style.position = "absolute"; // Thiết lập z-index
                            successAlert.style.display = "block";

                            document.body.appendChild(successAlert);

                            // Tự động ẩn thông báo sau 10 giây
                            setTimeout(function() {
                                successAlert.style.display = "none";
                                document.body.removeChild(successAlert);
                            }, 3000);
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</body>

</html>