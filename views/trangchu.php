<?php
 session_start();
 if(!isset($_SESSION['login_user'])){
  header('location:login.php');
  exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/trangchu.css">
    
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <a href="" class="logo">
                <img src="../IMAGE/logo.png" alt="">
            </a>
            <nav id="menu">
                <a href="trangchu.html" class="menu-item">Trang chủ</a>
                <a href="#" class="menu-item">Tổng quan</a>
                <a href="news.php" class="menu-item">Tin tức mới nhất</a>
                <a href="#" class="menu-item">Giải pháp</a>
                <a href="game.php" class="menu-item">Game vui</a>

            </nav>
            
            <div class="user-info" style="float: right; margin-right: 10px; padding: 10px; color: black;">
            <?php 
            echo isset($_SESSION['login_user']) ? "Xin chào " . $_SESSION['login_user'] : ""; 
            ?>
        </div>
        <div id="action">
                <div class="item">
                    <a href="../ADMIN/login.php">
                        <img src="../IMAGE/logosignup.png" alt=""></a>
                </div>
            </div>
        </div>
        <div id="banner">
            <div class="box-left">
                <h2>
                    <span>HỖ TRỢ</span>
                    <br>
                    <span>TÂM LÝ TOÀN DIỆN</span>
                    <p>Đối diện với những thách thức về tâm lý, chúng tôi không chỉ đơn thuần là người đưa ra chuẩn đoán, mà còn là đồng hành của bạn trên hành trình khám phá và phục hồi.</p>
                    <a href="../ADMIN/login.php"><button>Tham gia ngay</button></a>
                </h2>
            </div>
            <div class="box-right">
                <img src="../IMAGE/testbr3.png" alt="">
                <img src="../IMAGE/testbr1.png" alt="">
                <img src="../IMAGE/testbr2.png" alt="">
            </div>
        </div>
        <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 6</div>
              <img src="../IMAGE/nav1.jpg" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 6</div>
              <img src="../IMAGE/nav2.jpg" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 6</div>
              <img src="../IMAGE/nav3.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">4 / 6</div>
                <img src="../IMAGE/nav4.jpg" style="width:100%">
              </div>
              <div class="mySlides fade">
                <div class="numbertext">5 / 6</div>
                <img src="../IMAGE/nav5.jpg" style="width:100%">
              </div>
              <div class="mySlides fade">
                <div class="numbertext">6 / 6</div>
                <img src="../IMAGE/nav6.jpg" style="width:100%">
              </div>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span>
              <span class="dot" onclick="currentSlide(4)"></span> 
              <span class="dot" onclick="currentSlide(5)"></span> 
              <span class="dot" onclick="currentSlide(6)"></span> 
 
            </div>
            
            <script>
            let slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
            <div><h2 style="text-align: justify;">Bài test đánh giá mức độ trầm cảm BECK&nbsp;</h2>
            <p style="text-align: justify;">Bài test mức độ trầm cảm BECK là một trong những phương pháp nhằm đánh giá về cảm xúc và mức độ trầm cảm tương đối phổ biến, được sử dụng trong các bệnh viện, phòng khám chuyên sâu về sức khoẻ tinh thần hiện nay.</p>
            <p style="text-align: justify;"><strong>Bài test nhằm mục đính:</strong></p>
            <ul style="text-align: justify;">
            <li>Tự đánh giá tình trạng Sức khoẻ tinh thần cá nhân.</li>
            <li>Dự đoán về Sức khoẻ tinh thần và có kế hoạch thăm khám phù hợp.</li>
            <li>Tổng hợp thông tin để thuận tiện khi thăm khám với Bác sĩ/Chuyên gia</li>
            </ul>
            <p style="text-align: justify;"><strong>Lưu ý:</strong></p>
            <p style="text-align: justify;">Kết quả bài test này chỉ mang tính chất tham khảo, không có giá trị thay thế chẩn đoán y khoa bởi bác sĩ/chuyên gia có chuyên môn.</p>
            <p style="text-align: justify;"><strong>Nguyên tắc thực hiện bài test:</strong></p>
            <p style="text-align: justify;">Bài test bao gồm 21 đề mục, hãy đọc cẩn thận tất cả các câu và chọn ra một đáp án gần giống nhất với <strong>tình trạng mà bạn cảm thấy trong 1 tuần trở lại đây</strong>, kể cả hôm nay.</p>
            <p style="text-align: justify;"><strong>Nguồn tham khảo:</strong></p>
            <p style="text-align: justify;"><a href="http://nimh.gov.vn/thang-danh-gia-tram-cam-beck-bdi/">Viện Sức khỏe Tâm thần, Bệnh viện Bạch Mai</a></p></div>
            <p style="background-color: aqua; color:darkslategray"><center><a href="../views/testform.php">Bắt đầu làm bài test</a></center>
             </p>
            <div class="footer">
                <div class="footer-info">
                    <img src="../IMAGE/logo.png"><br>
                    MindWell <br>
                    Số 123 Bắc Từ Liêm, Hà Nội<br>
                    0123456789 <br>
                    MindWell@gmail.com <br>
                    <a href="https://www.facebook.com/profile.php?id=61555678442684"><img src="../IMAGE/facebook-icon.png"></a>
                </div>
                <div class="footer-about">
                    <h2>About Us</h2>
                    MindWell là nơi cung cấp thông tin <br>
                    và hỗ trợ về sức khỏe tâm thần, <br>
                    chúng tôi cam kết đồng hành cùng bạn <br>
                    trên hành trình khám phá <br>
                    và phục hồi tinh thần sức khỏe  
                </div>
                <div class="footer-menu">
                    <h2>Menu</h2>
                    Trang chủ <br>
                    Tổng quan <br>
                    Giải pháp <br>
                    Tin tức mới nhất <br>
                    MindWell rất vui khi hỗ trợ Bạn !
                </div>
            </div>
    </div>
</body>
</html>